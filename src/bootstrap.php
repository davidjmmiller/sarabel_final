<?php

// Paths
define('PATH_SOURCE','../src/');
define('PATH_VIEW',PATH_SOURCE.'views/');
define('PATH_CONTROLLER',PATH_SOURCE.'controllers/');
define('PATH_MODEL',PATH_SOURCE.'models/');
define('PATH_LIB',PATH_SOURCE.'lib/');
define('PATH_LANG',PATH_SOURCE.'lang/');
define('PATH_CONFIG',PATH_SOURCE.'config/');

// Loading config files
require PATH_CONFIG.'global.php';
require PATH_CONFIG.'database.php';
require PATH_CONFIG.'email.php';

// Initializing session
session_start();

// Flags
$load_template = true;
$cache_expiration = 1;

// Detecting language
if (!isset($_SESSION['lang'])){
    $_SESSION['lang'] = $config['default_lang'];
}

// Reading current path
if (!isset($_GET['q']))
{
    $_GET['q'] = '';
}

require PATH_CONFIG.'routes.php';
$current_path = '';
$filename = '../cache/pages/'.$_SESSION['lang'].'-';
$filename .= ($_GET['q'] == 'page_not_found' ? 'page_not_found' : str_replace('/','-',$_GET['q']).'-');
$filename .= ($_GET['q'] == 'page_not_found' ? '' : str_replace(array('=','?','&','/'),'-',$_SERVER['QUERY_STRING']));
$filename .= '.tmp';

if (file_exists($filename.'.info')){
    $page_cache_expiration = file_get_contents($filename.'.info');
}
else {
    $page_cache_expiration = 0;
}

// Checking cache if the page already exists
if (file_exists($filename) && $page_cache_expiration > date('YmdHis')){
    $page_output = file_get_contents($filename);
    echo $page_output;
}
else {

    // Loading libraries
    require PATH_CONFIG.'libraries.php';

    // Loading global language file
    require PATH_LANG.$_SESSION['lang'].'/global.php';

    if ($load_template) {

        // Loading first the block content
        ob_start();
        require $block_content;
        $block_content = ob_get_contents();
        ob_clean();

        // Loading layout
        ob_start();
        require PATH_CONTROLLER . 'templates/' . (isset($template_name) ? $template_name . '.php' : 'default.php');
        $page_output = ob_get_contents();
        ob_clean();

        // Storing page in the cache folder
        file_put_contents($filename, $page_output);

        // Storing expiration time
        $next_load = date('YmdHis',mktime(date('H'),date('i')+$cache_expiration,date('s'),date('m'),date('d'),date('Y')));
        file_put_contents($filename.'.info', $next_load);

        echo $page_output;

    } else {

        // Caching block content
        ob_start();
        require $block_content;
        $block_content = ob_get_contents();
        ob_clean();

        echo $block_content;

    }
}

if (isset($_GET['debug']) && $_GET['debug'] == $config['debug_key'])
{
    echo "<pre>";
    echo 'Total memory used: '.memory_get_peak_usage(false);
    echo "</pre>";
}