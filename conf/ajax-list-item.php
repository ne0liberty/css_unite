<?php
//membuat koneksi ke database
//$koneksi2 = mysqli_connect("127.0.0.1", "gustaf", "password", "css_order");
include('conn.php');
//variabel nim yang dikirimkan form.php
$vendor_shipment = $_GET['vendor'];

//mengambil data
$query = mysqli_query($koneksi, "SELECT * FROM master_order WHERE vendor='$vendor_shipment'");
$address_lookup = mysqli_fetch_array($query);
$data = array(
    'address1'      =>  @$address_lookup['address1'],
    'address2'      =>  @$address_lookup['address2'],);

//tampil data
echo json_encode($data);
?>
