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
    $block_content = PATH_CONTROLLER.'default.php';
    $current_path = '';
}
else {
    require '../src/config/routes.php';
    $current_path = $_GET['q'];
}

if ($load_template)
{
    // Loading additional blocks
    $block_header = PATH_CONTROLLER . 'partials/header.php';
    $block_footer = PATH_CONTROLLER . 'partials/footer.php';

    // Loading layout
    require PATH_CONTROLLER . 'templates/'.(isset($template_name) ? $template_name : 'default.php');
}
else
{
    require $block_content;
}