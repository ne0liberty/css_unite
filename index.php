<?php
session_start();
include "conf/conn.php";
include "conf/api_updt_sla.php";

if (!isset($_SESSION['ID'])) {
  ob_start(); 
  header("Location:pages/login.php");
  ob_end_flush();
  exit();
}

?>
<!DOCTYPE html>
<head>
<html lang="en">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CSS Order Monitoring</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="plugins/bootstrap/bootstrap.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="plugins/dropzone/min/dropzone.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
 

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php?page=dashboard" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php?page=dashboard" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      
      <!-- Notifications Dropdown Menu -->
      
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php?page=dashboard" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">CSS Unite</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($_SESSION['IMG']).'" class="img-circle elevation-2" alt="User Image" />'; ?>
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo ucwords($_SESSION['NAME']); ?></a>
        </div>
      </div>

      <!-- Sidebar user panel (custom) -->
      

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="./index.php?page=dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-header">MENU</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Order
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?page=tambah_data" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Order</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?page=shipment_order" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Shipment Order Multi PO</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?page=data_order" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Order</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Data
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?page=pn_database" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>PN Database</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Vendor Database</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-header">SETTING</li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-columns"></i>
              <p>
                Pengaturan
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="pages/logout.php" class="nav-link">
              <i class="nav-icon fas fa-columns"></i>
              <p>
                Logout
              </p>
            </a>
          </li> 

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

 
  <!-- Content -->
  <div class="content-wrapper">
  <?php include "conf/page.php"; ?>
  <?php
    if(isset($_GET['search']))
        {
            $filtervalues = $_GET['search'];
            $user = ucwords($_SESSION['NAME']);
            $query = "SELECT * FROM master_order WHERE CONCAT(tracking_no,po_number,part_number,description,vendor,pr,aircraft,awb_in,inbound,serial_number,serv_batch,pn_out,sn_out,core_batch,awb_out,invoice,payment_ref) LIKE '%$filtervalues%' ";
            $query_run = mysqli_query($koneksi, $query);

            if(mysqli_num_rows($query_run) > 0)
            {
                foreach($query_run as $items)
                {
                    ?>
                   
                    <section class="content">
                        <div class="container-fluid">
                            <div class="row mt-3">
                                <div class="col-md-10 offset-md-1">
                                    <div class="list-group">
                                        <div class="list-group-item">
                                            <div class="row">
                                                <div class="col px-4">
                                                    <div>
                                                        <div class="float-right"><?= $items['entry_date']; ?></div>
                                                        <h3><a href="index.php?page=view_order&id=<?= $items['id_order']; ?>"><?= $items['po_number']; ?></a></h3>
                                                        <p class="mb-0"><?php if ($items['part_number'] == $filtervalues) {
                                                          echo "PN : ". $items['part_number'];
                                                        }
                                                        else {
                                                        }
                                                        ?></p>
                                                        <p class="mb-0"><?php if (strpos($items['description'],$filtervalues)!==true) {
                                                          echo "Desc : ". $items['description'];
                                                        }
                                                        else {
                                                        }
                                                        ?></p>
                                                        <p class="mb-0"><?php if (strpos($items['vendor'],$filtervalues)!==true) {
                                                          echo "Vendor : ". $items['vendor'];
                                                        }
                                                        else {
                                                        }
                                                        ?></p>
                                                        <p class="mb-0"><?php if ($items['pr'] == $filtervalues) {
                                                          echo "PR : ". $items['pr'];
                                                        }
                                                        else {
                                                        }
                                                        ?></p>
                                                        <p class="mb-0"><?php if ($items['aircraft'] == $filtervalues) {
                                                          echo "Aircraft : ". $items['aircraft'];
                                                        }
                                                        else {
                                                        }
                                                        ?></p>
                                                        <p class="mb-0"><?php if ($items['awb_in'] == $filtervalues) {
                                                          echo "AWB In : ". $items['awb_in'];
                                                        }
                                                        else {
                                                        }
                                                        ?></p>
                                                        <p class="mb-0"><?php if ($items['inbound'] == $filtervalues) {
                                                          echo "Inbound : ". $items['inbound'];
                                                        }
                                                        else {
                                                        }
                                                        ?></p>
                                                        <p class="mb-0"><?php if ($items['serial_number'] == $filtervalues) {
                                                          echo "SN in : ". $items['serial_number'];
                                                        }
                                                        else {
                                                        }
                                                        ?></p>
                                                        <p class="mb-0"><?php if ($items['serv_batch'] == $filtervalues) {
                                                          echo "Batch Serv : ". $items['serv_batch'];
                                                        }
                                                        else {
                                                        }
                                                        ?></p>
                                                        <p class="mb-0"><?php if ($items['pn_out'] == $filtervalues) {
                                                          echo "PN Out : ". $items['pn_out'];
                                                        }
                                                        else {
                                                        }
                                                        ?></p>
                                                        <p class="mb-0"><?php if ($items['sn_out'] == $filtervalues) {
                                                          echo "SN Out : ". $items['sn_out'];
                                                        }
                                                        else {
                                                        }
                                                        ?></p>
                                                        <p class="mb-0"><?php if ($items['core_batch'] == $filtervalues) {
                                                          echo "Core Batch : ". $items['core_batch'];
                                                        }
                                                        else {
                                                        }
                                                        ?></p>
                                                        <p class="mb-0"><?php if ($items['awb_out'] == $filtervalues) {
                                                          echo "AWB Out : ". $items['awb_out'];
                                                        }
                                                        else {
                                                        }
                                                        ?></p>     
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    
                    <?php
                }
            }
            else
            {
                ?>
                  
                    <section class="content">
                            <div class="container-fluid">
                                <div class="row mt-3">
                                    <div class="col-md-10 offset-md-1">
                                        <div class="list-group">
                                            <div class="list-group-item">
                                                <div class="row">
                                                    <div class="col px-4">
                                                        <div>
                                                            <div class="float-right"></div>
                                                            <h3>Not Found</h3>
                                                            <p class="mb-0"></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    
                <?php
            }
        }
    ?>
  </div>
  <!-- /Content -->
  
  <footer class="main-footer">
    <strong>Copyright 2022 <a href="https://adminlte.io">Ne0liberty</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> Alpha 0.0.1
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- date-range-picker -->
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->


