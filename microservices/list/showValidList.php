<?php

function showValidList(){
  
  MakeSureDBConnected();
  $Items=Query("
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
  ");
  
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
           <?php
          
            foreach($Items as $Item){
              echo "          <li>".$Item['Description']."</li>\n";
            }
          
          ?>
        </ul>
      </div>
    </div>
  </div>
  <?php
}
