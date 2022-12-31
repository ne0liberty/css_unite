

<!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create New Project</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?page=dashboard">Home</a></li>
              <li class="breadcrumb-item">Project</li>
              <li class="breadcrumb-item active">Create New Project</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <form action="" method="post" role="form">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">New Project</h3>
            <div class="card-tools">

            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Project Name</label>
                  <input type="text" name="project_name" class="form-control" placeholder="Enter ...">
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          <div class="form-group">
              <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Status</th>
                    <th>Entry Date</th>
                    <th>Scheme</th>
                    <th>PO Number</th>
                    <th>Part Number</th>
                    <th>Description</th>
                    <th>Aircraft</th>
                    <th>Vendor</th>
                  </tr>
                  </thead>
                  <tbody>
                  <!--- BACKUP OK----->

                  <?php
                    include('conf/conn.php'); //memanggil file koneksi
                    // $querytable = "SELECT * FROM master_order"
                    $nama = ucwords($_SESSION['NAME']);
                    $datas = mysqli_query($koneksi, "SELECT * FROM master_order WHERE created_by = '$nama' ORDER BY entry_date DESC") or die(mysqli_error($koneksi));
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
                              ?>"><?= $row['serv_status']; ?></a>
                            </td>
                            <td><?= $row['entry_date']; ?></td>
                            <td><?= $row['req_scheme']; ?></td>
                            <td><a href="index.php?page=view_order&id=<?= $row['id_order']; ?>"><?= $row['po_number']; ?></a></td>
                            <td><?= $row['part_number']; ?></td>
                            <td><?= $row['description']; ?></td>
                            <td><?= $row['aircraft']; ?></td>
                            <td><?= $row['vendor']; ?></td>
					              </tr>

						          <?php $no++; } ?>

                  </tbody>
                  <tfoot>
                     <tr>
                      <th>No.</th>
                      <th>Status</th>
                      <th>Entry Date</th>
                      <th>Scheme</th>
                      <th>PO Number</th>
                      <th>Part Number</th>
                      <th>Description</th>
                      <th>Aircraft</th>
                      <th>Vendor</th>
                    </tr>
              </tfoot>
            </table>
            
          </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
        <!-- /.card -->

      </div>
      </form>
      <?php
           include 'conf/conn.php';
          //melakukan pengecekan jika button submit diklik maka akan menjalankan perintah simpan dibawah ini
           if (isset($_POST['submit'])) {
            //menampung data dari input
            $name = ucwords($_SESSION['NAME']);
            $project_name = $_POST['project_name'];
            
            //query untuk menambahkan barang ke database, pastikan urutan nya sama dengan di database
            $inputproject = mysqli_query($koneksi, "INSERT INTO project_reference (name,project_name)
            VALUES('$name', '$project_name')") or die(mysqli_error($koneksi));
      
            //ini untuk menampilkan alert berhasil dan redirect ke halaman index
             echo "<script>alert('Project has been Saved.');window.location='index.php?page=dashboard';</script>";
            };
          ?>


      <!-- Autofillss -->
      <script src="plugins/jquery/jquery-1.12.4.min.js"></script>
      <!--
      <script type="text/javascript">
              var RootUrl = '@Url.Content("~/")';
      </script>
      -->
      <script type="text/javascript">
          function isi_otomatis(){
                var part_number = $("#part_number").val();
                $.ajax({
                    type: "GET",
                    url: "/conf/ajax.php",
                    data:"part_number="+part_number ,
                    cache: false,
                }).success(function (data) {
                    var json = data,
                    obj = JSON.parse(json);
                    $('#desc_id').val(obj.desc_id);
                });

           }
      </script>

      <!-- Select2 -->
      <script src="plugins/select2/js/select2.full.min.js"></script>

     


      <script type="text/javascript">
       //Initialize Select2 Elements
       $('.select2').select2()

        //Initialize Select2 Elements
       $('.select2bs4').select2({
       theme: 'bootstrap4'
       })
      </script>

      

  </section>


  <!-- /.content-wrapper -->


