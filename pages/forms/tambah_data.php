

<!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Order Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item">Order</li>
              <li class="breadcrumb-item active">Create Order Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <form action="" method="post" role="form">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">New Request</h3>
            <div class="card-tools">
              
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <label>Entry date</label>
                    <input type="date" name="entry_date" class="form-control" placeholder="Masukkan" value="<?php echo date('Y-m-d'); ?>">
                  </div>
                <div class="form-group">
                  <label>Scheme</label>
                  <select class="form-control" name="req_scheme">
                          <option>Exchange</option>
                          <option>Repair</option>
                      </select>
                </div>
                <div class="form-group">
                  <label>Tracking Number</label>
                  <input type="text" name="tracking_no" class="form-control" placeholder="Masukkan">
                </div>
                <div class="form-group">
                  <label>PO Number</label>
                   <input type="text" name="po_number" class="form-control" placeholder="Masukkan">
                </div>
                <div class="form-group">
                  <label>Vendor</label>
                    <select class="form-control select2bs4" name="vendor" style="width: 100%;">
                      <option value="">- Select Vendor -</option>
                      <?php 
                            include('conf/conn.php');
                            
                            $datas3 = mysqli_query($koneksi, "SELECT * FROM vendor_database") or die (mysqli_error($koneksi));
                            while($data_vendor = mysqli_fetch_array($datas3))  {
                              
                              echo "<option>$data_vendor[vendor]</option>";
                          }
                      ?>
                  </select>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>Part Number</label>
                    <select class="form-control select2bs4" id='part_number' name="part_number" onchange="isi_otomatis()" style="width: 100%;">\
                      <option value="" selected="selected">- Select Part Number -</option>
                      <?php 
                            include('conf/conn.php');
                            
                            $datas2 = mysqli_query($koneksi, "SELECT * FROM pn_database") or die (mysqli_error($koneksi));   
                            while($data_pn_number = mysqli_fetch_array($datas2))  {
                              echo "<option value =".$data_pn_number['part_number'].">".$data_pn_number['part_number']."</option>";
                              // echo "<option value =".$data_pn_number['part_number'].">".$data_pn_number['part_number']."</option>";
                              // echo "<option>$data_pn_number[part_number]</option>";

                          }
                      ?>
                  </select>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <input type="text" readonly id="desc" name="description" class="form-control">

                </div>
                <div class="form-group">
                    <label>PR</label>
                    <input type="text" name="pr" class="form-control" placeholder="Masukkan">
                </div>
                <div class="form-group">
                    <label>Aircraft</label>
                    <input type="text" name="aircraft" class="form-control" placeholder="Masukkan" value="PK-">
                </div>
                
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          <div class="form-group">
            <label>Note</label>
            <textarea class="form-control" rows="3" name="note" placeholder="Enter ..."></textarea>
          </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
        <!-- /.card -->
        
      </div>
      </form>
      <?php
                 include('conf/conn.php');
				
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
                  $created_by = ucwords($_SESSION['NAME']);
        
                  //query untuk menambahkan barang ke database, pastikan urutan nya sama dengan di database
                  $datas = mysqli_query($koneksi, "INSERT INTO master_order (entry_date,req_scheme,tracking_no,po_number,part_number,description,pr,aircraft,vendor,note,pn_out,created_by)
                  VALUES('$entry_date', '$req_scheme','$tracking_no','$po_number','$part_number','$description','$pr','$aircraft','$vendor','$note','$part_number','$created_by')") or die(mysqli_error($koneksi));
                  $updt_stat = mysqli_query($koneksi, "UPDATE master_order SET serv_status=
                             IF(req_scheme='exchange',
                             IF(awb_in='','NEED AWB IN',
                             IF(gr_date='','SERV SHIPPED',
                             IF(date_store='','NEED INSPECT',
                             IF(sn_out='','NEED CORE',
                             IF(shipment_order_date='','NEED SO',
                             IF(awb_out='','NEED AWB OUT',
                             IF(invoice='','NEED REPAIR QUOTE',
                             IF(ca_app_date='','NEED REPAIR APPROVAL',
                             IF(payment_ref='','NEED PAYMENT',
                             'CLOSED'))))))))),
                             IF(sn_out='','NEED CORE',
                             IF(shipment_order_date='','NEED SO',
                             IF(awb_out='','NEED AWB OUT',
                             IF(invoice='','NEED REPAIR QUOTE',
                             IF(ca_app_date='','NEED REPAIR APPROVAL',
                             IF(payment_ref='','NEED PAYMENT',
                             IF(awb_in='','NEED AWB IN',
                             IF(gr_date='','SERV SHIPPED',
                             IF(date_store='','NEED INSPECT',
                             'CLOSED')))))))))
                             );");   
        
                  //ini untuk menampilkan alert berhasil dan redirect ke halaman index
                   echo "<script>alert('data berhasil disimpan.');window.location='index.php?page=data_order';</script>";
                 }

                
                ?>
      
      <!-- Autofillss -->
      <script src="plugins/jquery/jquery-1.12.4.min.js"></script>

      <!-- Select2 -->
      <script src="plugins/select2/js/select2.full.min.js"></script>
      
      
      <script type="text/javascript">
            function isi_otomatis(){
                var part_number = $("#part_number").val();
                $.ajax({
                    url: 'conf/ajax.php',
                    data:"part_number="+part_number ,
                    cache: false,
                }).success(function (data) {
                    var json = data,
                    obj = JSON.parse(json);
                    $('#desc').val(obj.desc);
                });
                
            }
        
       //Initialize Select2 Elements
       $('.select2').select2()
          
        //Initialize Select2 Elements
       $('.select2bs4').select2({
       theme: 'bootstrap4' 
       })
      </script>
  </section>

  
  <!-- /.content-wrapper -->

  
