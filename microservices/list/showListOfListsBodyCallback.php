<?php

function showListOfListsBodyCallback(){
  
  $Results=Query("
    SELECT 
      *
    FROM List
    LEFT JOIN Item ON Item.ListID = List.ListID
    WHERE
      List.UserID = ".intval($_SESSION['User']['UserID'])."
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
        
        <nav class="navbar navbar-default">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="./"><?php echo ucwords(APPNAME); ?></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-option-vertical"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Home List</a></li>
                    <li><a href="#">Work List</a></li>
                    <li><a href="#">Life Goals</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">New List</a></li>
                    <li class="divider"></li>
                    <li><a href="./?logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                  </ul>
                </li>
              </ul>
            </div><!--/.nav-collapse -->
          </div><!--/.container-fluid -->
        </nav>
        
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <?php
          pd($Results);
        ?>
      </div>
    </div>
  </div>
  <?php
}
