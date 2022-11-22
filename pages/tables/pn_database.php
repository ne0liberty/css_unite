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
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item">Database</li>
              <li class="breadcrumb-item active">PN Database</li>
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
                       <a class="btn btn-primary float-right" href="" data-toggle="modal" data-target="#submit-pn"><i class="fas fa-plus"></i> Add item</a>
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
                            <td><?= $row2['description']; ?></td>
                            <td><?= $row2['ata']; ?></td>
                            <td>$ <?= $row2['pn_newprice']; ?></td>
                            <td>
                              <div class="btn-group btn-group-sm">
                                <a href="#" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#edit-pn<?= $row2['part_number'] ?>"><i class="fas fa-edit"></i></a>    
                                <a href="pages/tables/hapus_pn_database.php?part_number=<?= $row2['part_number']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete?');"><i class="fas fa-trash"></i></a>
                              </div>
                              <div class="modal fade modal-update" id="edit-pn<?= $row2['part_number'] ?>" role="dialog">
                                <div class="modal-dialog modal-lg">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Edit Part Number</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <form action="conf/upd-pn-database.php?act=edit" method="post" role="form">
                                    <?php
                                    $id_user = $row2['part_number'];
                                    $query = "SELECT * FROM pn_database WHERE part_number='$id_user'";
                                    $result = mysqli_query($koneksi, $query);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <div class="modal-body">
                                        
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Part Number</label>
                                              <div class="col-sm-10">
                                                <input type="text" class="form-control" name="part_number" value="<?php echo $row['part_number']; ?>" placeholder="Enter">
                                              </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Description</label>
                                              <div class="col-sm-10">
                                                <input type="text" class="form-control" name="description" value="<?php echo $row['description']; ?>" placeholder="Enter">
                                              </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">ATA</label>
                                              <div class="col-sm-10">
                                                <input type="text" class="form-control" name="ata" value="<?php echo $row['ata']; ?>" placeholder="Enter">
                                              </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">New Price</label>
                                              <div class="col-sm-10">
                                                <div class="input-group">
                                                  <div class="input-group-prepend">
                                                      <span class="input-group-text">$</span>
                                                  </div>
                                                  <input type="text" class="form-control" name="pn_newprice" value="<?php echo $row['pn_newprice']; ?>" value="0.00">
                                                </div>
                                              </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                      <button type="submit" name="submit" class="btn btn-primary">Update changes</button>
                                    </div>
                                    </form>
                                  <?php
                                  }
                                  ?>
                                  </div>
                                  <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
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

      <div class="modal fade" id="submit-pn">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Submit Part Number</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="conf/upd-pn-database.php?act=add" method="post" role="form">
            <div class="modal-body">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Part Number</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="part_number" placeholder="Enter">
                      </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Description</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="description" placeholder="Enter">
                      </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">ATA</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="ata" placeholder="Enter">
                      </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">New Price</label>
                    <div class="col-sm-10">
                      <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input type="text" class="form-control" name="pn_newprice" value="0.00">
                      </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">File Input</label>
                    <div class="col-sm-10">
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="exampleInputFile">
                          <label class="custom-file-label" for="exampleInputFile">Import Excel For Multiple PN</label>
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text">Upload</span>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      

    
      
    </section>
    <!-- /.content -->
 
  <!-- /.content-wrapper -->
<!-- Page specific script -->





