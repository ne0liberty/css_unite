  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">All Order</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card card-primary">
              <div class="card-header"> 
                <h3 class="card-title">View Order</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Serv Status</th>
                    <th>Entry Date</th>
                    <th>Scheme</th>
                    <th>PO Number</th>
                    <th>Part Number</th>  
                    <th>Description</th>
                    <th>Aircraft</th>
                    <th>Vendor</th>
                    <th>SN IN</th>
                    <th>SN OUT</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <!--- BACKUP OK-----> 
                  
                  <?php
                    include('conf/conn.php'); //memanggil file koneksi
                    // $querytable = "SELECT * FROM master_order"
                    $nama = ucwords($_SESSION['NAME']);
                    $datas = mysqli_query($koneksi, "SELECT * FROM master_order WHERE created_by = '$nama'") or die(mysqli_error($koneksi));
                    //script untuk menampilkan data barang

                    $no = 1;//untuk pengurutan nomor
                    
                    //melakukan perulangan
                    while($row = mysqli_fetch_assoc($datas)) {
                        ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td>
                              <a class=
                              "<?php $bgcolor = $row['serv_status'];
                              switch ($bgcolor) {
                                case "Waiting AWB":
                                  echo "badge badge-secondary";
                                  break;
                                case "SHIPPED":
                                  echo "badge badge-primary";
                                  break;
                                case "Waiting Inspect":
                                  echo "badge badge-warning";
                                  break;
                                case "CLOSED":
                                  echo "badge badge-success";
                                  break;
                              }   
                              ?>"><?= $row['serv_status']; ?></a>
                            </td> 
                            <td><?= $row['entry_date']; ?></td>
                            <td><?= $row['req_scheme']; ?></td>
                            <td><?= $row['po_number']; ?></td>
                            <td><?= $row['part_number']; ?></td>
                            <td><?= $row['description']; ?></td>
                            <td><?= $row['aircraft']; ?></td>
                            <td><?= $row['vendor']; ?></td>
                            <td><?= $row['serial_number']; ?></td>
                            <td><?= $row['sn_out']; ?></td>
                            <td>
                                  <div class="btn-group btn-group-sm">
                                    <a href="index.php?page=view_order&id=<?= $row['id_order']; ?>" class="btn btn-success"><i class="fas fa-eye"></i></a>
                                    <a href="index.php?page=cost_approval&id=<?= $row['id_order']; ?>" class="btn btn-info"> <i class="fas fa-dollar-sign"></i> </a>
                                    <a href="pages/tables/hapus.php?id=<?= $row['id_order']; ?>" class="btn btn-danger" onclick="return confirm('anda yakin ingin hapus?');"><i class="fas fa-trash"></i></a>
                                 </div>
                            </td>
					              </tr>

						          <?php $no++; } ?>

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<!-- Page specific script -->






