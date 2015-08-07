<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */

/**
 * Include the {@link shared.make_timestamp.php} plugin
 */
require_once $smarty->_get_plugin_filepath('shared','make_timestamp');

function smarty_modifier_custom_date_format($string, $default_date=null)
{
    $timestamp = smarty_make_timestamp($string);
    $year = date("Y", $timestamp);
    $month = date("n", $timestamp);
    $day = date("j", $timestamp);
    switch ($month)
    {
        case 1:
            $month_name = "������";
            break;
        case 2:
            $month_name = "�������";
            break;
        case 3:
            $month_name = "�����";
            break;
        case 4:
            $month_name = "������";
            break;
        case 5:
            $month_name = "���";
            break;
        case 6:
            $month_name = "����";
            break;
        case 7:
            $month_name = "����";
            break;
        case 8:
            $month_name = "�������";
            break;
        case 9:
            $month_name = "��������";
            break;
        case 10:
            $month_name = "�������";
            break;
        case 11:
            $month_name = "������";
            break;
        case 12:
            $month_name = "�������";
            break;
    }
    
    return $day . " " . $month_name . " " . $year;
}

/* vim: set expandtab: */

?>
