<?php

Hook('User Is Logged In - Presentation','showList();');

function showList(){
  $segments = explode('/', ltrim($_SERVER['REQUEST_URI'], '/'));
  
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
  
