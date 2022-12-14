<?php
//membuat koneksi ke database
//$koneksi2 = mysqli_connect("127.0.0.1", "gustaf", "password", "css_order");
include('conn.php');
//variabel nim yang dikirimkan form.php
$part_number = $_GET['part_number'];

//mengambil data
$query = mysqli_query($koneksi, "select * from pn_database where part_number='$part_number'");
$desc_lookup = mysqli_fetch_array($query);
$data = array('desc_id'      =>  @$desc_lookup['description'],);

//tampil data
echo json_encode($data);
?>
