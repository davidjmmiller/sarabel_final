<?php

// Loading files
require '../src/config/global.php';
require '../src/config/database.php';
require '../src/config/email.php';
require '../src/lib/util.php';
require '../src/lib/database.php';
require '../src/lib/mail.php';


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

if ($load_template)
{
    // Loading layout
    require PATH_CONTROLLER . 'templates/'.(isset($template_name) ? $template_name.'.php' : 'default.php');
}
else
{
    require $block_content;
}

if (isset($_GET['debug']) && $_GET['debug'] == $config['debug_key'])
{
    echo "<pre>";
    echo 'Total memory used: '.memory_get_peak_usage(false);
    echo "</pre>";
}