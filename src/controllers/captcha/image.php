<?php

if (!isset($_GET['id'])){
    exit;
}

header("Content-Type: image/png");

$im = @imagecreate(70, 30)
or die("Cannot Initialize new GD image stream");

// Colors
$background_color = imagecolorallocate($im, 255, 255, 255);
$text_color = imagecolorallocate($im, 233, 14, 91);

// Generating captcha code
$code = rand(0,9).'*'.rand(0,9).'*'.rand(0,9).'*'.rand(0,9);

// Storing the code in the session
if (!isset($_SESSION['captcha'])){
    $_SESSION['captcha'] = array();
}
$_SESSION['captcha'][$_GET['id']] = $code;

// Print the captcha code
imagestring($im, 3, 12, 7,  $code, $text_color);

// Output image
imagepng($im);

// Cleaning memory
imagedestroy($im);