<?php

Hook('User Is Logged In - Presentation','showHome();');

function showHome(){
  SimplePage('Todo','showHomeBodyCallback();');
}
  
function showHomeBodyCallback(){
  ?>
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        
        <div class="dropdown" style="float: right;">
          <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"><span class="glyphicon glyphicon-option-vertical"></span>
          <span class="caret"></span></button>
          <ul class="dropdown-menu">
            <li><a href="#">HTML</a></li>
            <li><a href="#">CSS</a></li>
            <li><a href="#">JavaScript</a></li>
            <li class="divider"></li>
            <li><a href="./?logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
          </ul>
        </div>
        <h1>Todo</h1>
      </div>
    </div>
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
