<?php

$config['mail_smtpdebug'] = 0;                                 // Enable verbose debug output
$config['mail_host'] = 'a2plcpnl0188.prod.iad2.secureserver.net';  // Specify main and backup SMTP servers
$config['mail_smtpauth'] = true;                               // Enable SMTP authentication
$config['mail_username'] = 'davidm@z506.com';                 // SMTP username
$config['mail_password'] = 'David88';                           // SMTP password
$config['mail_smtpsecure'] = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$config['mail_port'] = 465;                                    // TCP port to connect to

// Email from
$config['mail_from_email_registration'] = 'davidm@z506.com';
$config['mail_from_name_registration'] = 'Registration System Z506';

$config['mail_from_email_recover'] = 'davidm@z506.com';
$config['mail_from_name_recover'] = 'Password Reset Z506';
