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
            $month_name = "Января";
            break;
        case 2:
            $month_name = "Февраля";
            break;
        case 3:
            $month_name = "Марта";
            break;
        case 4:
            $month_name = "Апреля";
            break;
        case 5:
            $month_name = "Мая";
            break;
        case 6:
            $month_name = "Июня";
            break;
        case 7:
            $month_name = "Июля";
            break;
        case 8:
            $month_name = "Августа";
            break;
        case 9:
            $month_name = "Сентября";
            break;
        case 10:
            $month_name = "Октября";
            break;
        case 11:
            $month_name = "Ноября";
            break;
        case 12:
            $month_name = "Декабря";
            break;
    }
    
    return $day . " " . $month_name . " " . $year;
}

/* vim: set expandtab: */

?>
