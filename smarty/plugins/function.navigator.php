<?php


function smarty_function_navigator($params, &$smarty)
{
    $_first_last = 1;
    $_next_prev = 1;
    $per_page = 1;
    
    foreach ($params as $_key=>$_value) {
        switch ($_key) {
            case 'href':
                $$_key = $_value;
                break;
            case 'style_class_curr':
                $$_key = $_value;
                break;
            case 'style_curr':
                $$_key = $_value;
                break;
            case 'style_class':
                $$_key = $_value;
                break;
            case 'style':
                $$_key = $_value;
                break;
            case 'total':
                $$_key = $_value;
                break;
            case 'per_page':
                $$_key = $_value;
                break;
            case 'interval':
                $$_key = $_value;
                break;
            case 'page':
                $$_key = $_value;
                break;            
            case '_first_last':
                $$_key = $_value;
                break;            
            case '_next_prev':
                $$_key = $_value;
                break;
        }
    }
    
    #$total_pages = (int) ($total/$per_page);
    $total_pages = ceil($total/$per_page);
    if($page <= $interval/2){
        $start = 1;
        $end = min($interval,$total_pages);
    }elseif($page + $interval/2 <= $total_pages){
        $end = $page + (int)($interval/2);
        $start = $page - (int)($interval/2);
    }else{
        $start = max(1,$total_pages - $interval + 1);
        $end = $total_pages;
    }
    
    $navigator = '';
    if($_first_last && $start>1){
        $navigator .= '<a '.($style_class?'class="'.$style_class.'"':'').
                                ($style?'style="'.$style.'"':'').
                            'href="'.$href.'&page=1">1</a> .. ';
    }
    if($_next_prev && $page>1){
        $navigator .= '<a '.($style_class?'class="'.$style_class.'"':'').
                                ($style?'style="'.$style.'"':'').
                            'href="'.$href.'&page='.($page-1).'">Prev</a> ';
    }
    for($ii=$start;$ii<=$end;$ii++){
        if($ii==$page){
            $navigator .= '<span '.($style_class_curr?'class="'.$style_class_curr.'"':'').
                                ($style_curr?'style="'.$style_curr.'"':'').
                            '>'.$ii.'</span> ';
        }else{
            $navigator .= '<a '.($style_class?'class="'.$style_class.'"':'').
                                ($style?'style="'.$style.'"':'').
                            'href="'.$href.'&page='.$ii.'">'.$ii.'</a> ';
        }
    }
    if($_next_prev && $page<$total_pages){
        $navigator .= '<a '.($style_class?'class="'.$style_class.'"':'').
                                ($style?'style="'.$style.'"':'').
                            'href="'.$href.'&page='.($page+1).'">Next</a> ';
    }
    if($_first_last && $end<$total_pages){
        $navigator .= '.. <a '.($style_class?'class="'.$style_class.'"':'').
                                ($style?'style="'.$style.'"':'').
                            'href="'.$href.'&page='.$total_pages.'">'.$total_pages.'</a> ';
    }
    
    return $navigator;
    
}


?>