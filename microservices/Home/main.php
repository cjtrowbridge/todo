<?php

Hook('User Is Logged In - Presentation','showHome();');

function showHome(){
  ?>
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
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
