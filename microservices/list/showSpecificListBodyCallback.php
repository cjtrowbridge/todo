<?php

function showSpecificListBodyCallback(){
  
  $segments = explode('/', ltrim($_SERVER['REQUEST_URI'], '/'));
  MakeSureDBConnected();
  $Results=Query("
    SELECT 
      *
    FROM List
    LEFT JOIN Item ON Item.ListID = List.ListID
    WHERE
      List.UserID = ".intval($_SESSION['User']['UserID'])." AND
      List.Slug LIKE '".mysql_real_escape_string($segments[0])."'
  ");
  
  if(count($Results)==0){
    showInvalidList();
  }else{
    showValidList();
  }
  
}

function showInvalidList(){
  ?>
  <style>
    body{
     padding-top: 2em; 
    }
  </style>
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12">
        <h1>Invalid List</h1>
        <p><a href="/">Show All Lists</a></p>
      </div>
    </div>
  </div>
  <?php
}

function showValidList(){
  ?>
  <style>
    body{
     padding-top: 2em; 
    }
  </style>
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12">
        <ul>
          <li></li>
          <li></li>
          <li></li>
        </ul>
      </div>
    </div>
  </div>
  <?php
}
