

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Shipment Order</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item">Order</li>
              <li class="breadcrumb-item active">Create Shipment Order</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <form action="" method="post" role="form">
      <div class="container-fluid">
        <!-- Tittle  -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title"><i class="fas fa-tag"></i>
            Shipment Order</h3>
            <div class="card-tools">
              
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <label>Shipment order date</label>
                    <input type="date" name="entry_date" class="form-control" placeholder="Masukkan">
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
                    <label>Description</label>
                    <input type="text" readonly id="desc" name="description" class="form-control">

                </div>
                
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" name="submit" class="btn btn-primary">Print</button>
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
                  $datas = mysqli_query($koneksi, "INSERT INTO master_order (entry_date,req_scheme,tracking_no,po_number,part_number,description,pr,aircraft,vendor,note,created_by)
                  VALUES('$entry_date', '$req_scheme','$tracking_no','$po_number','$part_number','$description','$pr','$aircraft','$vendor','$note','$created_by')") or die(mysqli_error($koneksi));
                  //id barang tidak dimasukkan, karena sudah menggunakan AUTO_INCREMENT, id akan otomatis
        
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

  </div>
  <!-- /.content-wrapper -->

  
