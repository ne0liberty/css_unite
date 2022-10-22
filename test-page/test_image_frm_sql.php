<?php
session_start();
include "../conf/conn.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test image from SQL</title>
</head>
<body>
    <?php
        $test = mysqli_query($koneksi, "SELECT * FROM admins WHERE id = 1");
        $row = mysqli_fetch_assoc($test);

        echo '<img src="data:image/jpeg;base64,'.base64_encode($row['img']).'"/>';
    ?>
    ddasdasds
</body>
</html>