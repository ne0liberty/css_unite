<?php
//membuat koneksi ke database
$koneksi2 = mysqli_connect("localhost", "root", "", "css_order");

$id = $_GET['id'];
$sql = "SELECT * from pn_database WHERE part_number=".$id."";
$query = mysqli_query($koneksi2,$sql);
$data = mysqli_fetch_array($query);

echo json_encode($data);
?>