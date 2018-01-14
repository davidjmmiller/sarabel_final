<?php

function t($key)
{
    global $lang;
    if (isset($lang[$_SESSION['lang']][$key]))
    {
        return $lang[$_SESSION['lang']][$key];
    }
    return '*'.$key.'*';
}


/*
 * Allow to read to value in the $_POST variable for the forms
 */
function post($name)
{
    if (isset($_POST[$name]))
    {
        return $_POST[$name];
    }
    return '';
}

function authentication_key(){
    global $config;
    return md5(date('YmdHis').$config['authentication_hash']);
}

function set_session_message($message){
    if (!isset($_SESSION['message']))
    {
        $_SESSION['message'] = array();
    }
    $_SESSION['message'][] = $message;
}

function session_message($only_status = false){
    if ($only_status) {
        if (isset($_SESSION['message']) && count($_SESSION['message']) > 0){
            return true;
        }
        else {
            return false;
        }
    }
    $output = '<ul>';
    for($i = 0; $i < count($_SESSION['message']); $i++){
        $output .= '<li>'.$_SESSION['message'][$i].'</li>';
    }
    $output .= '</ul>';

    // Cleaning session messages
    $_SESSION['message'] = array();

    return $output;
}