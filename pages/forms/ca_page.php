<?php
 // include('../../conf/conn.php'); 
 // $id = $_GET['id'];
 // $datas = mysqli_query($koneksi, "SELECT * FROM master_order WHERE id_order='$id'") or die(mysqli_error($koneksi));
 // $item = mysqli_fetch_assoc($datas)

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Approval Sheet</title>

    <link rel="stylesheet" href="../../plugins/paper.css">

    <style>
    @page { size: A4 }
    .table1 {
        border: 1px solid black;
        border-collapse: collapse;
        font-size: 12px;
        height: 23px;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }

    .table2 {
        border: 0px;
        font-size: 12px;
        height: 15px;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }

    .table_dashed {
        border: 1px dashed black;
        border-collapse: collapse;
        font-size: 12px;
        height: 23px;
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

    .logo_gmf {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 40%;
    padding: 20px;
    }

</style>
</head>
<body class="A4">
<section class="sheet padding-15mm">
    <img class="logo_gmf" src="../../dist/img/gmfaeroasia.PNG"></img>
    <table class="table1" width="100%">
        <tr>
            <td class="table1" rowspan="2" colspan="7" style="text-align: center;"><b>QUOTATION SHEET</b></td>
            <td colspan="3">R.O NO</td>
            <td>:</td>
            <td class="table1" >404050500</td>
            <td class="table1" >404050500</td>
        </tr>
        <tr class="table1" >
            <td colspan="3">DATE</td>
            <td>:</td>
            <td colspan="2">7 Sep 2022</td>
        </tr>
        <tr class="table_dashed">
            <td style="width: 15px;"></td>
            <td style="width: 120px;">VENDOR / REP. STATION</td>
            <td style="width: 15px;">:</td>
            <td colspan="4" style="width: 100px;">F1787      SOCIETE AIR FRANCE</td>
            <td colspan="6"></td>
        </tr>
        <tr class="table_dashed">
            <td></td>
            <td>DESCRIPTION</td>
            <td>:</td>
            <td colspan="7">EMERGENCY POWER ASSIST SYSTEM (EPAS) BATTERY PACK</td>
            <td colspan="3"></td>
        </tr>
        <tr class="table_dashed">
            <td></td>
            <td>PART NUMBER</td>
            <td>:</td>
            <td colspan="7"></td>
            <td colspan="3"></td>
        </tr>
        <tr class="table_dashed">
            <td></td>
            <td>SERIAL NUMBER</td>
            <td>:</td>
            <td colspan="7"></td>
            <td colspan="3"></td>
        </tr>
        <tr class="table_dashed">
            <td></td>
            <td>DATE RECEIVED</td>
            <td>:</td>
            <td colspan="7"></td>
            <td colspan="3"></td>
        </tr>
        <tr class="table_dashed">
            <td></td>
            <td>DATE RECEIVED</td>
            <td>:</td>
            <td colspan="7"></td>
            <td colspan="3"></td>
        </tr>
        <tr class="table1">
            <td></td>
            <td>PREPARED BY</td>
            <td>:</td>
            <td colspan="4">GUSTAF KUSUMA PRADANA</td>
            <td colspan="4"></td>
            <td>DATE :</td>
            <td>7 SEP 2022</td>
        </tr>
        <tr class="table1">
            <td colspan="12" style="text-align:center;"><b>EVALUATION REPAIR COST</b></td>
        </tr>
    </table>
    <table width="100%" class="table2">
        <tr>
            <td width="250px" colspan="2" style="border:0px;height:40px"></td>
            <td style="border:0px;">Jakarta,> </td>
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
            <td style="border:0px; vertical-align: top;">Gustaf Kusuma Pradana</td>
        </tr>
        <tr>
            <td colspan="3">FORM NO: GMF/P-001 R0</td>
        </tr>
    </table>
</section>
</body>
</html>