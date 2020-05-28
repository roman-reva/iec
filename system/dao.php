<?php
function fetchCategoriesFromDB() {
    $q = "SELECT
		          category.id AS c_id,
		          category.name_{$_SESSION['lang']} AS c_name,
		          category.menuname_{$_SESSION['lang']} AS c_menuname,
		          group.id AS g_id,
		          group.name_{$_SESSION['lang']} AS g_name
		      FROM
		          (`category` LEFT JOIN `group2category` ON category.id=group2category.id_category)
		            LEFT JOIN `group` ON group2category.id_group=group.id
			  ORDER BY
		          category.weight, category.menuname_{$_SESSION['lang']}, category.name_{$_SESSION['lang']}, group2category.weight, group.name_{$_SESSION['lang']}";
    $res = mq($q);
    $category_list = array();

    $curr_cat_id = -1;

    $cat_list = array();
    while ($info = mysqli_fetch_array($res)) {
        if ($curr_cat_id != $info['c_id']) {
            $curr_cat_id = $info['c_id'];
            $cat_list[$curr_cat_id]['id'] = $curr_cat_id;
            $cat_list[$curr_cat_id]['name'] = $info['c_name'];
            $cat_list[$curr_cat_id]['menuname'] = $info['c_menuname'];
            $cat_list[$curr_cat_id]['type'] = 'category';
            $cat_list[$curr_cat_id]['groups'] = array();
        }
        $cat_list[$curr_cat_id]['groups'][$info['g_id']] = array(
            'id'=> $info['g_id'],
            'name'=> $info['g_name']
        );
    }
    return $cat_list;
}

function fetchInfopageMenuPart($top = true) {
    if ($top) {
        $q = "SELECT id AS id, menutitle_{$_SESSION['lang']} AS name FROM `infopage` WHERE weight<11 ORDER BY weight";
    } else {
        $q = "SELECT id AS id, menutitle_{$_SESSION['lang']} AS name FROM `infopage` WHERE weight>10 ORDER BY weight";
    }
    $res = mq($q);
    $links = array();
    while ($info = mysqli_fetch_array($res)) {
        $info['type'] = "infopage";
        $links[] = $info;
    }
    return $links;
}

function getFullMenu() {
    $top_links = fetchInfopageMenuPart(true);
    $cats = fetchCategoriesFromDB();
    $bottom_links = fetchInfopageMenuPart(false);
    return array_merge($top_links, $cats, $bottom_links);
}

function saveMenuState() {
    $query_string = getenv("QUERY_STRING");
    if (!empty($query_string)) {
        if (isset($_GET['t_id'])) {
            $_SESSION['t_id'] = addslashes($_GET['t_id']);
        } else if (!isset($_GET['p_id'])) {
            $_SESSION['t_id'] = 0;
        }
        if (isset($_GET['p_id'])) {
            $_SESSION['p_id'] = addslashes($_GET['p_id']);
        } else {
            unset($_SESSION['p_id']);
        }
        if (isset($_GET['ip_id'])) {
            $_SESSION['ip_id'] = addslashes($_GET['ip_id']);
        } else {
            unset($_SESSION['ip_id']);
        }
        if (isset($_GET['c_id'])) {
            $_SESSION['c_id'] = addslashes($_GET['c_id']);
            if (!isset($_GET['g_id'])) {
                unset($_SESSION['g_id']);
            }
        }
        if (isset($_GET['g_id'])) {
            $_SESSION['g_id'] = addslashes($_GET['g_id']);
        }
        if (isset($_GET['clear_menu'])) {
            unset($_SESSION['c_id']);
            unset($_SESSION['g_id']);
        }
        header('location: index.php');
        exit;
    }
}

function getGroupsInfoByCategoryId($c_id) {
    $q = "SELECT
				g.id AS id,
				g.name_{$_SESSION['lang']} AS name,
				g.details_{$_SESSION['lang']} AS details,
				g.image_{$_SESSION['lang']} as image
			  FROM
			  	`group` AS g,
			  	`group2category` AS g2c
			  WHERE
			  	g.id=g2c.id_group AND
			  	g2c.id_category='$c_id'
			  ORDER BY
			  	g2c.weight";
    $res = mq($q);
    $group_list = array();

    while($info = mysqli_fetch_array($res)) {
        if (empty($info['image'])) {
            $info['image'] = "images/noimage.jpg";
        }
        $group_list[] = $info;

    }

    return $group_list;
}

