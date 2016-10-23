<?php

function showNew(){
  MakeSureDBConnected();
  
  //Does this list belong to this user?
  $Matches=Query("SELECT ListID WHERE ListID = ".mysql_real_escape_string($_GET['list'])." AND UserID = ".intval($_SESSION['User']['UserID'])."");
  if(count($Matches)==0){
   die('Invalid list; no matches found for current user.'); 
  }
  
  //Is this a real date?
  $theDate=strtotime($_GET['due']);
  if($theDate==0){
    die('Invalid Date'); 
  }
  
  //Insert new item
  Query("INSERT INTO `Item` 
  (
    `UserID`, 
    `ListID`, 
    `Description`, 
    `Due`
  )VALUES(
    '".intval($_SESSION['User']['UserID'])."', 
    '".mysql_real_escape_string($_GET['list'])."', 
    '".mysql_real_escape_string($_GET['item'])."', 
    '".date("Y-m-d",$theDate)."'
   );");
  
  //tell them it worked!
  die('ok');
}
