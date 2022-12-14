<?php

 $server 	  = "";
 $username	= "root";
 $password	= "password";
 $db 		    = "css_order" ; //sesuaikan nama databasenya
 $GCSocket  = "/cloudsql/css-unite:asia-southeast2:cssunite01";
 $GCPort    = "3306";


 $koneksi   = mysqli_connect($server, $username, $password, $db, $GCPort ,$GCSocket);

 // untuk cek jika koneksi gagal ke database
 if(mysqli_connect_errno()) {
 	echo "SQL koneksi gagal : ".mysqli_connect_error();
 }else{
  $query  = "SELECT * FROM admins WHERE username = 'gustaf'";
  $result = mysqli_query($koneksi,$query);

  while($row = mysqli_fetch_array($result)) {
     echo $row['name'];
   }
 }

?>
