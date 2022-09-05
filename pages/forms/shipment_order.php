

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
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <div class="form-group">
                      <label>Shipment Consignee</label>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="shipmnt_csg" value="a" checked>
                        <label class="form-check-label">Normal</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="shipmnt_csg" value="b">
                        <label class="form-check-label">AOG</label>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item">
                    <div class="form-group">
                      <label>Goods Category</label>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="goods_cat" value="a">
                        <label class="form-check-label">Dangerous Goods (DG)</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="goods_cat" value="b" checked>
                        <label class="form-check-label">General Cargo (Genco)</label>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item">
                    <div class="form-group">
                      <label>Mode of Shipment</label>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="shipment_mode" value="a" checked>
                            <label class="form-check-label">Air Freight</label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="shipment_mode" value="b">
                            <label class="form-check-label">Sea Freight</label>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="shipment_mode" value="c">
                            <label class="form-check-label">Land Freight</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item">
                    <div class="form-group">
                      <label>Customer assign GMF Logistic Services to ship good(s)</label>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="log_service" value="a" checked>
                            <label class="form-check-label">DAP</label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="log_service" value="b">
                            <label class="form-check-label">DDP</label>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="log_service" value="c">
                            <label class="form-check-label">DAT</label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="log_service" value="d">
                            <label class="form-check-label">CPT</label>
                          </div>
                        </div> 
                      </div>
                    </div>
                  </li>
                </ul>
                <div class="form-group">
                    <label>Remove From (Tail No)</label>
                    <input type="text" id="tail_no" name="tail_no" value="PK-" class="form-control">
                </div>
                <div class="form-group">
                    <label>Payment Responsibility</label>
                    <input type="text" id="paymnt_respn" name="paymnt_respn" value="PT GMF Aeroasia" class="form-control">
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
            <button type="submit" name="submit" class="btn btn-default" href=""><i class="fas fa-print"></i> Print</a></button>
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
                  $shipmnt_csg = $_POST['shipmnt_csg'];
                  $goods_cat = $_POST['goods_cat'];
                  $shipment_mode = $_POST['shipment_mode'];
                  $log_service = $_POST['log_service'];
                  $tail_no = $_POST['tail_no'];
                  $paymnt_respn = $_POST['paymnt_respn'];
                  
                  $datas = mysqli_query($koneksi, "INSERT INTO shipment_order (shipment_order_date,vendor,address,created_by,shipmnt_csg,goods_cat,shipment_mode,log_service,tail_no,paymnt_respn)
                  VALUES('$shipment_order_date', '$vendor','$address','$created_by','$shipmnt_csg','$goods_cat','$shipment_mode','$log_service','$tail_no','$paymnt_respn')") or die(mysqli_error($koneksi));
                  
                  $last_id = mysqli_insert_id($koneksi);
                 
          

                  //echo "<script>window.location.href = 'pages/forms/shipment_order_page.php?id=".$last_id."';</script>";
                  echo "<script>window.open('pages/forms/shipment_order_page.php?id=".$last_id."', '_blank');</script>";
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
       
       document.getElementById('datePicker').value = new Date().toDateInputValue();

      </script>
  </section>

  </div>
  <!-- /.content-wrapper -->

  
