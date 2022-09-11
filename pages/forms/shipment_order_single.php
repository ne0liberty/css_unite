

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
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="Index.php">Home</a></li>
              <li class="breadcrumb-item"><a href="index.php?page=data_order">All Order</a></li>
              <li class="breadcrumb-item"><a href="javascript:history.back()">View Order</a></li>
              <li class="breadcrumb-item active">Create Shipment Order</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <?php
      include('conf/conn.php');
      $id = $_GET['id']; //mengambil id barang yang ingin diubah

      //menampilkan barang berdasarkan id
      $data2 = mysqli_query($koneksi, "select * from master_order where id_order='$id'");
      $row_view = mysqli_fetch_assoc($data2);
      ?>
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
                    <input type="date" name="shipment_order_date" readonly class="form-control" placeholder="Masukkan" value="<?php echo $row_view['shipment_order_date']; ?>">
                </div>

                <div class="form-group">
                    <label>Vendor</label>
                    <input type="text" readonly id="desc" name="vendor" value="<?php echo $row_view['vendor']; ?>" class="form-control">
                </div>
                
                <?php
                  $vendorname = $row_view['vendor'];

                  //menampilkan barang berdasarkan id
                  $datavendor = mysqli_query($koneksi, "SELECT * FROM vendor_database WHERE vendor='$vendorname'");
                  $row_vendor = mysqli_fetch_assoc($datavendor);

                
                ?>

                <div class="form-group">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="address" value="<?php echo $row_vendor['address1']; ?>" checked>
                    <label class="form-check-label">Address 1</label>
                    <textarea class="form-control" rows="7" name="address" id="address1" value="" readonly><?php echo $row_vendor['address1']; ?></textarea>
                  </div>
                    
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="address" value="<?php echo $row_vendor['address2']; ?>">
                    <label class="form-check-label">Address 2</label>
                    <textarea class="form-control" rows="7" name="address_2" id="address2" value="" readonly><?php echo $row_vendor['address2']; ?></textarea>
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
               <label>Item List</label>
                <table id="example3" class="table table-bordered">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Description</th>
                    <th>Part Number</th> 
                    <th>Serial Number</th>
                    <th>Tracking No</th>
                    <th>PO Number</th>
                    <th>Condition</th>
                  </tr>
                  </thead>
                  <tr>
                    <td>1</td>
                    <td><?php echo $row_view['description']; ?></td>
                    <td><?php echo $row_view['pn_out']; ?></td>
                    <td><?php echo $row_view['sn_out']; ?></td>
                    <td><?php echo $row_view['tracking_no']; ?></td>
                    <td><?php echo $row_view['po_number']; ?></td>
                    <td><?php echo $row_view['core_cond']; ?></td>  
					        </tr>                  
                </table>
                
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
                  echo "<script>window.open('pages/forms/shipment_order_sheet.php?id=".$last_id."', '_blank');</script>";
                 }
                  
                  
                ?>
      
      <!-- Autofillss -->
      <script src="plugins/jquery/jquery-1.12.4.min.js"></script>

      <!-- Select2 -->
      <script src="plugins/select2/js/select2.full.min.js"></script>
      
      
      <script type="text/javascript">
            
        
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

  
