<?php

$server 	= "localhost";
$username	= "root";
$password	= "";
$db 		= "css_order"; //sesuaikan nama databasenya
$koneksi    = mysqli_connect($server, $username, $password, $db); //pastikan urutan pemanggilan variabel nya sama.

//untuk cek jika koneksi gagal ke database
if(mysqli_connect_errno()) {
	echo "SQL koneksi gagal : ".mysqli_connect_error();
}else{
 $query  = "SELECT * FROM admins WHERE username = 'gustaf_123'";
 $result = mysqli_query($koneksi,$query);
 
 while($row = mysqli_fetch_array($result)) {
    echo $row['name']; 
	}
}

?>