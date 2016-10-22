<?php

function showSpecificListBodyCallback(){
  
  $segments = explode('/', ltrim($_SERVER['REQUEST_URI'], '/'));
  
  MakeSureDBConnected();
  $Lists=Query("
    SELECT ListID
    FROM List
    WHERE
      List.UserID = ".intval($_SESSION['User']['UserID'])." AND
      List.Slug LIKE '".mysql_real_escape_string($segments[0])."'
  ");
  
  if(count($Lists)==0){
    
    include('showInvalidList.php');
    showInvalidList();
    
  }else{
    
    include('showValidList.php');
    showValidList();
    
  }
  
}
