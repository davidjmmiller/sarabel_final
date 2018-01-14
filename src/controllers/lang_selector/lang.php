<?php

$parameter = 'change';
if (isset($_GET[$parameter])){
    switch($_GET[$parameter])
    {
        case 'en':
        case 'es':
            $_SESSION['lang'] = $_GET[$parameter];
            break;
        default:
            $_SESSION['lang'] = $config['default_lang'];
            break;
    }
}
header('Location: /');
