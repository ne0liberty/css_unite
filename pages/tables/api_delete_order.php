<?php				
			include '../../conf/conn.php'; //menghubungkan ke file koneksi untuk ke database
			$id = $_GET['id']; //menampung id

			//query hapus
			$datas = mysqli_query($koneksi, "delete from master_order where id_order='$id'") or die(mysqli_error($koneksi));

			//alert dan redirect ke index.php
			echo "<script>alert('Delete Success.');window.location='../../index.php?page=data_order';</script>";
	?>
