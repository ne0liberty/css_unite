<?php

//membuat koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "latihan");

//variabel nim yang dikirimkan form.php
$nim = $_REQUEST['nim'];

//mengambil data
$query = mysqli_query($koneksi, "select * from latihan_autofill where nim='$nim'");
$mahasiswa = mysqli_fetch_array($query);
$data = array(
            'nama'      =>  @$mahasiswa['nama'],
            'jeniskelamin' =>  @$mahasiswa['jeniskelamin'],
            'jurusan'   =>  @$mahasiswa['jurusan'],
            'notelp'      =>  @$mahasiswa['notelp'],
            'email'      =>  @$mahasiswa['email'],
            'alamat'    =>  @$mahasiswa['alamat'],);

//tampil data
echo json_encode($data);
?>
