<?php

switch ($_GET['q'])
{
    case 'lang':
        $block_content =  PATH_CONTROLLER.'lang_selector/lang.php';
        $load_template = false;
        break;
    case 'captcha/image':
        $block_content =  PATH_CONTROLLER.'captcha/image.php';
        $load_template = false;
        break;
    case '':
        $block_content =  PATH_CONTROLLER.'default.php';
        //$load_template = false;
        break;
    default:
        $block_content = PATH_CONTROLLER.'page_not_found.php';
        $_GET['q'] = 'page_not_found';
        //$template_name = 'blank';
        // $load_template = false;
        break;
}
