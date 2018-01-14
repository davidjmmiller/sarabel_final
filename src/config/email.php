<?php

$config['mail_smtpdebug'] = 0;                                 // Enable verbose debug output
$config['mail_host'] = 'yourServerAddress.net';  // Specify main and backup SMTP servers
$config['mail_smtpauth'] = true;                               // Enable SMTP authentication
$config['mail_username'] = 'yourEmail@z506.com';                 // SMTP username
$config['mail_password'] = 'yourpassword';                           // SMTP password
$config['mail_smtpsecure'] = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$config['mail_port'] = 465;                                    // TCP port to connect to

// Email from
$config['mail_from_email_registration'] = 'yourEmail@z506.com';
$config['mail_from_name_registration'] = 'Global System Z506';

$config['mail_from_email_recover'] = 'yourEmail@z506.com';
$config['mail_from_name_recover'] = 'Password Reset Z506';
