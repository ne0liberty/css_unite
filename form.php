<html>
    <head>
        <title>belajar autofill - sahretech.com</title>
        <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
        <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    </head>
    <body>
        <form action="">
            <table>
                <tr><td>NIM</td><td>
                    <select class="form-control select2bs4" id='nim' onchange="isi_otomatis()" style="width: 100%;">
                        <option value="" selected="selected">- Select Part Number -</option>
                        <?php 
                                $server 	= "localhost";
                                $username	= "root";
                                $password	= "";
                                $db 		= "latihan"; //sesuaikan nama databasenya
                                $koneksi1    = mysqli_connect($server, $username, $password, $db); //pastikan urutan pemanggilan variabel nya sama.
                                
                                
                                $datas2 = mysqli_query($koneksi1, "SELECT * FROM latihan_autofill");   
                                while($data_nim = mysqli_fetch_assoc($datas2))  {
                                    echo "<option value =".$data_nim['nim'].">".$data_nim['nim']."</option>";
                                

                            }
                        ?>
                    </select>
                <tr><td>NIM2</td><td><input type="text" onkeyup="isi_otomatis()" id="nim"></td></tr>       
                <tr><td>NAMA</td><td><input type="text" id="nama" disabled></td></tr>
                <tr><td>JENIS KELAMIN</td><td><input type="text" id="jeniskelamin" disabled></td></tr>
                <tr><td>JURUSAN</td><td><input type="text" id="jurusan" disabled></td></tr>
                <tr><td>NO TELP</td><td><input type="text" id="notelp" disabled></td></tr>
                <tr><td>EMAIL</td><td><input type="text" id="email" disabled></td></tr>
                <tr><td>ALAMAT</td><td><input type="text" id="alamat" disabled></td></tr>
            </table>
        </form>
        <script src="plugins/jquery/jquery-1.12.4.min.js"></script>
        <script src="plugins/select2/js/select2.full.min.js"></script>
        <script type="text/javascript">
            function isi_otomatis(){
                var nim = $("#nim").val();
                $.ajax({
                    url: 'ajax.php',
                    data:"nim="+nim ,
                    cache: false,
                }).success(function (data) {
                    var json = data,
                    obj = JSON.parse(json);
                    $('#nama').val(obj.nama);
                    $('#jeniskelamin').val(obj.jeniskelamin);
                    $('#jurusan').val(obj.jurusan);
                    $('#notelp').val(obj.notelp);
                    $('#email').val(obj.email);
                    $('#alamat').val(obj.alamat);
                });
            }

            $('.select2bs4').select2({
                theme: 'bootstrap4' 
                 })
        </script>
    </body>
</html>
