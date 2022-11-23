<?php
  	include('conn.php');
       //melakukan pengecekan jika button submit diklik maka akan menjalankan perintah simpan dibawah ini
       if($_GET['act']== 'add'){
        $vendor = $_POST['vendor'];
        $address1 = $_POST['address1'];
        $address2 = $_POST['address2'];
    
        //query
        $add = mysqli_query($koneksi, "INSERT INTO vendor_database (vendor,address1,address2) 
         VALUES ('$vendor','$address1','$address2')");
    
        if ($add) {
            # code redicet setelah insert ke index
            echo "<script>alert('Data has been saved.');window.location='../index.php?page=vendor_database';</script>";
        }
        else{
            echo "ERROR,". mysqli_error($koneksi);
        }
    }
    elseif($_GET['act']=='edit'){
        $part_number = $_POST['part_number'];
        $description = $_POST['description'];
        $ata = $_POST['ata'];
        $pn_newprice = $_POST['pn_newprice'];
    
        //query update
        $update = mysqli_query($koneksi, "UPDATE pn_database SET part_number='$part_number',description='$description',ata='$ata',pn_newprice='$pn_newprice' WHERE part_number='$part_number'");
    
        if ($update) {
            # credirect ke page index
            echo "<script>alert('Data has been saved.');window.location='../index.php?page=pn_database';</script>";    
        }
        else{
            echo "ERROR". mysqli_error($koneksi);
        }
    }
     ?>