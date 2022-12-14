<?php

//if( !headers_sent() && '' == session_id() ) {
//  session_start();
//  }

switch (@parse_url($_SERVER['REQUEST_URI'])['path']) {
  case '/':                   // URL (without file name) to a default screen
     require 'index.php';
     break;
  case '/pages/login.php':
     require 'pages/login.php';
     break;
  case '/pages/logout.php':
     require 'pages/logout.php';
     break;
  case '/index.php?pages=dashboard';
     require 'index.php';
     break;
  default:
     http_response_code(404);
     exit('Not Found');
}

?>
