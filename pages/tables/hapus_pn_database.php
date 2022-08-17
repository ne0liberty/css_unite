<?php				
			include '../../conf/conn.php'; //menghubungkan ke file koneksi untuk ke database
			$part_number = $_GET['part_number']; //menampung id

			//query hapus
			$datas = mysqli_query($koneksi, "delete from pn_database where part_number='$part_number'") or die(mysqli_error($koneksi));

			//alert dan redirect ke index.php
			echo "<script>alert('data berhasil dihapus.');window.location='../../index.php?page=pn_database';</script>";
	?>
