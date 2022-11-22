<?php
$nama = ucwords($_SESSION['NAME']);
?>

<!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Vendor Database</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item">Database</li>
              <li class="breadcrumb-item active">Vendor Database</li>
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
                  <label>Vendor</label>
                    <select class="form-control select2bs4" id='vendor' name="vendor" onchange="isi_otomatis();loadData()" style="width: 100%;">
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
                    <textarea class="form-control" rows="7" id="address1" name="address"></textarea>
                  </div>
                    
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="address" value="" onclick="getElements()">
                    <label class="form-check-label">Address 2</label>
                    <textarea class="form-control" rows="7" id="address2" name="address_2"></textarea>
                  </div>
                    
                </div>
                
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            
          </div>
        </div>
        <!-- /.card -->
        
      </div>
    </form>
      
      <!-- Autofillss -->
      <script src="plugins/jquery/jquery-1.12.4.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

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
       
       document.getElementById('datePicker').value = new Date().toDateInputValue();

      </script>
  </section>

  
  <!-- /.content-wrapper -->

  
