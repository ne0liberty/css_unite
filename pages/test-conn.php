<?php

  $server 	  = "";
  $username	  = "root";
  $password	  = "password";
  $db 		    = "css_order" ; //sesuaikan nama databasenya
  $GCSocket   = "/cloudsql/css-unite:asia-southeast2:cssunite01";
  $GCPort     = "3306";


 $koneksi   = mysqli_connect($server, $username, $password, $db, $GCPort ,$GCSocket);

 // untuk cek jika koneksi gagal ke database
 if(mysqli_connect_errno()) {
 	echo "SQL koneksi gagal : ".mysqli_connect_error();
 }else{
	$query2  = "SELECT * FROM admins WHERE username = 'test'";
	$result2 = mysqli_query($koneksi,$query2);

	while($row2 = mysqli_fetch_array($result2)) {
    echo $row2['name'] ."from pages";
  }
  }


?>
