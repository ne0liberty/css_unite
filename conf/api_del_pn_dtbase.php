<?php
			include 'conn.php'; //menghubungkan ke file koneksi untuk ke database
			$id = $_GET['part_number']; //menampung id

			//query hapus
			$datas = mysqli_query($koneksi, "delete from pn_database where part_number='$id'") or die(mysqli_error($koneksi));

			//alert dan redirect ke index.php
			echo "<script>alert('Delete Success.');window.location='../index.php?page=pn_database';</script>";
	?>
