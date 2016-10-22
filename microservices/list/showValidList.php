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
