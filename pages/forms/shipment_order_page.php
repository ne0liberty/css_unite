<?php
 include('../../conf/conn.php'); 
 $id = $_GET['id'];
 $datas = mysqli_query($koneksi, "SELECT * FROM shipment_order WHERE id_shipment_order='$id'") or die(mysqli_error($koneksi));
 $item = mysqli_fetch_assoc($datas)

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shipment Order Print</title>

    <link rel="stylesheet" href="../../plugins/paper.css">

    <style>
    @page { size: A4 }
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        font-size: 12px;
        height: 18px;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
    .table2 {
        border: 0px;
        font-size: 12px;
        height: 15px;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }
    
    .sheet.padding-5mm { padding: 5mm }

    .checkCircle {
    border-radius: 50%;
    width: 15px;
    height: 15px;
    padding: 1px;
    display: inline-block;

    background: #fff;
    border: 2px solid #000;
    color: #000;
    text-align: center;

    font-size: 12px;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }

    .uncheckCircle {
    border-radius: 50%;
    width: 15px;
    height: 15px;
    padding: 1px;
    display: inline-block;

    background: #fff;
    border: 2px solid #fff;
    color: #000;
    text-align: center;

    font-size: 12px;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }

</style>
</head>
<body class="A4">
<section class="sheet padding-15mm">
    <table width="100%" style="font-family:'Calibri'">
        <tr>
          <th width="250px" style="height:50px"> <img src="../../dist/img/gmfaeroasia.PNG" height="80%" width="80%"></img></th>
          <th colspan="2">SHIPMENT ORDER</th>
        </tr>
        <tr>
          <th colspan="3" style="text-align:left">Shipment Order Number :</th>
        </tr>
        <tr>
          <td>checklist</td>
          <td colspan="2">Fill Form</td>
        </tr>
        <tr>
            <td>Shipper Name and Address</td>
            <th colspan="2" style="text-align:left">PT.GMF AEROASIA tbk</th>
        </tr>
        <tr>
            <td rowspan="2">Shipment Consignee</td>
            <td colspan="2"><a class="<?php $option = $item['shipmnt_csg']; 
            switch ($option) {
                case "a";
                echo "checkCircle";
                break;
                default:
                echo "uncheckCircle";
            }
            ?>">a</a>Normal</td>
        </tr>
        <tr>
            <td colspan="2"><a class="<?php $option = $item['shipmnt_csg']; 
            switch ($option) {
                case "b";
                echo "checkCircle";
                break;
                default:
                echo "uncheckCircle";
            }
            ?>">b</a>AOG</td>
        </tr>
        <tr>
            <td rowspan="2">Goods Category</td>
            <td colspan="2"><a class="<?php $option = $item['goods_cat']; 
            switch ($option) {
                case "a";
                echo "checkCircle";
                break;
                default:
                echo "uncheckCircle";
            }
            ?>">a</a>Dangerous Goods (DG)</td>
        </tr>
        <tr>
            <td colspan="2"><a class="<?php $option = $item['goods_cat']; 
            switch ($option) {
                case "b";
                echo "checkCircle";
                break;
                default:
                echo "uncheckCircle";
            }
            ?>">b</a>General Cargo (Genco)</td>
        </tr>
        <tr>
            <td>Consignee Name and Address</td>
            <td colspan="2" style="height:120px"><?php echo nl2br($item['address']); ?></td>
        </tr>
        <tr>
            <td rowspan="2">Mode of Shipment</td>
            <td><a class="<?php $option = $item['shipment_mode']; 
            switch ($option) {
                case "a";
                echo "checkCircle";
                break;
                default:
                echo "uncheckCircle";
            }
            ?>">a</a>Air Freight</td>
            <td rowspan="2" style="vertical-align:top"><a class="<?php $option = $item['shipment_mode']; 
            switch ($option) {
                case "c";
                echo "checkCircle";
                break;
                default:
                echo "uncheckCircle";
            }
            ?>">c</a>Land Freight</td>
        </tr>
        <tr>
            <td><a class="<?php $option = $item['shipment_mode']; 
            switch ($option) {
                case "b";
                echo "checkCircle";
                break;
                default:
                echo "uncheckCircle";
            }
            ?>">b</a>Sea Freight</td>
        </tr>
        <tr>
            <td rowspan="2">Customer assign GMF Logistic Services to ship good(s)</td>
            <td><a class="<?php $option = $item['log_service']; 
            switch ($option) {
                case "a";
                echo "checkCircle";
                break;
                default:
                echo "uncheckCircle";
            }
            ?>">a</a>DAP</td>
            <td><a class="<?php $option = $item['log_service']; 
            switch ($option) {
                case "c";
                echo "checkCircle";
                break;
                default:
                echo "uncheckCircle";
            }
            ?>">c</a>DAT</td>
        </tr>
        <tr>
            <td><a class="<?php $option = $item['log_service']; 
            switch ($option) {
                case "b";
                echo "checkCircle";
                break;
                default:
                echo "uncheckCircle";
            }
            ?>">b</a>DDP</td>
            <td><a class="<?php $option = $item['log_service']; 
            switch ($option) {
                case "d";
                echo "checkCircle";
                break;
                default:
                echo "uncheckCircle";
            }
            ?>">d</a>CPT</td>
        </tr>
        <tr>
            <td>Pick Up Address</td>
            <td colspan="2">GMF Logistic - Export Department</td>
        </tr>
        <tr>
            <td style="height:120px">Goods Details and Value of Goods</td>
            <td colspan="2">Details on next page</td>
        </tr>
        <tr>
            <td>Packaging</td>
            <td colspan="2">Box / Wooden / Loose / others</td>
        </tr>
        <tr>
            <td>Aircraft Registration / Airlines</td>
            <td>REMOVE FROM</td>
            <td>??</td>
        </tr>
        <tr>
            <td>Special Request</td>
            <td colspan="2">Make sure PN SN already checked with proper document attached</td>
        </tr>
        <tr>
            <td>Payment Responsibility</td>
            <td colspan="2">????</td>
        </tr>
        <tr>
            <td colspan="3" style="text-align:center">Customer agree with shipment all arranged by GMF Logistic Services</td>
        </tr>
    </table>
    <table width="100%" class="table2">
        <tr>
            <td width="250px" colspan="2" style="border:0px;height:40px"></td>
            <td style="border:0px;">Jakarta,<?php echo $item['shipment_order_date']; ?> </td>
        </tr>
        <tr>
            <td style="border:0px;">Received  by</td>
            <td style="border:0px;"></td>
            <td style="border:0px;">Approved by Customer</td>
        </tr>
        <tr>
            <td style="height:80px; border: 0px;">---TTD---</td>
            <td style="border:0px;"></td>
            <td style="border:0px;">---TTD---</td>
        </tr>
        <tr>
            <td style="border:0px; height: 30px; vertical-align: top;">Receiver</td>
            <td style="border:0px;"></td>
            <td style="border:0px; vertical-align: top;"><?php echo nl2br($item['created_by']); ?></td>
        </tr>
        <tr>
            <td colspan="3">FORM NO: GMF/P-001 R0</td>
        </tr>
    </table>
