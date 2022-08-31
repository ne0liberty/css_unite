
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Order Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Order Form</li>
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
        <!-- View Order -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">View Order <strong><?php echo $row_view['po_number']; ?></strong></h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
             
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <label>Entry date</label>
                    <input type="date" name="entry_date" class="form-control" disabled="disabled" placeholder="Masukkan" value="<?php echo $row_view['entry_date']; ?>">
                  </div>
                <div class="form-group">
                  <label>Scheme</label>
                  <select class="form-control" name="req_scheme" disabled="disabled">
                          <option value="<?php echo $row_view['req_scheme']; ?>"><?php echo $row_view['req_scheme']; ?></option>
                          <option>Exchange</option>
                          <option>Repair</option>
                      </select>
                </div>
                <div class="form-group">
                  <label>Tracking Number</label>
                  <input type="text" name="tracking_no" class="form-control" disabled="disabled" placeholder="Masukkan" value="<?php echo $row_view['tracking_no']; ?>">
                </div>
                <div class="form-group">
                  <label>PO Number</label>
                   <input type="text" name="po_number" class="form-control" disabled="disabled" placeholder="Masukkan" value="<?php echo $row_view['po_number']; ?>">
                </div>
                <div class="form-group">
                  <label>Vendor</label>
                    <select class="form-control select2bs4" name="vendor" disabled="disabled" style="width: 100%;">
                      <option value="<?php echo $row_view['vendor']; ?>"><?php echo $row_view['vendor']; ?></option>
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
                    <select class="form-control select2bs4" name="part_number" disabled="disabled" style="width: 100%;" >
                      <option value="<?php echo $row_view['part_number']; ?>"><?php echo $row_view['part_number']; ?></option>
                      <?php 
                            include('conf/conn.php');
                            
                            $datas2 = mysqli_query($koneksi, "SELECT * FROM pn_database") or die (mysqli_error($koneksi));
                            while($data_pn_number = mysqli_fetch_array($datas2))  {
                              echo "<option>$data_pn_number[part_number]</option>";
                          }
                      ?>
                  </select>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <input type="text" name="description" class="form-control" placeholder="Masukkan" disabled="disabled" value="<?php echo $row_view['description']; ?>">
                </div>
                <div class="form-group">
                    <label>PR</label>
                    <input type="text" name="pr" class="form-control" placeholder="Masukkan" disabled="disabled" value="<?php echo $row_view['pr']; ?>">
                </div>
                <div class="form-group">
                    <label>Aircraft</label>
                    <input type="text" name="aircraft" class="form-control" disabled="disabled" placeholder="Masukkan" value="<?php echo $row_view['aircraft']; ?>">
                </div>
                
              </div>             
              <!-- /.col -->  
            </div>
            <!-- /.row -->
            <div class="form-group">
                    <label>Note</label>
                    <textarea type="text" class="form-control" rows="3" name="note" placeholder="Enter ..."><?php echo $row_view['note']; ?></textarea>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
          </div>
        </div>
        <!-- /.card -->
        
        <!-- Serv Part -->
        <div class="card card-default collapsed-card">
          <div class="card-header">
            <h3 class="card-title">Incoming <strong><?php echo $row_view['po_number']; ?></strong></h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-plus"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <label>TAT (Days)</label>
                    <input type="text" name="repair_tat" class="form-control" placeholder="Masukkan" value="<?php echo $row_view['repair_tat']; ?>">
                  </div>
                  <div class="form-group">
                    <label>PO date</label>
                    <input type="date" name="po_date" class="form-control" placeholder="Masukkan" value="<?php echo $row_view['po_date']; ?>">
                </div>
                <div class="form-group">
                  <label>AWB Incoming</label>
                  <input type="text" name="awb_in" class="form-control" placeholder="Masukkan" value="<?php echo $row_view['awb_in']; ?>">
                </div>
                <div class="form-group">
                  <label>AWB Date</label>
                   <input type="date" name="awb_date" class="form-control" placeholder="Masukkan" value="<?php echo $row_view['awb_date']; ?>">
                </div>
                <div class="form-group">
                    <label>ETA</label>
                    <input type="date" name="eta" class="form-control" placeholder="Masukkan" value="<?php echo $row_view['eta']; ?>">
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                
                <div class="form-group">
                    <label>GR date</label>
                    <input type="date" name="gr_date" class="form-control" placeholder="Masukkan" value="<?php echo $row_view['gr_date']; ?>">
                </div>
                <div class="form-group">
                    <label>Serial Number</label>
                    <input type="text" name="serial_number" class="form-control" placeholder="Masukkan" value="<?php echo $row_view['serial_number']; ?>">
                </div>
                <div class="form-group">
                    <label>Batch</label>
                    <input type="text" name="serv_batch" class="form-control" placeholder="Masukkan" value="<?php echo $row_view['serv_batch']; ?>">
                </div>
                <div class="form-group">
                    <label>Store Date</label>
                    <input type="date" name="date_store" class="form-control" placeholder="Masukkan" value="<?php echo $row_view['date_store']; ?>">
                </div>
              </div>             
              <!-- /.col -->  
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
          </div>
        </div>
        <!-- /.card -->
        
        <!-- Outgoing Part -->
        <div class="card card-default collapsed-card">
          <div class="card-header">
            <h3 class="card-title">Outgoing <strong><?php echo $row_view['po_number']; ?></strong></h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-plus"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <label>PN Out</label>
                    <input type="text" name="pn_out" class="form-control" placeholder="Masukkan" value="<?php echo $row_view['pn_out']; ?>">
                </div>
                <div class="form-group">
                    <label>SN Out</label>
                    <input type="text" name="sn_out" class="form-control" placeholder="Masukkan" value="<?php echo $row_view['sn_out']; ?>">
                </div>
                <div class="form-group">
                  <label>Core Batch</label>
                  <input type="text" name="core_batch" class="form-control" placeholder="Masukkan" value="<?php echo $row_view['core_batch']; ?>">
                </div>
                <div class="form-group">
                  <label>Shipment Order Date</label>
                   <input type="date" name="shipment_order_date" class="form-control" placeholder="Masukkan" value="<?php echo $row_view['shipment_order_date']; ?>">
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                
                <div class="form-group">
                    <label>AWB Out</label>
                    <input type="text" name="awb_out" class="form-control" placeholder="Masukkan" value="<?php echo $row_view['awb_out']; ?>">
                </div>
                <div class="form-group">
                    <label>AWB Out Date</label>
                    <input type="date" name="awb_out_date" class="form-control" placeholder="Masukkan" value="<?php echo $row_view['awb_out_date']; ?>">
                </div>
                <div class="form-group">
                  <label>Core Condition</label>
                  <select class="form-control" name="core_cond">
                          <option value="<?php echo $row_view['core_cond']; ?>"><?php echo $row_view['core_cond']; ?></option>
                          <option>Unserviceable</option>
                          <option>Serviceable</option>
                      </select>
                </div>
              </div>             
              <!-- /.col -->  
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
            <button type="submit" name="submit-shipmentorder" class="btn btn-default">Shipment Order</button>
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
                  $update1 = mysqli_query($koneksi, "UPDATE master_order SET note='$note', repair_tat='$repair_tat', po_date='$po_date', awb_in='$awb_in', awb_date='$awb_date', eta='$eta', gr_date='$gr_date', serial_number='$serial_number', serv_batch='$serv_batch', date_store='$date_store', pn_out='$pn_out', sn_out='$sn_out', core_batch='$core_batch', shipment_order_date='$shipment_order_date', awb_out='$awb_out', awb_out_date='$awb_out_date', core_cond='$core_cond' WHERE id_order='$id'");                 
                  $update2 = mysqli_query($koneksi, "UPDATE master_order SET serv_status=IF(awb_in='','Waiting AWB',IF(gr_date='','SHIPPED',IF(date_store='','Waiting Inspect','CLOSED')));");


                  //ini untuk menampilkan alert berhasil dan redirect ke halaman index
                  echo "<script>alert('data berhasil disimpan.');window.location='index.php?page=data_order';</script>";
                 }       
      ?>

