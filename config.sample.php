<?php

ini_set("session.gc_maxlifetime", 65535);

//Most of this will need to be updated later
define('STARTTIME',microtime(true));

error_reporting(E_ALL);
ini_set('display_errors', '1');

//APP CONFIG
define('DEFAULTSESSIONLENGTH',60*60*24*7);
define('ENCRYPTIONKEY','change');
define('APPNAME','Astria');
define('APPURL','');
date_default_timezone_set('America/Los_Angeles');

//DEBUGGING CONFIG
define('DEBUG_ENABLED',true);
define('VEBOSE',true);

//SMTP CONFIG
define('SMTP_USERNAME','change');
define('SMTP_PASSWORD','change');
define('DEFAULT_EMAIL_SUBJECT','');
define('DEFAULT_EMAIL_FROM','');
  
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
define('SMTP_DEBUG_LEVEL',0);
define('SMPT_HOSTNAME','localhost');
define('SMPT_PORT','25');
define('ADMIN_EMAIL','');

//DATABASE CONFIG
global $DATABASES;
$DATABASES=array(
  'core administrative database'=>array(
    'type'      => 'mysql',
    'hostname'  => 'localhost',
    'username'  => 'astria',
    'password'  => '',
    'database'  => 'astria',
    'resource'  => false
  )
);

//GOOGLE OAUTH SETTINGS
define('GoogleOAuth2ClientID','');
define('GoogleOAuth2ClientSecret','');

//FACEBOOK OAUTH SETTINGS
define('FacebookAppSecret','');
define('FacebookAppID','');
