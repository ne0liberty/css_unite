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
                            <td><?= $row2['pn_newprice']; ?></td>
                            <td>
                              <div class="btn-group btn-group-sm">
                                <a href="" class="btn btn-sm btn-warning edit" data-toggle="modal" data-target="#edit-pn" data-id="'.$row2['part_number'].'"><i class="fas fa-edit"></i></a>    
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

      <div class="modal fade" id="submit-pn">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Submit Part Number</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="" method="post" role="form">
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

      <?php
  			include('conf/conn.php');
       //melakukan pengecekan jika button submit diklik maka akan menjalankan perintah simpan dibawah ini
        if (isset($_POST['submit'])) {
         //menampung data dari inputan
         $part_number = $_POST['part_number'];
         $desc = $_POST['description'];
         $ata = $_POST['ata'];
         $pn_newprice = $_POST['pn_newprice'];
  
         $update = mysqli_query($koneksi, "INSERT INTO pn_database (part_number,description,ata,pn_newprice) 
         VALUES ('$part_number','$desc','$ata','$pn_newprice')") or die(mysqli_error($koneksi));
         
         //ini untuk menampilkan alert berhasil dan redirect ke halaman index
         echo "<script>alert('Data has been saved.');window.location='index.php?page=pn_database';</script>";
         }
  
     ?>

      <div class="modal fade" id="edit-pn">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Part Number</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="" method="post" id="frm_update" role="form">
            <div class="modal-body">
                <input type="hidden" name="id" id="part_number">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Part Number</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="part_number" id="part_number" placeholder="Enter">
                      </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Description</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="description" id="description" placeholder="Enter">
                      </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">ATA</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="ata" id="ata" placeholder="Enter">
                      </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">New Price</label>
                      <div class="col-sm-10">
                        <div class="input-group">
                          <div class="input-group-prepend">
                              <span class="input-group-text">$</span>
                          </div>
                          <input type="text" class="form-control" name="pn_newprice" id="pn_newprice" value="0.00">
                        </div>
                      </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="edit" class="btn btn-primary">Update changes</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      
      <?php
  			include('conf/conn.php');
       //melakukan pengecekan jika button submit diklik maka akan menjalankan perintah simpan dibawah ini
        if (isset($_POST['edit'])) {
         //menampung data dari inputan
         $part_number = $_POST['part_number'];
         $desc = $_POST['description'];
         $ata = $_POST['ata'];
         $pn_newprice = $_POST['pn_newprice'];
  
         $update = mysqli_query($koneksi, "UPDATE pn_database SET part_number='$part_number',description='$desc',ata='$ata',pn_newprice='$pn_newprice' WHERE part_number='$part_number')") or die(mysqli_error($koneksi));
         
         //ini untuk menampilkan alert berhasil dan redirect ke halaman index
         echo "<script>alert('Data has been saved.');window.location='index.php?page=pn_database';</script>";
         }
  
     ?>

      <script>
      $(document).ready(function () {
        //ajax edit data pn
        $(".edit").off("click").on("click",function() {              
           var id_data = $(this).attr("data-id");
           $.ajax({                        
                url : "conf/ajax-edit_pn_dtbase.php?id="+id_data,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {                                    
                    $("#part_number").val(data.part_number);                     
                    $("#description").val(data.description);                     
                    $("#ata").val(data.ata);                     
                    $("#pn_newprice").val(data.pn_newprice);                                         
                    //$(".modal-update").modal('show');                             
                }
            });    
        });
      });
      
      </script>
      
    </section>
    <!-- /.content -->
 
  <!-- /.content-wrapper -->
<!-- Page specific script -->