<?php
        include('conf/conn.php');
				
                //melakukan pengecekan jika button submit diklik maka akan menjalankan perintah simpan dibawah ini
                 if (isset($_POST['submit-shipmentorder'])) {
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
                  $update1 = mysqli_query($koneksi, "UPDATE master_order SET note='$note', repair_tat='$repair_tat', po_date='$po_date', awb_in='$awb_in', awb_date='$awb_date', eta='$eta', gr_date='$gr_date', serial_number='$serial_number', serv_batch='$serv_batch', date_store='$date_store', pn_out='$pn_out', sn_out='$sn_out', core_batch='$core_batch', shipment_order_date='$shipment_order_date', awb_out='$awb_out', awb_out_date='$awb_out_date', core_cond='$core_cond' WHERE id_order='$id'");                 
                  $update2 = mysqli_query($koneksi, "UPDATE master_order SET serv_status=IF(awb_in='','Waiting AWB',IF(gr_date='','SHIPPED',IF(date_store='','Waiting Inspect','CLOSED')));");
                  

                  //ini untuk menampilkan alert berhasil dan redirect ke halaman index
                  echo "<script>alert('data berhasil disimpan.');window.location='index.php?page=shipment_order_single&id=".$id."';</script>";
                 }       
      ?>

  </section>

</div>
  <!-- /.content-wrapper -->
  