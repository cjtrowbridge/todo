<?php

Hook('User Is Logged In - Presentation','showList();');
Hook('User Is Logged In - Before Presentation','maybeCacheListOfLists();');

function maybeCacheListOfLists(){
  if(!(isset($_SESSION['Lists']))){
    cacheListOfLists();
  }
}

function cacheListOfLists(){
  $Results=Query("
    SELECT 
      *
    FROM List
    WHERE
      List.UserID = ".intval($_SESSION['User']['UserID'])."
  ");
  $_SESSION['Lists']=$Results;
}

function showList(){
  $segments = explode('/', ltrim($_SERVER['REQUEST_URI'], '/'));
  
  if(
    isset($segments[0])&&
    $segments[0]=='new'
  ){
    include('showNew.php');
    showNew();
  }
  
  if(
    isset($segments[0])&&
    (!(trim($segments[0])==''))
  ){
    
    //User is trying to view a specific list
    include('showSpecificListBodyCallback.php');
    SimplePage('Todo','showSpecificListBodyCallback();');
    
  }else{ 
    
    //User is trying to see a list of lists
    include('showListOfListsBodyCallback.php');
    SimplePage('Todo','showListOfListsBodyCallback();');
    
  }
  
}
  
