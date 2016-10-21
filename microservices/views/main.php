<?php 

Hook('User Is Logged In - Presentation','viewPresentationHook();');
function viewPresentationHook(){
  $segments = explode('/', ltrim($_SERVER['REQUEST_URI'], '/'));
  pd($segments);  
}
