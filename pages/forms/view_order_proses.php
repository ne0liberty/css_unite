<?php
        include('../../conf/conn.php');
				
                //melakukan pengecekan jika button submit diklik maka akan menjalankan perintah simpan dibawah ini
                 if (isset($_POST['submit'])) {
                  //menampung data dari inputan

                  $note = $_POST['note'];
            
                  $repair_tat = $_POST['repair_tat'];
                  $po_date = $_POST['po_date'];
                  $awb_in = $_POST['awb_in'];
                  $awb_date = $_POST['awb_date'];
                  $eta = $_POST['eta'];
                  $gr_date = $_POST['gr_date'];
                  $serial_number = $_POST['serial_number'];
                  $serv_batch = $_POST['serv_batch'];
                  $date_store = $_POST['date_store'];
                  
                  $pn_out = $_POST['pn_out'];
                  $sn_out = $_POST['sn_out'];
                  $core_batch = $_POST['core_batch'];
                  $shipment_order_date = $_POST['shipment_order_date'];
                  $awb_out = $_POST['awb_out'];
                  $awb_out_date = $_POST['awb_out_date'];
                  $core_cond = $_POST['core_cond'];
        
                  // update data ke database
                  mysqli_query($koneksi, "UPDATE master_order SET note='$note', repair_tat='$repair_tat', po_date='$po_date', awb_in='$awb_in', awb_date='$awb_date', eta='$eta', gr_date='$gr_date', serial_number='$serial_number', serv_batch='$serv_batch', date_store='$date_store', pn_out='$pn_out', sn_out='$sn_out', core_batch='$core_batch', shipment_order_date='$shipment_order_date', awb_out='$awb_out', awb_out_date='$awb_out_date', core_cond='$core_cond' WHERE id_order='$id'");                 
        
                  //ini untuk menampilkan alert berhasil dan redirect ke halaman index
                  echo "<script>alert('data berhasil disimpan.');window.location='../../index.php?page=data_order';</script>";
                 }

                
?>