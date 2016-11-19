<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 19.11.2016
 * Time: 14:45
 */
if(isset($_POST)){
    $lang = reset(array_keys($_POST));
    if(in_array($lang, array('ru', 'en'))){
        session_start();
        $_SESSION['lang'] = $lang;
        $referer = !empty($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], $_SERVER['HTTP_HOST']) !== false
            ? $_SERVER['HTTP_REFERER']
            : $_SERVER['HTTP_HOST'];
        header('Location: '.$referer);
        die;
    }
}