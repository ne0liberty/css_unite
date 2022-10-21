<?php				
			include '../../conf/conn.php'; //menghubungkan ke file koneksi untuk ke database
			$id = $_GET['id']; //menampung id

			//query hapus
			$datas = mysqli_query($koneksi, "UPDATE master_order SET serv_status='CANCEL' WHERE id_order='$id'") or die(mysqli_error($koneksi));

			//alert dan redirect ke index.php
			echo "<script>alert('order cancelled.');window.location='../../index.php?page=data_order';</script>";
	?>
