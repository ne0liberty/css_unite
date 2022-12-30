<style>
  .checkbox-wrapper-46 input[type="checkbox"] {
    display: none;
    visibility: hidden;
  }

  .checkbox-wrapper-46 .cbx {
    margin: auto;
    -webkit-user-select: none;
    user-select: none;
    cursor: pointer;
  }
  .checkbox-wrapper-46 .cbx span {
    display: inline-block;
    vertical-align: middle;
    transform: translate3d(0, 0, 0);
  }
  .checkbox-wrapper-46 .cbx span:first-child {
    position: relative;
    width: 18px;
    height: 18px;
    border-radius: 3px;
    transform: scale(1);
    vertical-align: middle;
    border: 1px solid #9098A9;
    transition: all 0.2s ease;
  }
  .checkbox-wrapper-46 .cbx span:first-child svg {
    position: absolute;
    top: 3px;
    left: 2px;
    fill: none;
    stroke: #FFFFFF;
    stroke-width: 2;
    stroke-linecap: round;
    stroke-linejoin: round;
    stroke-dasharray: 16px;
    stroke-dashoffset: 16px;
    transition: all 0.3s ease;
    transition-delay: 0.1s;
    transform: translate3d(0, 0, 0);
  }
  .checkbox-wrapper-46 .cbx span:first-child:before {
    content: "";
    width: 100%;
    height: 100%;
    background: #506EEC;
    display: block;
    transform: scale(0);
    opacity: 1;
    border-radius: 50%;
  }
  .checkbox-wrapper-46 .cbx span:last-child {
    padding-left: 8px;
  }
  .checkbox-wrapper-46 .cbx:hover span:first-child {
    border-color: #506EEC;
  }

  .checkbox-wrapper-46 .inp-cbx:checked + .cbx span:first-child {
    background: #506EEC;
    border-color: #506EEC;
    animation: wave-46 0.4s ease;
  }
  .checkbox-wrapper-46 .inp-cbx:checked + .cbx span:first-child svg {
    stroke-dashoffset: 0;
  }
  .checkbox-wrapper-46 .inp-cbx:checked + .cbx span:first-child:before {
    transform: scale(3.5);
    opacity: 0;
    transition: all 0.6s ease;
  }

  @keyframes wave-46 {
    50% {
      transform: scale(0.9);
    }
  }
</style>