<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>  

<!-- Autofillss -->
<script src="plugins/jquery/jquery-1.12.4.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
  <script src="plugins/bootstrap/jquery/jquery-3.5.1.js"></script>
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="plugins/jszip/jszip.min.js"></script>
  <script src="plugins/pdfmake/pdfmake.min.js"></script>
  <script src="plugins/pdfmake/vfs_fonts.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- Bootstrap4 Duallistbox -->
<script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- dropzonejs -->
<script src="plugins/dropzone/min/dropzone.min.js"></script>
<!-- BS-Stepper -->
<script src="../../plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>

<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>


<!-- Page specific script -->

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": false,
      "buttons": ["copy", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,

    });

    $('#example3').DataTable({
      "paging": false,
      "lengthChange": true,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": true,
      "responsive": true,

    });

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })

    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })


    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })


  
  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End


</script>

<script>
		var ctx = document.getElementById('myChart').getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["Need AWB Export", "Need Quote", "Need Payment", "Under Repair", "Need GR"],
				datasets: [{
					label: '',
					data: [
					<?php 
					$awb_export = mysqli_query($koneksi,"SELECT * FROM master_order WHERE created_by ='$user' AND req_scheme='Repair' AND serv_status='NEED AWB OUT';");
					echo mysqli_num_rows($awb_export);
					?>, 
					<?php 
					$waiting_quote = mysqli_query($koneksi,"SELECT * FROM master_order WHERE created_by ='$user 'AND req_scheme='Repair' AND serv_status='NEED REPAIR QUOTE';");
					echo mysqli_num_rows($waiting_quote);
					?>, 
					<?php 
					$waiting_payment = mysqli_query($koneksi,"SELECT * FROM master_order WHERE created_by ='$user 'AND req_scheme='Repair' AND serv_status='NEED PAYMENT';");
					echo mysqli_num_rows($waiting_payment);
					?>, 
					<?php 
					$under_repair = mysqli_query($koneksi,"SELECT * FROM master_order WHERE created_by ='$user 'AND req_scheme='Repair' AND serv_status='NEED AWB IN';");
					echo mysqli_num_rows($under_repair);
					?>, 
					<?php 
					$waiting_gr = mysqli_query($koneksi,"SELECT * FROM master_order WHERE created_by ='$user 'AND req_scheme='Repair' AND serv_status='SERV SHIPPED';");
					echo mysqli_num_rows($waiting_gr);
					?>
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
            gridLines: {
                display:true
            },
						ticks: {
							beginAtZero:true,
              steps: 0,
              stepSize: 1,
						}
					}],
          xAxes: [{
            barPercentage: 0.4,
            gridLines: {
                display:false
            }
          }]
				}
			}
		});
	</script>

