<?php

switch ($_GET['q'])
{
    case 'demo':
        $block_content =  PATH_CONTROLLER.'demo/index.php';
        $load_template = true;
        $cache_expiration = 0;
        break;
    case 'lang':
        $block_content =  PATH_CONTROLLER.'lang_selector/lang.php';
        $load_template = false;
        $cache_expiration = 1;
        break;
    case 'captcha/image':
        $block_content =  PATH_CONTROLLER.'captcha/image.php';
        $load_template = false;
        $cache_expiration = 1;
        break;
    case '':
        $block_content =  PATH_CONTROLLER.'default.php';
        //$load_template = false;
        $cache_expiration = 1;
        break;
    default:
        $block_content = PATH_CONTROLLER.'page_not_found.php';
        $_GET['q'] = 'page_not_found';
        $cache_expiration = 10;
        //$template_name = 'blank';
        // $load_template = false;
        break;
}
