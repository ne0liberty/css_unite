<?php
  include('../../conf/conn.php'); 
  $id = $_GET['id'];
  $datas = mysqli_query($koneksi, "SELECT * FROM master_order WHERE id_order='$id'") or die(mysqli_error($koneksi));
  $row_view = mysqli_fetch_assoc($datas)

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
        height: 25px;
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
        height: 25px;
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
            <td class="table1" rowspan="2" colspan="7" style="text-align: center; "><b>QUOTATION SHEET</b></td>
            <td colspan="3" style="width:100px ;">R.O NO</td>
            <td style="width:5px ;">:</td>
            <td class="table1" style="width:100px ; text-align:left;"><b><?php echo $row_view['po_number']; ?></b></td>
            <td class="table1" style="width:100px ; text-align:left;"><b><?php echo $row_view['tracking_no']; ?></b></td>
        </tr>
        <?php  
         $original_entry_date = $row_view['entry_date'];
         $new_entry_date = date("d-M-Y", strtotime($original_entry_date));
        ?>
        <tr class="table1" >
            <td colspan="3">DATE</td>
            <td>:</td>
            <td colspan="2"><?php echo $new_entry_date; ?></td>
        </tr>
        <tr class="table_dashed">
            <td style="width: 15px;"></td>
            <td style="width: 150px;">VENDOR / REP. STATION</td>
            <td style="width: 15px;">:</td>
            <td colspan="5"><?php echo $row_view['vendor']; ?></td>
            <td colspan="5"></td>
        </tr>
        <tr class="table_dashed">
            <td></td>
            <td>DESCRIPTION</td>
            <td>:</td>
            <td colspan="7"><?php echo $row_view['description']; ?></td>
            <td colspan="3"></td>
        </tr>
        <tr class="table_dashed">
            <td></td>
            <td>PART NUMBER</td>
            <td>:</td>
            <td colspan="7"><?php echo $row_view['pn_out']; ?></td>
            <td colspan="3"></td>
        </tr>
        <tr class="table_dashed">
            <td></td>
            <td>SERIAL NUMBER</td>
            <td>:</td>
            <td colspan="7"><?php echo $row_view['sn_out']; ?></td>
            <td colspan="3"></td>
        </tr>
        <?php  
         $original_awb_out_date = $row_view['awb_out_date'];
         $new_awb_out_date = date("d-M-Y", strtotime($original_awb_out_date));
        ?>
        <tr class="table_dashed">
            <td></td>
            <td>DATE RECEIVED</td>
            <td>:</td>
            <td colspan="7"><?php echo $new_awb_out_date; ?></td>
            <td colspan="3"></td>
        </tr>
        <tr class="table_dashed">
            <td></td>
            <td>REF. FAX / TELEX NO</td>
            <td>:</td>
            <td colspan="7"><?php echo $row_view['invoice']; ?></td>
            <td colspan="3"></td>
        </tr>
        <tr class="table_dashed">
            <td></td>
            <td></td>
            <td></td>
            <td colspan="7"></td>
            <td colspan="3"></td>
        </tr>
        <?php  
         $original_ca_date = $row_view['ca_date'];
         $new_ca_date = date("d-M-Y", strtotime($original_ca_date));
        ?>
        <tr class="table1">
            <td></td>
            <td>PREPARED BY</td>
            <td>:</td>
            <td colspan="4"><?php echo $row_view['created_by']; ?></td>
            <td colspan="4"></td>
            <td colspan="2">DATE :  <?php echo $new_ca_date; ?></td>
            
        </tr>
        <tr class="table1">
            <td colspan="13" style="text-align:center;"><b>EVALUATION REPAIR COST</b></td>
        </tr>

        <?php 
        
        $pn_out_database = $row_view['pn_out'];

        $datas2 = mysqli_query($koneksi, "SELECT * FROM pn_database WHERE part_number='$pn_out_database'") or die(mysqli_error($koneksi));
        $row_view2 = mysqli_fetch_assoc($datas2)

        ?>

        <tr class="table_dashed">
            <td></td>
            <td>THE NEW PRICE</td>
            <td>:</td>
            <td style="width:30px ; text-align:right;">USD</td>
            <td style="text-align:right; width:100px;"><?php echo $row_view2['pn_newprice']; ?></td>
            <td style="width:50px ;"></td>
            <td colspan="7"></td>
        </tr>
        <tr class="table_dashed">
            <td></td>
            <td>REPAIR COST</td>
            <td>:</td>
            <td style="width:25px ; text-align:right;">USD</td>
            <td style="text-align:right; width:100px;"><?php echo $row_view['repair_cost']; ?></td>
            <td style="width:50px ;"></td>
            <td colspan="7"></td>
        </tr>
        <tr class="table_dashed">
            <td></td>
            <td>OTHER COST</td>
            <td>:</td>
            <td style="width:25px ; text-align:right;">USD</td>
            <td style="text-align:right; width:100px;"><?php echo $row_view['other_cost']; ?></td>
            <td style="width:50px ;"></td>
            <td colspan="7"></td>
        </tr>
        <tr class="table_dashed">
            <td></td>
            <td>TOTAL</td>
            <td>:</td>
            <td style="width:25px ; text-align:right;">USD</td>
            <td style="text-align:right; width:100px;"><b><?php echo $row_view['total_cost']; ?></b></td>
            <td style="width:50px ;"></td>
            <td></td>
            <td>PERCENTAGE:</td>
            <td></td>
            <td colspan="4"><b>

            <?php  
            $percentage = $row_view['total_cost'];
            $totalWidth = $row_view2['pn_newprice']; 

            $new_width = ($percentage / $totalWidth) * 100; 
            
            echo number_format((float)$new_width, 2, '.', ''); ?> %
            </b></td>
        </tr>
        <tr class="table_dashed">
            <td></td>
            <td>NOTE</td>
            <td>:</td>
            <td style="width:25px ; text-align:right;"></td>
            <td style="text-align:right; width:100px;"></td>
            <td style="width:50px ;"></td>
            <td colspan="7"></td>
        </tr>
        <tr class="table_dashed">
            <td></td>
            <td></td>
            <td></td>
            <td style="width:25px ; text-align:right;"></td>
            <td style="text-align:right; width:100px;"></td>
            <td style="width:50px ;"></td>
            <td colspan="7"></td>
        </tr>
        <tr class="table1">
            <td colspan="13" style="text-align:center;">THIS PRICE HAS BEEN EVALUATED TO CONTINUING PROCESS</td>
        </tr>
        <tr>
            <td class="table1" colspan="4" style="text-align: center;"><b>EVALUATED BY PURCHASER</b></td>
            <td class="table1" colspan="5" style="text-align: center;"><b>CHECKED BY MANAGER</b></td>
            <td class="table1" colspan="4" style="text-align: center;"><b>APPROVED GENERAL MANAGER</b></td>
        </tr>
        <tr>
            <td class="table1" colspan="4" style="text-align: center; height:80px;"></td>
            <td class="table1" colspan="5" style="text-align: center; height:80px;"></td>
            <td class="table1" colspan="4" style="text-align: center; height:80px;"></td>
        </tr>
        <tr>
            <td colspan="4" style="text-align: left; border-right: 1px solid black; padding-left: 15px;">NAMA & SIGN  : <?php echo $row_view['created_by']; ?></td>
            <td colspan="5" style="text-align: left; padding-left: 15px;">NAMA & SIGN  : WASIS HADI KAMAL</td>
            <td colspan="4" style="text-align: left; padding-left: 15px; border-left: 1px solid black;">NAMA & SIGN  : ANNISA PUSPITASARI</td>
        </tr>
        
        <tr>
            <td colspan="4" style="text-align: left; padding-left: 15px; border-right: 1px solid black;">DATE : <?php echo date('d-M-Y'); ?></td>
            <td colspan="5" style="text-align: left; padding-left: 15px;">DATE</td>
            <td colspan="4" style="text-align: left; padding-left: 15px;border-left: 1px solid black;">DATE</td>
        </tr>
        <tr>
            <td colspan="5" class="table1" style="text-align: center;"><b>APPROVE BY VP COMPONENT SERVICES</b></td>
            <td colspan="8" class="table1" style="text-align: center;"><b>APPROVED BY DIRECTOR</b></td>
        </tr>
        <tr>
            <td colspan="5" style="text-align: center; border-right: 1px solid black; height:80px;"></td>
            <td colspan="8" style="text-align: center;"></td>
        </tr>
        <tr>
            <td colspan="5" style="text-align: left; border-right: 1px solid black; padding-left: 15px;">NAME & SIGN : </td>
            <td colspan="8" style="text-align: left; border-right: 1px solid black; padding-left: 15px;">NAME & SIGN : </td>
        </tr>
        <tr>
            <td colspan="5" style="text-align: left; border-right: 1px solid black; padding-left: 15px;">DATE : </td>
            <td colspan="8" style="text-align: left; padding-left: 15px;">DATE : </td>
        </tr>
        <tr style="height:25px; border-top:1px solid black;">
            <td></td>
            <td colspan="8">REPLY TO VENDOR / REP. STATION BY EMAIL FAX/TLX. NO. : …………………………</td>
            <td colspan="4">DATE:</td>
        </tr>
        <tr style="height:25px;">
            <td style="height: 70px;"></td>
            <td colspan="8"></td>
            <td colspan="4"></td>
        </tr>
        <tr style="height:25px;">
            <td></td>
            <td colspan="8">UP DATE  SAP ( ME23N ):YES/NO  DATE :</td>
            <td colspan="4">SIGN:</td>
        </tr>
    </table>
    <a style="font-size: 12px;">Form GMF/Q-299 R1</a>
    
</section>
</body>
</html>