<?php

function showListOfListsBodyCallback(){
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
            foreach($_SESSION['Lists'] as $List){
             echo "          <li><a href=\"/".$List['Slug']."\">".$List['Name']."</a></li>\n"; 
            }
          ?>
        
        </ul>
      </div>
    </div>
  </div>
  <?php
}
