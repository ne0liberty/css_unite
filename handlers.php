<?php
ini_set('allow_url_fopen',1);

if( !headers_sent() && '' == session_id() ) {
session_start();
}

switch (@parse_url($_SERVER['REQUEST_URI'])['path']) {
  case '/':                   // URL (without file name) to a default screen
    require 'pages/login.php';
    break;
  case '/index.php':
    require 'index.php';
    break;
  //case '/index.php?page=dashboard';
  //   require 'index.php';
  //   break;
  case '/pages/login.php':
     require 'pages/login.php';
     break;
  case '/pages/logout.php':
     require 'pages/logout.php';
     break;
  case '/conf/ajax.php':
     require 'conf/ajax.php';
     break;
  case '/conf/ajax-vendor.php':
     require 'conf/ajax-vendor.php';
     break;
  case '/conf/display-script.php':
     require 'conf/display-script.php';
     break;
  case '/conf/upd-pn-database.php':
     require 'conf/upd-pn-database.php';
     break;
  case '/conf/upd-vendor-database.php':
     require 'conf/upd-vendor-database.php';
     break;
  case '/conf/api_upd_status.php':
     require 'conf/api_upd_status.php';
     break;
  case '/conf/api_del_pn_dtbase.php':
     require 'conf/api_del_pn_dtbase.php';
     break;
  case '/pages/tables/hapus_pn_database.php':
     require 'pages/tables/hapus_pn_database.php';
     break;
  case '/pages/tables/api_cancel_order.php':
     require 'pages/tables/api_cancel_order.php';
     break;
  case '/pages/tables/api_delete_order.php':
     require 'pages/tables/api_delete_order.php';
     break;
  case '/pages/forms/shipment_order_sheet.php':
     require 'pages/forms/shipment_order_sheet.php';
     break;
  case '/pages/forms/ca_sheet.php':
   require 'pages/forms/ca_sheet.php';
   break;
  default:
     http_response_code(404);
     exit('Not Found');
}

?>