function getPagesInfoByGroupIdAndTypeId($g_id, $t_id = 0) {
    $q = "SELECT
            p.id AS id,
            p.title_{$_SESSION['lang']} AS title,
            p.details_{$_SESSION['lang']} AS details,
            pt.name_{$_SESSION['lang']} AS type,
            pt.color AS color,
            p.update_date AS updated
          FROM
            `page` AS p,
            `page_type` AS pt,
            `page2group` AS p2g
          WHERE
            p.id_page_type = pt.id AND
            p.id = p2g.id_page AND
            p2g.id_group = '$g_id'";

    if ($t_id > 0) {
        $q .= " AND pt.id = '$t_id'";
    }
    $q .= " ORDER BY p2g.weight ASC";

    $res = mq($q);

    $page_list = array();

    while($info = mysqli_fetch_array($res)) {
        $info['updated'] = date("d.m.Y H:i", $info['updated']);
        $page_list[] = $info;
    }

    return $page_list;
}

function getGroupInfoById($id) {
    $l = $_SESSION['lang'];
    $q = "SELECT 
    id, name_".$l." AS name, details_".$l." AS details, text_".$l." AS text, image_".$l." AS image 
    FROM `group` WHERE `id`=$id";
    $res = mq($q);
    $page = mysqli_fetch_array($res);
    $page['title'] = "";
    $page['type']= "infopage";
    return $page;
}

function getPageInfoById($id) {
    $q = "SELECT
            p.id AS id,
            p.title_{$_SESSION['lang']} AS title,
            p.text_{$_SESSION['lang']} AS text,
            p.file AS file,
            p.filename AS filename,
            pt.name_{$_SESSION['lang']} AS type,
            pt.color AS color,
            p.update_date AS updated
          FROM
            `page` AS p,
            `page_type` AS pt
          WHERE
            p.id_page_type = pt.id AND
            p.id = '$id'";
    $info = mysqli_fetch_array(mq($q));
    if ($info['file']!="" && is_file($info['file'])) {
        $info['filesize'] = (int)(filesize($info['file']) / 1024 + 0.5);
    }
    $info['updated'] = date("d.m.Y H:i", $info['updated']);
    return $info;
}

function getInfopageById($id) {
    $q = "SELECT
            p.id AS id,
            p.title_{$_SESSION['lang']} AS title,
            p.background AS background,
            p.text_{$_SESSION['lang']} AS text
          FROM
            `infopage` AS p
          WHERE
            p.id = '$id'";
    $info = mysqli_fetch_array(mq($q));
    return $info;
}

function getTabs() {
    $q = "SELECT
    		pt.id AS id,
            pt.name_{$_SESSION['lang']} AS name,
            pt.color AS color
          FROM
          	`page_type` AS pt
          ORDER BY weight";
    $res = mq($q);
    $tabs = array();

    while ($info = mysqli_fetch_array($res)) {
        $tabs[] = $info;
    }
    return $tabs;
}

function getTabsByGroupId($gid) {
    $gid = prep($gid);

    $q = "SELECT
    		pt.id AS id,
            pt.name_{$_SESSION['lang']} AS name,
            pt.color AS color
          FROM
          	`page_type` AS pt
          ORDER BY weight";

    $res = mq($q);
    $tabs = array();

    while ($info = mysqli_fetch_array($res)) {
        $q = "SELECT 
				COUNT(*) AS num 
			  FROM 
			  	`page2group` AS p2g,
			  	`page` AS p
			  WHERE 
			  	p2g.id_page = p.id AND
			  	p2g.id_group = $gid AND
			  	p.id_page_type=".$info['id'];

        $num_res = mysqli_fetch_array(mq($q));
        if ($num_res['num'] == 0) {
            $info['disabled'] = true;
        }

        $tabs[] = $info;
    }
    return $tabs;
}

function getCategoryInfoById($id) {
    $q = "SELECT * FROM `category` WHERE id=$id";
    $info = mysqli_fetch_array(mq($q));
    return localizeObject($info);
}
function localizeObject($object){
    $currentLang = $_SESSION['lang'];
    foreach ($object as $field => $value) {
        $parts = explode('_', $field);
        $lang = end($parts);
        array_pop($parts);
        if($lang == $currentLang){
            $object[implode('_',$parts)] = $value;
        }
    }
    return $object;
}
?>