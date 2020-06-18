<?php
require("../system/incl.php");

const HEADER_FILE_NAME = 'header_%s.jpg';

$table = "settings";
$errors = [];

if (isset($_POST['delimage'])) {
    foreach (['en', 'ru'] as $lang) {
        $file = unlink("../images/" . sprintf(HEADER_FILE_NAME, $lang));
        if(is_file($file)){
            unlink($file);
            unset($data['value_'.$lang]);
        }
        $smarty->assign("message", "Картинки удалены");
    }
}

if (isset($_POST['sent'])) {
    $filename = "";
    $path['en'] = $path['ru'] = "";
    $pics = [];
    foreach ($_FILES['header'] as $field => $values) {
        foreach ($values as $lang => $val) {
            $pics[$lang][$field] = $val;
        }
    }
    if (!empty($pics['en']['size']) || !empty($pics['ru']['size'])) {
        if (sizeof($pics) < 2) {
            $errors[] = 'Выберите баннеры для обоих языков';
        } else {
            foreach ($pics as $lang => $pic) {
                if ($pic['size'] > 0) {
                    if (!($pic['type'] == 'image/gif' || $pic['type'] == 'image/jpeg' || $pic['type'] == 'image/png')) {
                        $errors[] = "Вы можете загружать только картинки в формате JPEG, GIF или PNG.";
                    } else if (empty($errors)) {
                        $filename = $pic['name'];
                        $tmpPath = $pic['tmp_name'];
                        $path[$lang] = "images/" . sprintf(HEADER_FILE_NAME, $lang);

                        move_uploaded_file($tmpPath, "../" . $path[$lang]);
                    }
                }
            }

        }

        if (!empty($errors)) {
            $data['filename'] = $filename;
            $smarty->assign("data", $data);

            $smarty->assign("errors", $errors);
        } else {

            $smarty->assign("message", "Сохранено!");
        }
    }
}

$data = [];
$data['value_en'] = is_file("../images/" . sprintf(HEADER_FILE_NAME, 'en')) ? "images/" . sprintf(HEADER_FILE_NAME, 'en') : '';
$data['value_ru'] = is_file("../images/" . sprintf(HEADER_FILE_NAME, 'ru')) ? "images/" . sprintf(HEADER_FILE_NAME, 'ru') : '';


if (count($data) > 0) {
    $smarty->assign("data", $data);
} else {
    $smarty->assign("nodata", true);
}
$smarty->assign("time", time());


$smarty->display("adm_page_settings_list.tpl");
