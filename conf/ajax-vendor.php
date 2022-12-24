<?php
//membuat koneksi ke database
//$koneksi2 = mysqli_connect("127.0.0.1", "gustaf", "password", "css_order");

include 'conn.php';
//variabel nim yang dikirimkan form.php
$vendor = $_GET['vendor'];

//mengambil data
$query = mysqli_query($koneksi, "select * from vendor_database where vendor='$vendor'");
$address_lookup = mysqli_fetch_array($query);
$data = array(
    'address1'      =>  @$address_lookup['address1'],
    'address2'      =>  @$address_lookup['address2'],);

//tampil data
echo json_encode($data);
?>