</section>
</body>
<body class="A4">
    <section class="sheet padding-15mm">
        <table width="100%" style="font-family:'Calibri'">
            <tr>
                <th>No.</th>
                <th>Description</th>
                <th>Part Number</th>
                <th>Serial Number</th>
                <th>Tracking No.</th>
                <th>PO Number</th>
                <th>Cond</th>
            </tr>
            <?php

            $vendorlist = $item['vendor'];
            $createdby = $item['created_by'];
            $shipmentdate = $item['shipment_order_date'];

            $datas2 = mysqli_query($koneksi, "SELECT * FROM master_order WHERE vendor='$vendorlist' AND created_by='$createdby' AND shipment_order_date='$shipmentdate' ") or die(mysqli_error($koneksi));
                    //script untuk menampilkan data barang

            $no = 1;//untuk pengurutan nomor
            while($row = mysqli_fetch_assoc($datas2)) {
            ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $row['description']; ?></td>
                <td><?= $row['pn_out']; ?></td>
                <td><?= $row['sn_out']; ?></td>
                <td><?= $row['tracking_no']; ?></td>
                <td><?= $row['po_number']; ?></td>
                <td><?= $row['core_cond']; ?></td>
            </tr>
            <?php $no++; } ?>
        </table>
    </section>
    </body>
</html>