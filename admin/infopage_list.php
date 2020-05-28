<?php
require("../system/incl.php");

$errors = array();
if (isset($_GET['del'])) {
    $q = "SELECT * FROM `infopage`";
    if (mysql_numrows(mq($q)) == 1) {
        $errors[] = "?????????? ??????? ????????! ??? ??????? ???? ???????? ?????? ?????????????? ?? ?????!";
    }

    $del = addslashes($_GET['del']);
    $q = "DELETE FROM `infopage` WHERE `id`='$del'";
    mq($q);
    $smarty->assign("message", "???????!");
}

$q = "SELECT
p.id AS id,
p.title_ru AS title_ru,
			p.title_en AS title_en,
p.menutitle_ru AS menutitle_ru,
			p.menutitle_en AS menutitle_en,
p.weight AS weight
FROM
infopage AS p
ORDER BY
weight";
$res = mq($q);

$data = array();
while ($info = mysqli_fetch_array($res)) {
    $data[] = $info;
}

$smarty->assign("data", $data);

$smarty->display("adm_infopage_list.tpl");
?>