<?php

// Loading files
require '../src/config/global.php';
require '../src/config/database.php';
require '../src/config/email.php';

// Paths
define('PATH_VIEW','../src/views/');
define('PATH_CONTROLLER','../src/controllers/');
define('PATH_MODEL','../src/models/');

// Initializing session
session_start();

// Flags
$load_template = true;

// Detecting language
if (!isset($_SESSION['lang'])){
    $_SESSION['lang'] = $config['default_lang'];
}

// Loading global language file
require '../src/lang/'.$_SESSION['lang'].'/global.php';


// Reading current path
if (!isset($_GET['q']))
{
    $_GET['q'] = '';
}

require '../src/config/routes.php';
$current_path = '';
$filename = '../cache/pages/'.$_SESSION['lang'].'-'.str_replace('/','-',$_GET['q']).'.tmp';

// Checking cache if the page already exists
if (file_exists($filename)){
    $page_output = file_get_contents($filename);
    echo $page_output;
}
else {


    // Loading libraries
    require '../src/lib/util.php';
    require '../src/lib/database.php';
    require '../src/lib/mail.php';

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