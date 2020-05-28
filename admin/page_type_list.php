<?php
require("../system/incl.php");

if (isset($_GET['del'])) {
    $del = addslashes($_GET['del']);

    $q = "SELECT * FROM `page_type`";
    $num = mysqli_num_rows(mq($q));

    $q = "SELECT * FROM `page` WHERE `id_page_type`='$del'";
    $res = mq($q);
    if ($num==1) {
        $error = array("Вы не можете удалить последний тип материала! Как минимум один тип материала должен присутствовать!");
        $smarty->assign("errors", $error);
    } else if (mysqli_num_rows($res)>0) {
        $error = array("Невозможно удалить выбранный объект, так как существуют другие объекты, связанные с данным.");
        $smarty->assign("errors", $error);
    } else {
        $q = "DELETE FROM `page_type` WHERE `id`='$del'";
        mq($q);
    }
}


$q = "SELECT * FROM `page_type` ORDER BY `weight`, `name_ru`";
$res = mq($q);

$data = array();
if (mysqli_num_rows($res) > 0) {
    while($info = mysqli_fetch_array($res)) {
        $data[] = $info;
    }
}

if (count($data) > 0) {
    $smarty->assign("data", $data);
} else {
    $smarty->assign("nodata", true);
}

$smarty->display("adm_page_type_list.tpl");
?>