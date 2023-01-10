<!-- Content Wrapper. Contains page content -->


<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
</section>


</section>
<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <?php
              if (($_SESSION['LEVEL'])=="Purchaser") {
                $user = ucwords($_SESSION['NAME']);
                $count_all_order = mysqli_query($koneksi, "SELECT COUNT(*) FROM master_order WHERE created_by ='$user';");
              } else {
                $count_all_order = mysqli_query($koneksi, "SELECT COUNT(*) FROM master_order;");
              };
              
              $result_all_order = mysqli_fetch_array($count_all_order);

            ?>
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $result_all_order[0]; ?></h3>

                <p>All Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="index.php?page=data_order" class="small-box-footer">See All Order <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <?php
              if (($_SESSION['LEVEL'])=="Purchaser") {
              $count_open_order = mysqli_query($koneksi, "SELECT COUNT(*) FROM master_order WHERE created_by ='$user' AND serv_status<>'CLOSED';");
              }else{
              $count_open_order = mysqli_query($koneksi, "SELECT COUNT(*) FROM master_order WHERE serv_status<>'CLOSED';");
              };
              $result_open_order = mysqli_fetch_array($count_open_order);

            ?>
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $result_open_order[0]; ?><sup style="font-size: 20px"></sup></h3>

                <p>Open Order</p>
              </div>
              <div class="icon">
                <i class="fas fa-shopping-cart"></i>
              </div>
              <a href="#" class="small-box-footer">See Open Order <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <?php
              if (($_SESSION['LEVEL'])=="Purchaser") {
              $count_exchange_order = mysqli_query($koneksi, "SELECT COUNT(*) FROM master_order WHERE created_by ='$user' AND req_scheme='Exchange';");
              }else{
              $count_exchange_order = mysqli_query($koneksi, "SELECT COUNT(*) FROM master_order WHERE req_scheme='Exchange';");
              }
              $result_exchange_order = mysqli_fetch_array($count_exchange_order);

            ?>
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $result_exchange_order[0]; ?><sup style="font-size: 20px"></sup></h3>

                <p>Exchange Order</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">See Exchange Order <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <?php
              if (($_SESSION['LEVEL'])=="Purchaser") {
              $count_repair_order = mysqli_query($koneksi, "SELECT COUNT(*) FROM master_order WHERE created_by ='$user' AND req_scheme='Repair';");
              }else{
              $count_repair_order = mysqli_query($koneksi, "SELECT COUNT(*) FROM master_order WHERE req_scheme='Repair';");  
              };
              $result_repair_order = mysqli_fetch_array($count_repair_order);

            ?>
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $result_repair_order[0]; ?><sup style="font-size: 20px"></sup></h3>

                <p>Repair Order</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">See Repair Order <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header border-0">
                  <div class="d-flex justify-content-between">
                    <h3 class="card-title">Open Repair, Exchange & Pooling</h3>
                    <a href="javascript:void(0);">View Report</a>
                  </div>
              </div>
              <div class="card-body">
                  <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <?php
                  if (($_SESSION['LEVEL'])=="Purchaser") {
                    ?>  
                    <canvas id="myChart-exchange" height="200" style="height: 200px;"></canvas>
                  <?php
                    } else {
                      ?>
                    <canvas id="myChart-allorder" height="200" style="height: 200px;"></canvas>

                  <?php  };
                  ?>
                    


                  </div>
                  <div class="d-flex flex-row justify-content-end">
                    <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> Repair
                    </span>

                    <span>
                    <i class="fas fa-square text-gray"></i> Exchange
                    </span>
                </div>
              </div>
            </div><!-- /.card-body -->
            <!-- /.card -->
            
          
          </section>
          
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">
            <!-- TABLE: FAVOURITE ORDERS -->
            <div class="card card-warning">
              <div class="card-header border-transparent">
                <h3 class="card-title">Highlight Order</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive" style="height: 300px;">
                  <table class="table table-head-fixed text-nowrap">
                    <thead>
                    <tr>
                      <th>Po No.</th>
                      <th>Status</th>
                      <th>PN</th>
                      <th>Description</th>
                      <th>AWB in</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    $datas = mysqli_query($koneksi, "SELECT * FROM master_order WHERE created_by = '$user' AND fav_order='1' ORDER BY entry_date DESC");
                    
                    while($row = mysqli_fetch_assoc($datas)) {
                      
                    ?>
                    <tr>
                      <td><a href="index.php?page=view_order&id=<?= $row['id_order']; ?>"><?= $row['po_number']; ?></a></td>
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
                      <td><?= $row['part_number']; ?></td>
                      <td><?= $row['description']; ?></td>
                      <td><?= $row['awb_in']; ?></td>
                    </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <a href="index.php?page=tambah_data" class="btn btn-sm btn-info float-left">Place New Order</a>
                <a href="index.php?page=data_order" class="btn btn-sm btn-secondary float-right">View All Orders</a>
              </div>
              <!-- /.card-footer -->
            </div>
            


              <?php
                  if (($_SESSION['LEVEL'])=="Purchaser") {
                    ?>  
                    <!-- TABLE: NEED CORE WIDGETS -->
                    <div class="card card-danger">
                      <div class="card-header border-transparent">
                        <h3 class="card-title">Highlight Core unit Open</h3>

                        <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                          </button>
                          <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                          </button>
                        </div>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body p-0">
                        <div class="table-responsive" style="height: 300px;">
                          <table class="table table-head-fixed text-nowrap">
                            <thead>
                            <tr>
                              <th>Po No.</th>
                              <th>Status</th>
                              <th>PN</th>
                              <th>Description</th>
                              <th>Core SN</th>
                              <th>AWB Out</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            $datas = mysqli_query($koneksi, "SELECT * FROM master_order WHERE sla_core IN ('WARNING', 'LATE') AND req_scheme IN ('Exchange', 'Pooling') AND awb_out_date ='0000-00-00' AND created_by ='$user' AND serv_status <> 'CANCEL' ORDER BY tat_core DESC");
                            
                            while($row = mysqli_fetch_assoc($datas)) {
                              
                            ?>
                            <tr>
                              <td><a href="index.php?page=view_order&id=<?= $row['id_order']; ?>"><?= $row['po_number']; ?></a></td>
                              <td><a class=
                                      "<?php $bgcolor_core = $row['sla_core'];
                                      switch ($bgcolor_core) {
                                        case "WARNING":
                                          echo "badge badge-warning";
                                          break;
                                        case "LATE":
                                          echo "badge badge-danger";
                                          break;
                                      }
                                      ?>"><?= $row['sla_core']; ?></a>
                                      </td>
                              <td><?= $row['part_number']; ?></td>
                              <td><?= $row['description']; ?></td>
                              <td><?= $row['sn_out']; ?></td>
                              <td><?= $row['awb_out']; ?></td>
                            </tr>
                            <?php } ?>
                            </tbody>
                          </table>
                        </div>
                        <!-- /.table-responsive -->
                      </div>
                      <!-- /.card-body -->
                      <div class="card-footer clearfix">
                        <a class="badge badge-warning float-left">5 days left</a>
                        <a class="badge badge-danger float-left">Overdue</a>
                        <a href="index.php?page=data_order" class="btn btn-sm btn-secondary float-right">View All Orders</a>
                      </div>
                      <!-- /.card-footer -->
                    </div>
                  <?php
                    } elseif (($_SESSION['LEVEL'])=="Manager") {
                      ?>
                      <!-- TABLE: NEED CORE WIDGETS -->
                      <div class="card card-danger">
                        <div class="card-header border-transparent">
                          <h3 class="card-title">Highlight Core unit Open</h3>
  
                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                              <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                            </button>
                          </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                          <div class="table-responsive" style="height: 300px;">
                            <table class="table table-head-fixed text-nowrap">
                              <thead>
                              <tr>
                                <th>Po No.</th>
                                <th>Status</th>
                                <th>PN</th>
                                <th>Description</th>
                                <th>Core SN</th>
                                <th>AWB Out</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php
  
                              $datas = mysqli_query($koneksi, "SELECT * FROM master_order WHERE sla_core IN ('WARNING', 'LATE') AND req_scheme IN ('Exchange', 'Pooling') AND awb_out_date ='0000-00-00' AND serv_status <> 'CANCEL' ORDER BY tat_core DESC");
                              
                              while($row = mysqli_fetch_assoc($datas)) {
                                
                              ?>
                              <tr>
                                <td><a href="index.php?page=view_order&id=<?= $row['id_order']; ?>"><?= $row['po_number']; ?></a></td>
                                <td><a class=
                                        "<?php $bgcolor_core = $row['sla_core'];
                                        switch ($bgcolor_core) {
                                          case "WARNING":
                                            echo "badge badge-warning";
                                            break;
                                          case "LATE":
                                            echo "badge badge-danger";
                                            break;
                                        }
                                        ?>"><?= $row['sla_core']; ?></a>
                                        </td>
                                <td><?= $row['part_number']; ?></td>
                                <td><?= $row['description']; ?></td>
                                <td><?= $row['sn_out']; ?></td>
                                <td><?= $row['awb_out']; ?></td>
                              </tr>
                              <?php } ?>
                              </tbody>
                            </table>
                          </div>
                          <!-- /.table-responsive -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                          <a class="badge badge-warning float-left">5 days left</a>
                          <a class="badge badge-danger float-left">Overdue</a>
                          <a href="index.php?page=data_order" class="btn btn-sm btn-secondary float-right">View All Orders</a>
                        </div>
                        <!-- /.card-footer -->
                      </div>
                      <?php
                   }else{

                   };
                  ?>

            
          <!-- TO DO List 
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="ion ion-clipboard mr-1"></i>
                  To Do List
                </h3>

                <div class="card-tools">
                  <ul class="pagination pagination-sm">
                    <li class="page-item"><a href="#" class="page-link">&laquo;</a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">&raquo;</a></li>
                  </ul>
                </div>
              </div>
              card-header 
              <div class="card-body">
                <ul class="todo-list" data-widget="todo-list">
                  <li>
                    <!-- drag handle 
                    <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                    <!-- checkbox 
                    <div  class="icheck-primary d-inline ml-2">
                      <input type="checkbox" value="" name="todo1" id="todoCheck1">
                      <label for="todoCheck1"></label>
                    </div>
                    <!-- todo text 
                    <span class="text">Design a nice theme</span>
                    <!-- Emphasis label 
                    <small class="badge badge-danger"><i class="far fa-clock"></i> 2 mins</small>
                    <!-- General tools such as edit or delete
                    <div class="tools">
                      <i class="fas fa-edit"></i>
                      <i class="fas fa-trash-o"></i>
                    </div>
                  </li>
                  <li>
                    <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                    <div  class="icheck-primary d-inline ml-2">
                      <input type="checkbox" value="" name="todo2" id="todoCheck2" checked>
                      <label for="todoCheck2"></label>
                    </div>
                    <span class="text">Make the theme responsive</span>
                    <small class="badge badge-info"><i class="far fa-clock"></i> 4 hours</small>
                    <div class="tools">
                      <i class="fas fa-edit"></i>
                      <i class="fas fa-trash-o"></i>
                    </div>
                  </li>
                  <li>
                    <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                    <div  class="icheck-primary d-inline ml-2">
                      <input type="checkbox" value="" name="todo3" id="todoCheck3">
                      <label for="todoCheck3"></label>
                    </div>
                    <span class="text">Let theme shine like a star</span>
                    <small class="badge badge-warning"><i class="far fa-clock"></i> 1 day</small>
                    <div class="tools">
                      <i class="fas fa-edit"></i>
                      <i class="fas fa-trash-o"></i>
                    </div>
                  </li>
                  <li>
                    <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                    <div  class="icheck-primary d-inline ml-2">
                      <input type="checkbox" value="" name="todo4" id="todoCheck4">
                      <label for="todoCheck4"></label>
                    </div>
                    <span class="text">Let theme shine like a star</span>
                    <small class="badge badge-success"><i class="far fa-clock"></i> 3 days</small>
                    <div class="tools">
                      <i class="fas fa-edit"></i>
                      <i class="fas fa-trash-o"></i>
                    </div>
                  </li>
                  <li>
                    <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                    <div  class="icheck-primary d-inline ml-2">
                      <input type="checkbox" value="" name="todo5" id="todoCheck5">
                      <label for="todoCheck5"></label>
                    </div>
                    <span class="text">Check your messages and notifications</span>
                    <small class="badge badge-primary"><i class="far fa-clock"></i> 1 week</small>
                    <div class="tools">
                      <i class="fas fa-edit"></i>
                      <i class="fas fa-trash-o"></i>
                    </div>
                  </li>
                  <li>
                    <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                    <div  class="icheck-primary d-inline ml-2">
                      <input type="checkbox" value="" name="todo6" id="todoCheck6">
                      <label for="todoCheck6"></label>
                    </div>
                    <span class="text">Let theme shine like a star</span>
                    <small class="badge badge-secondary"><i class="far fa-clock"></i> 1 month</small>
                    <div class="tools">
                      <i class="fas fa-edit"></i>
                      <i class="fas fa-trash-o"></i>
                    </div>
                  </li>
                </ul>
              </div>
              <!-- /.card-body 
              <div class="card-footer clearfix">
                <button type="button" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Add item</button>
              </div>
            </div>
             -->
            

          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

<!-- /.content-wrapper --> 


