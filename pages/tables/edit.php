  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>General Form</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">General Form</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update</h3>
              </div>
              <!-- /.card-header -->
              <?php
              include('conf/conn.php');
              $id = $_GET['id']; //mengambil id barang yang ingin diubah

              //menampilkan barang berdasarkan id
              $data = mysqli_query($koneksi, "select * from mahasiswa where id_mahasiswa= '$id'");
              $row = mysqli_fetch_assoc($data);
              ?>
              <!-- form start -->
              <form action="" method="post" role="form">
                <div class="card-body">
                  <div class="form-group">
                    <label>NIM</label>
                    <!--  menampilkan nama barang -->
						          <input type="text" name="nim" required="" class="form-control" value="<?= $row['nim']; ?>">

                    <!-- ini digunakan untuk menampung id yang ingin diubah -->
                    <input type="hidden" name="id_mahasiswa" required="" value="<?= $row['id_mahasiswa']; ?>">
                  </div>

                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" value="<?= $row['nama']; ?>">
                  </div>

                  <div class="form-group">
                    <label>Kelas</label>
                    <input type="text" name="kelas" class="form-control" value="<?= $row['kelas']; ?>">
                  </div>

                  <div class="form-group">
                    <label>Jurusan</label>
                    <input type="text" name="jurusan" class="form-control" value="<?= $row['jurusan']; ?>">
                  </div>
                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary" value="simpan">update data</button>
                </div>

              </form>
              <?php
                
                //melakukan pengecekan jika button submit diklik maka akan menjalankan perintah simpan dibawah ini
                if (isset($_POST['submit'])) {
                  //menampung data dari inputan
                  $nim = $_POST['nim'];
                  $nama = $_POST['nama'];
                  $kelas = $_POST['kelas'];
                  $jurusan = $_POST['jurusan'];
        
                  //query untuk menambahkan barang ke database, pastikan urutan nya sama dengan di database
                  mysqli_query($koneksi, "update mahasiswa set nim='$nim', nama='$nama', kelas='$kelas', jurusan='$jurusan' where id_mahasiswa ='$id'") or die(mysqli_error($koneksi));
                  //id barang tidak dimasukkan, karena sudah menggunakan AUTO_INCREMENT, id akan otomatis
        
                  //ini untuk menampilkan alert berhasil dan redirect ke halaman index
                  echo "<script>alert('data berhasil diupdate.');window.location='index.php?page=data_mahasiswa';</script>";
                }
                ?>

            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<!-- Page specific script -->





