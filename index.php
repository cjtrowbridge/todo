<?php

require('config.php');
include('events.php');
include('loader.php');

Loader('core');
Loader('auth/Google');

//Loader('microservices/images');


RequireSSL();

Event('Before Checking If User Is Logged In');

if(LoggedIn()){
  
  Loader('microservices/Home');
  
  Event('User Is Logged In - Before Presentation');
  
  Event('User Is Logged In - Presentation');
  
  die('User '.$_SESSION['User']['Email'].' is logged in, but no hooks interrupted the output. Runtime '.round(microtime(true)-STARTTIME,4).' seconds. Session Expires '.date('r',$_SESSION['Auth']['Expires']).'. <a href="./?logout">Log Out</a>.');
  
}else{
  
  Event('User Is Not Logged In');
  PromptForLogin();
  
}
