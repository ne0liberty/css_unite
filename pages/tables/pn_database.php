  <!-- Content Wrapper. Contains page content -->
  
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>PN DATABASE</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">PN DATABASE</li>
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

            <div class="card">
              <div class="card-header"> 
                <h3 class="card-title">View Order</h3>
                <div class="card-tools">
                   <ul class="nav nav-pills ml-auto">
                     <li class="nav-item">
                       <a class="btn btn-sm btn-success" href="" data-toggle="tab">Add PN</a>
                     </li>
                   </ul>
                 </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Part Number</th>
                    <th>Description</th>
                    <th>ATA</th>
                    <th>New Price</th>  
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <!--- BACKUP OK-----> 
                  <?php
                    include('conf/conn.php'); //memanggil file koneksi
                    $datas = mysqli_query($koneksi, "select * from pn_database") or die(mysqli_error($koneksi));
                    //script untuk menampilkan data barang

                    $no = 1;//untuk pengurutan nomor
                    
                    //melakukan perulangan
                    while($row2 = mysqli_fetch_assoc($datas)) {
                        ?>

                        <tr> 
                            <td><?= $no; ?></td>
                            <td><?= $row2['part_number']; ?></td>
                            <td><?= $row2['desc']; ?></td>
                            <td><?= $row2['ata']; ?></td>
                            <td><?= $row2['pn_newprice']; ?></td>
                            <td>
                              <div class="btn-group btn-group-sm">
                                <a href="" class="btn btn-sm btn-warning" onclick="return confirm('Are you sure to delete?');"><i class="fas fa-edit"></i></a>    
                                <a href="pages/tables/hapus_pn_database.php?part_number=<?= $row2['part_number']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete?');"><i class="fas fa-trash"></i></a>
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
 
  <!-- /.content-wrapper -->
<!-- Page specific script -->