<script>
		var ctx = document.getElementById('myChart-exchange').getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["Need AWB In", "Serv Shipped", "Need Inspect", "Need Core", "Need AWB Out", "Need Repair Approval", "Need Payment"],
				datasets: [{
					label: '',
					data: [
					<?php 
					$need_awb_in = mysqli_query($koneksi,"SELECT * FROM master_order WHERE created_by ='$user' AND req_scheme='Exchange' AND serv_status='NEED AWB IN';");
					echo mysqli_num_rows($need_awb_in);
					?>, 
					<?php 
					$serv_shipped = mysqli_query($koneksi,"SELECT * FROM master_order WHERE created_by ='$user 'AND req_scheme='Exchange' AND serv_status='SERV SHIPPED';");
					echo mysqli_num_rows($serv_shipped);
					?>, 
					<?php 
					$need_inspect = mysqli_query($koneksi,"SELECT * FROM master_order WHERE created_by ='$user 'AND req_scheme='Exchange' AND serv_status='NEED INSPECT';");
					echo mysqli_num_rows($need_inspect);
					?>, 
					<?php 
					$need_core = mysqli_query($koneksi,"SELECT * FROM master_order WHERE created_by ='$user 'AND req_scheme='Exchange' AND serv_status='NEED CORE';");
					echo mysqli_num_rows($need_core);
					?>, 
					<?php 
					$need_awb_out = mysqli_query($koneksi,"SELECT * FROM master_order WHERE created_by ='$user 'AND req_scheme='Exchange' AND serv_status='NEED AWB OUT';");
					echo mysqli_num_rows($need_awb_out);
					?>, 
					<?php 
					$need_repr_apprval = mysqli_query($koneksi,"SELECT * FROM master_order WHERE created_by ='$user 'AND req_scheme='Exchange' AND serv_status='NEED REPAIR APPROVAL';");
					echo mysqli_num_rows($need_repr_apprval);
					?>, 
					<?php 
					$need_payment = mysqli_query($koneksi,"SELECT * FROM master_order WHERE created_by ='$user 'AND req_scheme='Exchange' AND serv_status='NEED PAYMENT';");
					echo mysqli_num_rows($need_payment);
					?>
					],
					backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(255, 205, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(201, 203, 207, 0.2)'
					],
					borderColor: [
            'rgb(255, 99, 132)',
            'rgb(255, 159, 64)',
            'rgb(255, 205, 86)',
            'rgb(75, 192, 192)',
            'rgb(54, 162, 235)',
            'rgb(153, 102, 255)',
            'rgb(201, 203, 207)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
            gridLines: {
                display:true
            },
						ticks: {
							beginAtZero:true,
              steps: 0,
              stepSize: 1,
						}
					}],
          xAxes: [{
            barPercentage: 0.4,
            gridLines: {
                display:false
            }
          }]
				}
			}
		});
	</script>

</body>

</html>
