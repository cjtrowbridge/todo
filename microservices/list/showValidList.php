<?php

function showValidList(){
  
  $segments = explode('/', ltrim($_SERVER['REQUEST_URI'], '/'));

  MakeSureDBConnected();
  $sql="
    SELECT 
      Item.ItemID,
      Item.Description,
      Item.State,
      Item.Due
    FROM List
    LEFT JOIN Item ON Item.ListID = List.ListID
    WHERE
      List.UserID = ".intval($_SESSION['User']['UserID'])." AND
      List.Slug LIKE '".mysql_real_escape_string($segments[0])."'
    ORDER BY Due DESC
  ";
  $Items=Query($sql);
  
  ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-4">
        <h3>Every Day</h3>
        <ul>
           <?php
          
            foreach($Items as $Item){
              if(
                ($Item['Due']=='') ||
                is_null($Item['Due'])|
                (!(isset($Item['Due'])))
              ){
                echo "          <li>".$Item['Description']."</li>\n";
              }
            }
          
          ?>
        </ul>
      </div>
      <div class="col-xs-4">
        <h3>This Month</h3>
        <ul>
           <?php
          
            foreach($Items as $Item){
              if(
                date("Y-m",strtotime($Item['Due']))==date("Y-m")
              ){
                echo "          <li>".$Item['Description']."</li>\n";
              }
            }
          
          ?>
        </ul>
      </div>
      <div class="col-xs-4">
        <h3>This Year</h3>
        <ul>
           <?php
          
            foreach($Items as $Item){
              if(
                date("Y",strtotime($Item['Due']))==date("Y")&&
                (!(date("Y-m",strtotime($Item['Due']))==date("Y-m")))
              ){
                echo "          <li>".$Item['Description']."</li>\n";
              }
            }
          
          ?>
        </ul>
        
        <h3>Next Year</h3>
        <ul>
           <?php
          
            foreach($Items as $Item){
              if(
                date("Y",strtotime($Item['Due']))==(date("Y")+1)
              ){
                echo "          <li>".$Item['Description']."</li>\n";
              }
            }
          
          ?>
        </ul>
        
      </div>
    </div>
  </div>
  <?php
}
