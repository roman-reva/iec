<?php









function smarty_function_fckeditor($params, &$smarty)
{
    require_once(SITE_DIR.'classes/FCKeditor.class.php');
    #print_r($params);
    foreach ($params as $_key=>$_value) {
        switch ($_key) {
            case 'source':
                $$_key = $_value;
                break;
            case 'toolbar':
                $$_key = $_value;
                break;
			case 'name': 
				$$_key = $_value;
                break;
			case 'width':
                $$_key = $_value;
                break;
			case 'height':
                $$_key = $_value;
                break;
        }
    }


    $output = '';
	if(!isset($name)) {
		$name = 'fckContent';
	}
	
    $oFCKeditor = new FCKeditor($name) ;
	
	if(isset($height)) {
		$oFCKeditor->Height = $height;
	}
	if(isset($width)) {
		$oFCKeditor->Width = $width;
	}
    if(!isset($toolbar)) {
        $oFCKeditor->ToolbarSet = 'Default';    
    } else {
        $oFCKeditor->ToolbarSet = $toolbar;    
    }
    
    $oFCKeditor->Value = $source;
    $output.= $oFCKeditor->Create(true) ;

    return $output;

}
?>
