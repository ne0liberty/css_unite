
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <h2 class="text-center display-4">Search</h2>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form action="simple-results.html">
                        <div class="input-group input-group-lg">
                            <input type="search" class="form-control form-control-lg" name="search" placeholder="Type your keywords here" value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-lg btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php
    
    $testcon = mysqli_connect("localhost","root","","search_test");

    if(isset($_GET['search']))
        {
            $filtervalues = $_GET['search'];
            $query = "SELECT * FROM master_order WHERE CONCAT(po_number,part_number,description,awb_in,inbound,awb_out) LIKE '%$filtervalues%' ";
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
                                                        <div class="float-right"><?= $items['id_order']; ?></div>
                                                        <h3><a href="index.php?page=view_order&id=<?= $items['id_order']; ?>"><?= $items['po_number']; ?></a></h3>
                                                        <p class="mb-0">PN      : <?= $items['part_number']; ?></p>
                                                        <p class="mb-0">Desc    : <?= $items['description']; ?></p>
                                                        <p class="mb-0">AWB In  : <?= $items['awb_in']; ?></p>
                                                        <p class="mb-0">Inbound : <?= $items['inbound']; ?></p>
                                                        <p class="mb-0">AWB Out : <?= $items['awb_out']; ?></p>
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
                                                            <h3>No record</h3>
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
<!-- ./wrapper -->
