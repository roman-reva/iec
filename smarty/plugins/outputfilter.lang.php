<?php

function smarty_outputfilter_lang($source, &$smarty)
{
    include(SITE_DIR.'configs/lang/'.CURRENT_LANG.'/output_filter_lang.php');

    preg_match_all("~#([a-z_]+)#~is",$source,$match);

    foreach($match[1] as $m){        $source = str_replace("#$m#",$v[$m],$source);    }
    return $source;
}

?>