<!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Order Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?page=dashboard">Home</a></li>
              <li class="breadcrumb-item"><a href="index.php?page=data_order">All Order</a></li>
              <li class="breadcrumb-item active">View Order</li>
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
      $data2 = mysqli_query($koneksi, "SELECT * FROM master_order WHERE id_order='$id'");
      $row_view = mysqli_fetch_assoc($data2);
      ?>

    <form action="" method="post" role="form">
      <div class="container-fluid">
        <!-- View Order -->
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">View Order <strong><?php echo $row_view['po_number']; ?></strong> Created by <?php echo $row_view['created_by']; ?></h3>
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
                  <h5>Status : <a class=
                              "<?php $bgcolor = $row_view['serv_status'];
                              switch ($bgcolor) {
                                case "NEED AWB IN":
                                  echo "badge badge-primary";
                                  break;
                                case "SERV SHIPPED":
                                  echo "badge badge-warning";
                                  break;
                                case "NEED INSPECT":
                                  echo "badge badge-info";
                                  break;
                                case "NEED CORE":
                                  echo "badge badge-danger";
                                  break;
                                case "NEED SO":
                                  echo "badge badge-danger";
                                  break;
                                case "NEED AWB OUT":
                                  echo "badge badge-info";
                                  break;
                                case "NEED REPAIR QUOTE":
                                  echo "badge badge-secondary";
                                  break;
                                case "NEED REPAIR APPROVAL":
                                  echo "badge badge-warning";
                                  break;
                                case "NEED PAYMENT":
                                  echo "badge badge-warning";
                                   break;
                                case "CLOSED":
                                  echo "badge badge-success";
                                  break;
                                case "CANCEL":
                                  echo "badge badge-dark";
                                  break;
                              }
                              ?>"><?= $row_view['serv_status']; ?></a>
                  </h5>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <div class="checkbox-wrapper-46">
                    <input class="inp-cbx" id="cbx-46" type="checkbox" name="fav_order" value="1" <?php if ($row_view['fav_order']=="1") echo "checked"?>/>
                    <label class="cbx" for="cbx-46"><span>
                      <svg width="12px" height="10px" viewbox="0 0 12 10">
                        <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                      </svg></span><span>Highlight Order</span>
                    </label>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <label>Entry date</label>
                    <input type="date" name="entry_date" class="form-control" disabled="disabled" placeholder="Enter ..." value="<?php echo $row_view['entry_date']; ?>">
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
                  <input type="text" name="tracking_no" class="form-control" disabled="disabled" placeholder="Enter ..." value="<?php echo $row_view['tracking_no']; ?>">
                </div>
                <div class="form-group">
                  <label>PO Number</label>
                   <input type="text" name="po_number" class="form-control" disabled="disabled" placeholder="Enter ..." value="<?php echo $row_view['po_number']; ?>">
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
                    <input type="text" name="description" class="form-control" placeholder="Enter ..." disabled="disabled" value="<?php echo $row_view['description']; ?>">
                </div>
                <div class="form-group">
                    <label>PR</label>
                    <input type="text" name="pr" class="form-control" placeholder="Enter ..." disabled="disabled" value="<?php echo $row_view['pr']; ?>">
                </div>
                <div class="form-group">
                    <label>Aircraft</label>
                    <input type="text" name="aircraft" class="form-control" disabled="disabled" placeholder="Enter ..." value="<?php echo $row_view['aircraft']; ?>">
                </div>

              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="form-group">
                    <label>Note</label>
                    <textarea type="text" class="form-control" rows="3" name="note" placeholder="Enter ... "><?php echo $row_view['note']; ?></textarea>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
          </div>
        </div>
        <!-- /.card -->

        <!-- Serv Part -->
        <div class="card card-secondary collapsed-card">
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
                    <label>Repair/Core TAT (Days)</label>
                    <input type="text" name="repair_tat" class="form-control" placeholder="Enter ..." value="<?php echo $row_view['repair_tat']; ?>">
                </div>
                <div class="form-group">
                  <label>AWB Incoming</label>
                  <input type="text" name="awb_in" class="form-control" placeholder="Enter ..." value="<?php echo $row_view['awb_in']; ?>">
                </div>
                <div class="form-group">
                  <label>AWB Date</label>
                   <input type="date" name="awb_date" class="form-control" placeholder="Enter ..." value="<?php echo $row_view['awb_date']; ?>">
                </div>
                <div class="form-group">
                    <label>ETA</label>
                    <input type="date" name="eta" class="form-control" placeholder="Enter ..." value="<?php echo $row_view['eta']; ?>">
                </div>
                <div class="form-group">
                    <label>Inbound</label>
                    <input type="text" name="inbound" class="form-control" placeholder="Enter ..." value="<?php echo $row_view['inbound']; ?>">
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">

                <div class="form-group">
                    <label>GR date</label>
                    <input type="date" name="gr_date" class="form-control" placeholder="Enter ..." value="<?php echo $row_view['gr_date']; ?>">
                </div>
                <div class="form-group">
                    <label>Serial Number</label>
                    <input type="text" name="serial_number" class="form-control" placeholder="Enter ..." value="<?php echo $row_view['serial_number']; ?>">
                </div>
                <div class="form-group">
                    <label>Batch</label>
                    <input type="text" name="serv_batch" class="form-control" placeholder="Enter ..." value="<?php echo $row_view['serv_batch']; ?>">
                </div>
                <div class="form-group">
                    <label>Store Date</label>
                    <input type="date" name="date_store" class="form-control" placeholder="Enter ..." value="<?php echo $row_view['date_store']; ?>">
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
        <div class="card card-secondary collapsed-card">
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
                    <input type="text" name="pn_out" class="form-control" placeholder="Enter ..." value="<?php echo $row_view['pn_out']; ?>">
                </div>
                <div class="form-group">
                    <label>SN Out</label>
                    <input type="text" name="sn_out" class="form-control" placeholder="Enter ..." value="<?php echo $row_view['sn_out']; ?>">
                </div>
                <div class="form-group">
                  <label>Core Batch</label>
                  <input type="text" name="core_batch" class="form-control" placeholder="Enter ..." value="<?php echo $row_view['core_batch']; ?>">
                </div>
                <div class="form-group">
                  <label>Shipment Order Date</label>
                   <input type="date" name="shipment_order_date" class="form-control" placeholder="Enter ..." value="<?php echo $row_view['shipment_order_date']; ?>">
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">

                <div class="form-group">
                    <label>AWB Out</label>
                    <input type="text" name="awb_out" class="form-control" placeholder="Enter ..." value="<?php echo $row_view['awb_out']; ?>">
                </div>
                <div class="form-group">
                    <label>AWB Out Date</label>
                    <input type="date" name="awb_out_date" class="form-control" placeholder="Enter ..." value="<?php echo $row_view['awb_out_date']; ?>">
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
            <button type="submit" name="submit_shipmentorder" class="btn btn-default">Shipment Order</button>
          </div>
        </div>
        <!-- /.card -->

        <?php
           $part_number = $row_view['pn_out'];

           $data3 = mysqli_query($koneksi, "select * from pn_database where part_number='$part_number'");
           $row_view_pn = mysqli_fetch_assoc($data3);

           $pn_newprice = isset($row_view_pn['pn_newprice']) ? $row_view_pn['pn_newprice'] : '';
           $ca_date2 = isset($row_view['ca_date']) ? $row_view['ca_date'] : date('Y-m-d');
        ?>



        <!-- Cost -->
         <div class="card card-secondary collapsed-card">
          <div class="card-header">
            <h3 class="card-title">Cost <strong><?php echo $row_view['po_number']; ?></strong></h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-plus"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <?php 
          
          ?>
          <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                        <!-- checkbox -->
                        <div class="form-group">
                        <div class="checkbox-wrapper-46">
                          <input class="inp-cbx" id="chk" type="checkbox" name="FOC" value="1" <?php if ($row_view['FOC']=="1") echo "checked"?>/>
                          <label class="cbx" for="chk"><span>
                            <svg width="12px" height="10px" viewbox="0 0 12 10">
                              <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                            </svg></span><span>FOC order</span>
                          </label>
                        </div>
                        </div>
                </div>
              </div>
            
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>CA date</label>
                  <input type="date" name="ca_date" class="form-control" placeholder="Enter ..." id='inp1' value="<?php echo $ca_date2; ?>" <?php if ($row_view['FOC']=="1") echo "disabled"?>>
                </div>
                <div class="form-group">
                  <label>Proforma Invoice / Invoice</label>
                  <input type="text" name="invoice" class="form-control" placeholder="Enter ..." id='inp2' value="<?php echo $row_view['invoice']; ?>" <?php if ($row_view['FOC']=="1") echo "disabled"?>>
                </div>
                  <div class="form-group">
                    <label>New Price</label>
                  <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">$</span>
                    </div>
                   <input type="text" name="" class="form-control" value="<?php echo $pn_newprice; ?>" readonly>

                  </div>
                </div>
              </div>
              <!-- /.col -->
                <div class="col-md-6">
                    <div class="form-group">
                      <label>Repair Cost</label>
                      <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                          </div>
                        <input type="text" class="form-control" name="repair_cost" id='inp3' onkeyup="calcSum()" value="<?php echo $row_view['repair_cost']; ?>" <?php if ($row_view['FOC']=="1") echo "disabled"?>>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Other Cost</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input type="text" class="form-control" name="other_cost" id='inp4' onkeyup="calcSum()" value="<?php echo $row_view['other_cost']; ?>" <?php if ($row_view['FOC']=="1") echo "disabled"?>>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Total</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">$</span>
                        </div>
                        <input type="text" name="total_cost" readonly class="form-control" value="<?php echo $row_view['total_cost']; ?>">

                      </div>
                    </div>
                </div>
              <!-- /.col -->
            
            </div>
            <!-- /.row -->
          <ul class="list-group list-group-unbordered mb-3">
            <li class="list-group-item">
            <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                    <label>Approval date</label>
                    <input type="date" name="ca_app_date" class="form-control" id='inp5' placeholder="Enter ..." value="<?php echo $row_view['ca_app_date']; ?>" <?php if ($row_view['FOC']=="1") echo "disabled"?>>
                  </div>
                  
              </div>

              <div class="col-md-6">
                  <div class="form-group">
                    <label>Payment Reference</label>
                    <input type="text" name="payment_ref" class="form-control" placeholder="Enter ..." id='inp6' value="<?php echo $row_view['payment_ref']; ?>" <?php if ($row_view['FOC']=="1") echo "disabled"?>>
                  </div>
                  <div class="form-group">
                    <label>Payment date</label>
                    <input type="date" name="payment_date" class="form-control" placeholder="Enter ..." id='inp7' 
                    value="<?php echo $row_view['payment_date']; ?>" <?php if ($row_view['FOC']=="1") echo "disabled"?>>
                  </div>
              </div>
             </div>
            </li>
          </ul>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" name="submit" class="btn btn-primary">Update Cost</button>
            <button type="submit" name="submit_cost" class="btn btn-secondary"><i class="fas fa-print"></i> Print CA Sheet</button>
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
                  $inbound = $_POST['inbound'];
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
                  $fav_order = $_POST['fav_order'];
                  //$ca_app_date = $_POST['ca_app_date'];
                  //$payment_ref = $_POST['payment_ref'];
                  $payment_date = $_POST['payment_date'];
                  $FOC = $_POST['FOC'];
                  if (($_POST['FOC'])=="1") {
                    $invoice = '-';
                  } else {
                    $invoice = $_POST['invoice'];
                  };
                  if (($_POST['FOC'])=="1") {
                    $payment_ref = '-';
                  } else {
                    $payment_ref = $_POST['payment_ref'];
                  };
                  if (($_POST['FOC'])=="1") {
                    $ca_app_date = $_POST['awb_out_date'];
                  } else {
                    $ca_app_date = $_POST['ca_app_date'];
                  };

                  // update data ke database
                  $update1 = mysqli_query($koneksi, "UPDATE master_order SET
                              note='$note',
                              repair_tat='$repair_tat',
                              inbound='$inbound',
                              awb_in='$awb_in',
                              awb_date='$awb_date',
                              eta='$eta',
                              gr_date='$gr_date',
                              serial_number='$serial_number',
                              serv_batch='$serv_batch',
                              date_store='$date_store',
                              pn_out='$pn_out',
                              sn_out='$sn_out',
                              core_batch='$core_batch',
                              shipment_order_date='$shipment_order_date',
                              awb_out='$awb_out',
                              awb_out_date='$awb_out_date',
                              core_cond='$core_cond',
                              ca_app_date='$ca_app_date',
                              payment_ref='$payment_ref',
                              payment_date='$payment_date',
                              FOC='$FOC',
                              invoice='$invoice',
                              fav_order='$fav_order'
                              WHERE id_order='$id'");

                  

                  //update error running at ubuntu
                  $update2 = mysqli_query($koneksi, "UPDATE master_order SET serv_status=
                  IF(req_scheme='exchange',
                  IF(serv_status='CANCEL','CANCEL',
                  IF(awb_in='','NEED AWB IN',
                  IF(gr_date='0000-00-00','SERV SHIPPED',
                  IF(date_store='0000-00-00','NEED INSPECT',
                  IF(sn_out='','NEED CORE',
                  IF(shipment_order_date='0000-00-00','NEED SO',
                  IF(awb_out='','NEED AWB OUT',
                  IF(invoice='','NEED REPAIR QUOTE',
                  IF(ca_app_date='0000-00-00','NEED REPAIR APPROVAL',
                  IF(payment_ref='','NEED PAYMENT',
                  'CLOSED')))))))))),
                  IF(serv_status='CANCEL','CANCEL',
                  IF(sn_out='','NEED CORE',
                  IF(shipment_order_date='0000-00-00','NEED SO',
                  IF(awb_out='','NEED AWB OUT',
                  IF(invoice='','NEED REPAIR QUOTE',
                  IF(ca_app_date='0000-00-00','NEED REPAIR APPROVAL',
                  IF(payment_ref='','NEED PAYMENT',
                  IF(awb_in='','NEED AWB IN',
                  IF(gr_date='0000-00-00','SERV SHIPPED',
                  IF(date_store='0000-00-00','NEED INSPECT',
                  'CLOSED'))))))))))
                  );");

                  //ini untuk menampilkan alert berhasil dan redirect ke halaman index
                  echo "<script>window.location='index.php?page=data_order';</script>";
                 };


                //melakukan pengecekan jika button submit diklik maka akan menjalankan perintah simpan dibawah ini
                 if (isset($_POST['submit_shipmentorder'])) {
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
                  $update2 = mysqli_query($koneksi, "UPDATE master_order SET serv_status=
                  IF(req_scheme='exchange',
                  IF(serv_status='CANCEL','CANCEL',
                  IF(awb_in='','NEED AWB IN',
                  IF(gr_date='0000-00-00','SERV SHIPPED',
                  IF(date_store='0000-00-00','NEED INSPECT',
                  IF(sn_out='','NEED CORE',
                  IF(shipment_order_date='0000-00-00','NEED SO',
                  IF(awb_out='','NEED AWB OUT',
                  IF(invoice='','NEED REPAIR QUOTE',
                  IF(ca_app_date='0000-00-00','NEED REPAIR APPROVAL',
                  IF(payment_ref='','NEED PAYMENT',
                  'CLOSED')))))))))),
                  IF(serv_status='CANCEL','CANCEL',
                  IF(sn_out='','NEED CORE',
                  IF(shipment_order_date='0000-00-00','NEED SO',
                  IF(awb_out='','NEED AWB OUT',
                  IF(invoice='','NEED REPAIR QUOTE',
                  IF(ca_app_date='0000-00-00','NEED REPAIR APPROVAL',
                  IF(payment_ref='','NEED PAYMENT',
                  IF(awb_in='','NEED AWB IN',
                  IF(gr_date='0000-00-00','SERV SHIPPED',
                  IF(date_store='0000-00-00','NEED INSPECT',
                  'CLOSED'))))))))))
                  );");


                  //ini untuk menampilkan alert berhasil dan redirect ke halaman index
                  echo "<script>window.location='index.php?page=shipment_order_single&id=".$id."';</script>";
                  
                 };


                //melakukan pengecekan jika button submit diklik maka akan menjalankan perintah simpan dibawah ini
                 if (isset($_POST['submit_cost'])) {
                  //menampung data dari inputan

                  $ca_date = $_POST['ca_date'];
                  $invoice = $_POST['invoice'];
                  $repair_cost = $_POST['repair_cost'];
                  $other_cost = $_POST['other_cost'];
                  $total_cost = $_POST['total_cost'];
                  

                  // update data ke database
                  $update1 = mysqli_query($koneksi, "UPDATE master_order SET ca_date='$ca_date', invoice='$invoice', repair_cost='$repair_cost', other_cost='$other_cost', total_cost='$total_cost' WHERE id_order='$id'");
                  // $update2 = mysqli_query($koneksi, "UPDATE master_order SET serv_status=IF(awb_in='','Waiting AWB',IF(gr_date='','SHIPPED',IF(date_store='','Waiting Inspect','CLOSED')));");

                  //ini untuk menampilkan alert berhasil dan redirect ke halaman index
                  echo "<script>window.open('pages/forms/ca_sheet.php?id=".$id."', '_blank');</script>";
                  echo "<script>window.location='index.php?page=view_order&id=".$id."';</script>";
                }; 

                 
      ?>
  </section>
  <script src="plugins/jquery/jquery.min.js"></script>
  <script>
      function calcSum() {
          let num1 = document.getElementsByName("repair_cost")[0].value;
          let num2 = document.getElementsByName("other_cost")[0].value;
          let sum = Number(num1) + Number(num2);
          document.getElementsByName("total_cost")[0].value = sum;
      }
  

  $(function(){
   $('#chk').on('click', function(){                  
      $('#inp1').attr('disabled', $(this).is(':checked'));  
      $('#inp2').attr('disabled', $(this).is(':checked'));   
      $('#inp3').attr('disabled', $(this).is(':checked')); 
      $('#inp4').attr('disabled', $(this).is(':checked'));    
      $('#inp5').attr('disabled', $(this).is(':checked'));   
      $('#inp6').attr('disabled', $(this).is(':checked')); 
      $('#inp7').attr('disabled', $(this).is(':checked')); 
   });
  });


  
  </script>

  <!-- /.content-wrapper -->
