

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
                    <input type="date" name="shipment_order_date" class="form-control" placeholder="Masukkan">
                  </div>
                <div class="form-group">
                  <label>Vendor</label>
                    <select class="form-control select2bs4" id='vendor' name="vendor" onchange="isi_otomatis()" style="width: 100%;">
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

                <script>
                function getElements()
                {
                document.getElementById("address1").value = document.getElementById("address").value;
                }
                
                </script>
                
                <div class="form-group">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="address" value="" onclick="getElements()" checked>
                    <label class="form-check-label">Address 1</label>
                    <textarea class="form-control" rows="7" id="address1" name="address" readonly></textarea>
                  </div>
                    
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="address" value="" onclick="getElements()">
                    <label class="form-check-label">Address 2</label>
                    <textarea class="form-control" rows="7" id="address2" name="address_2" readonly></textarea>
                  </div>
                    
                </div>
                    
                
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                
                <div class="form-group">
                    <label>Item List</label>
                    <input type="text" readonly id="desc" name="description" class="form-control">

                </div>
                
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" name="submit" class="btn btn-default"><i class="fas fa-print"></i> Print</a></button>
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

                  $shipment_order_date = $_POST['shipment_order_date'];
                  $vendor = $_POST['vendor'];
                  $address = $_POST['address']?$_POST['address']:$_POST['address_2'];
                  $created_by = ucwords($_SESSION['NAME']);
        
                  //query untuk menambahkan barang ke database, pastikan urutan nya sama dengan di database
                  $datas = mysqli_query($koneksi, "INSERT INTO shipment_order (shipment_order_date,vendor,address,created_by)
                  VALUES('$shipment_order_date', '$vendor','$address','$created_by')") or die(mysqli_error($koneksi));
                  //id barang tidak dimasukkan, karena sudah menggunakan AUTO_INCREMENT, id akan otomatis
        
                  //ini untuk menampilkan alert berhasil dan redirect ke halaman index
                   echo "<script>alert('data berhasil disimpan.');window.location='pages/forms/shipment_order.html';</script>";
                 }

                
                ?>
      
      <!-- Autofillss -->
      <script src="plugins/jquery/jquery-1.12.4.min.js"></script>

      <!-- Select2 -->
      <script src="plugins/select2/js/select2.full.min.js"></script>
      
      
      <script type="text/javascript">
            function isi_otomatis(){
                var vendor = $("#vendor").val();
                $.ajax({
                    url: 'conf/ajax-vendor.php',
                    data:"vendor="+vendor ,
                    cache: false,
                }).success(function (data) {
                    var json = data,
                    obj = JSON.parse(json);
                    $('#address1').val(obj.address1);
                    $('#address2').val(obj.address2);
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

  
