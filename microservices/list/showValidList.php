<?php

function showValidList(){
  
  $segments = explode('/', ltrim($_SERVER['REQUEST_URI'], '/'));

  MakeSureDBConnected();
  $sql="
    SELECT 
      List.ListID,
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
      <div class="col-xs-3">
        <h3>Every Day <shh><a href="javascript:void(0);" onclick="AddItem('always');">New</a></shh></h3>
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
      <div class="col-xs-3">
        <h3>This Month <shh><a href="javascript:void(0);" onclick="AddItem('<?php echo date("Y-m-t"); ?>');">New</a></shh></h3>
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
      <div class="col-xs-3">
        <h3>This Year <shh><a href="javascript:void(0);" onclick="AddItem('<?php echo date("Y-12-30"); ?>');">New</a></shh></h3>
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
      </div>
      <div class="col-xs-3">
        <h3>Next Year <shh><a href="javascript:void(0);" onclick="AddItem('<?php echo date("Y-12-30",strtotime(date("Y-12-t"))+1); ?>');">New</a></shh></h3>
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
  <script>
    function AddItem(date){
      
      var newItem = prompt("Create New Item");
      if (newItem != null) {
          $.get( "/new/", { item: newItem, due: date, list: <?php echo $Items[0]['ListID']; ?> } )
          .done(function(data) {
            //location.reload();
            alert(data);
          });
      }
      
    }
  </script>
  <?php
}
