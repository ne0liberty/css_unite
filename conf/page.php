<?php
if(isset($_GET['page'])){
  $page = $_GET['page'];
switch ($page) {
// Beranda
  case 'data_order':
    include 'pages/tables/data_order.php';
    break;
    case 'tambah_data':
    include 'pages/forms/tambah_data.php';
    break;
    case 'view_order':
    include 'pages/forms/view_order.php';
    break;
    case 'pn_database':
    include 'pages/tables/pn_database.php';
    break;
    case 'shipment_order':
    include 'pages/forms/shipment_order.php';
    break;
  }
}else{
    include "pages/beranda.php";
  }
?> 
