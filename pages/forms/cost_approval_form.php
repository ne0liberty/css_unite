
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cost Approval</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="Index.php">Home</a></li>
              <li class="breadcrumb-item"><a href="index.php?page=data_order">All Order</a></li>
              <li class="breadcrumb-item active">Cost Approval</li>
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
                  <h3 class="card-title">PO <strong><?php echo $row_view['po_number']; ?></strong></h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>CA date</label>
                            <input type="date" name="ca_date" class="form-control" placeholder="Masukkan" 
                            value="<?php echo date('Y-m-d'); ?>">
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
                        <div class="form-group">
                          <label>Description</label>
                          <input type="text" name="description" class="form-control" placeholder="Masukkan" disabled="disabled" value="<?php echo $row_view['description']; ?>">
                        </div> 
                        <div class="form-group">
                          <label>Core Part Number</label>
                          <input type="text" name="pn_out" class="form-control" placeholder="Masukkan" disabled="disabled" value="<?php echo $row_view['pn_out']; ?>">
                        </div>  
                        <div class="form-group">
                          <label>Core Serial Number</label>
                          <input type="text" name="sn_out" class="form-control" placeholder="Masukkan" disabled="disabled" value="<?php echo $row_view['sn_out']; ?>">
                        </div> 
                        <div class="form-group">
                          <label>Date Received</label>
                          <input type="text" name="awb_out_date" class="form-control" placeholder="Masukkan" disabled="disabled" value="<?php echo $row_view['awb_out_date']; ?>">
                        </div> 
                    </div>

                    <?php
                    $part_number = $row_view['pn_out'];

                    $data3 = mysqli_query($koneksi, "select * from pn_database where part_number='$part_number'");
                    $row_view_pn = mysqli_fetch_assoc($data3);

                    ?>

                    <!-- right column -->
                    <div class="col-md-6">
                      <div class="form-group">
                          <label>Proforma Invoice / Invoice</label>
                          <input type="text" name="ref_pi" class="form-control" placeholder="Enter" value="">
                      </div> 
                      <div class="form-group">
                        <label>New Price</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                          </div>
                          <input type="text" class="form-control" value="<?php echo $row_view_pn['pn_newprice']; ?>" readonly>
                          
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Repair Cost</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                          </div>
                          <input type="text" class="form-control">
                          
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Other Cost</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                          </div>
                          <input type="text" class="form-control">
                          
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Total</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                          </div>
                          <input type="text" readonly class="form-control">
                          
                        </div>
                      </div>
                    </div>
                  <!-- /.card-body -->
                  </div>
                </div>
                <div class="card-footer">
                          <button type="submit" name="" class="btn btn-secondary"><i class="fas fa-print"></i> Print CA Sheet</button>
                </div>
        </div>
      </div>       
    </form>
    <?php
        include('conf/conn.php');
				
                //melakukan pengecekan jika button submit diklik maka akan menjalankan perintah simpan dibawah ini
                 if (isset($_POST['submit'])) {
                  //menampung data dari inputan

                  // $note = $_POST['note'];
            
                  
        
                  // update data ke database
                  // $update1 = mysqli_query($koneksi, "UPDATE master_order SET note='$note', repair_tat='$repair_tat', po_date='$po_date', awb_in='$awb_in', awb_date='$awb_date', eta='$eta', gr_date='$gr_date', serial_number='$serial_number', serv_batch='$serv_batch', date_store='$date_store', pn_out='$pn_out', sn_out='$sn_out', core_batch='$core_batch', shipment_order_date='$shipment_order_date', awb_out='$awb_out', awb_out_date='$awb_out_date', core_cond='$core_cond' WHERE id_order='$id'");                 
                  // $update2 = mysqli_query($koneksi, "UPDATE master_order SET serv_status=IF(awb_in='','Waiting AWB',IF(gr_date='','SHIPPED',IF(date_store='','Waiting Inspect','CLOSED')));");

                  $ca_id = $row_view['id'];

                  //ini untuk menampilkan alert berhasil dan redirect ke halaman index
                  echo "<script>window.open('pages/forms/ca_sheet.php?id=".$ca_id."', '_blank');</script>";
                 }       
      ?>

  </section>

</div>
  <!-- /.content-wrapper -->
  