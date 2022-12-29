<?php
$nama = ucwords($_SESSION['NAME']);
?>

<!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Vendor Database</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?page=dashboard">Home</a></li>
              <li class="breadcrumb-item">Database</li>
              <li class="breadcrumb-item active">Vendor Database</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <form action="" method="post" role="form">
      <div class="container-fluid">
        <!-- left column -->
        <div class="col-md-6">
          <!-- Tittle  -->
          <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">Vendor List</h3>
              <div class="card-tools">
                    <ul class="nav nav-pills ml-auto">
                     <li class="nav-item">
                       <a class="btn btn-primary float-right" href="" data-toggle="modal" data-target="#submit-vendor"><i class="fas fa-plus"></i> Add item</a>
                     </li>
                   </ul>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
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
                   <label>Address 1</label>
                   <textarea class="form-control" rows="7" id="address1" name="address"></textarea>
               </div>
               <div class="form-group">
                 <label>Address 2</label>
                 <textarea class="form-control" rows="7" id="address2" name="address_2"></textarea>
               </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" name="update_vendor" class="btn btn-primary">Update Data</button>
              
            </div>
          </div>
          <!-- /.card -->
        </div>
      </div>
    </form>
    <!-- modal -->
    <div class="modal fade" id="submit-vendor">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Submit New Vendor</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="conf/upd-vendor-database.php?act=add" method="post" role="form">
            <div class="modal-body">
                <div class="form-group">
                    <label>Vendor Name</label>
                    <input type="text" class="form-control" name="vendor" placeholder="Enter">
                </div>
                <div class="form-group">
                    <label>Address 1</label>
                    <textarea class="form-control" rows="7" id="" name="address1" placeholder="Enter"></textarea>
                </div>
                <div class="form-group">
                    <label>Address 2</label>
                    <textarea class="form-control" rows="7" id="" name="address2" placeholder="Enter"></textarea>
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


    <!-- Autofillss -->
    <script src="plugins/jquery/jquery-1.12.4.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Select2 -->
    <script src="plugins/select2/js/select2.full.min.js"></script>


    <script type="text/javascript">
          function isi_otomatis(){
              var vendor = $("#vendor").val();
              $.ajax({
                  type: "GET",
                  url: "/conf/ajax-vendor.php",
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
        <?php
        if (isset($_POST['update_vendor'])) {
             //menampung data dari inputan

             $vendor = $_POST['vendor'];
             $address1 = $_POST['address'];
             $address2 = $_POST['address_2'];

             // update data ke database
             $update1 = mysqli_query($koneksi, "UPDATE vendor_database SET
                         address1='$address1',
                         address2='$address2'
                         WHERE vendor='$vendor'");

             //ini untuk menampilkan alert berhasil dan redirect ke halaman index
             echo "<script>alert('Data has been saved.');window.location='index.php?page=vendor_database';</script>";
           };
        ?>


  </section>


  <!-- /.content-wrapper -->


