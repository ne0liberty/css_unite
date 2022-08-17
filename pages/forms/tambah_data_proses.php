<?php
                 include('../../conf/conn.php');
				
                //melakukan pengecekan jika button submit diklik maka akan menjalankan perintah simpan dibawah ini
                 if (isset($_POST['submit'])) {
                  //menampung data dari inputan

                  $entry_date = $_POST['entry_date'];
                  $req_scheme = $_POST['req_scheme'];
                  $tracking_no = $_POST['tracking_no'];
                  $po_number = $_POST['po_number'];
                  $part_number = $_POST['part_number'];
                  $description = $_POST['description'];
                  $pr = $_POST['pr'];
                  $aircraft = $_POST['aircraft'];
                  $vendor = $_POST['vendor'];
                  $note = $_POST['note'];
        
                  //query untuk menambahkan barang ke database, pastikan urutan nya sama dengan di database
                  $datas = mysqli_query($koneksi, "INSERT INTO master_order (entry_date,req_scheme,tracking_no,po_number,part_number,description,pr,aircraft,vendor,note)
                  VALUES('$entry_date', '$req_scheme','$tracking_no','$po_number','$part_number','$description','$pr','$aircraft','$vendor','$note')") or die(mysqli_error($koneksi));
                  //id barang tidak dimasukkan, karena sudah menggunakan AUTO_INCREMENT, id akan otomatis
        
                  //ini untuk menampilkan alert berhasil dan redirect ke halaman index
                   echo "<script>alert('data berhasil disimpan.');window.location='../../index.php?page=data_order';</script>";
                 }

                
                ?>