<!-- DataTables -->
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="plugins/bootstrap/bootstrap.min.css">

<?php
include('conn.php');

//$conn = mysqli_connect("127.0.0.1", "gustaf", "password", "css_order");

/// edit data
if(isset($_POST['vendorId'])){
    $vendorId= $_POST['vendorId'];


   $fetchData =fetchDataById($vendorId);
   displayData($fetchData );

}

function fetchDataById($vendorId){

    global $koneksi;
    $query ="SELECT * FROM master_order WHERE shipment_order_date='".$_POST["soDate"]."' AND created_by='".$_POST["userID"]."' AND vendor='$vendorId'; ";
    $result = $koneksi->query($query);
    if($result->num_rows> 0){
      $vendor_list= mysqli_fetch_all($result, MYSQLI_ASSOC);
    }else{
     $vendor_list=[];
    }
    return $vendor_list;
}
function displayData($fetchData){
 echo '<table id="example3" class="table table-bordered">
          <thead>
          <tr>
            <th>No.</th>
            <th>Description</th>
            <th>Part Number</th>
            <th>Serial Number</th>
            <th>Tracking No</th>
            <th>PO Number</th>
            <th>Condition</th>
          </tr>
          </thead>';
 if(count($fetchData)>0){
      $no=1;
      foreach($fetchData as $data){
  echo "<tr>
          <td>".$no."</td>
          <td>".$data['description']."</td>
          <td>".$data['pn_out']."</td>
          <td>".$data['sn_out']."</td>
          <td>".$data['tracking_no']."</td>
          <td>".$data['po_number']."</td>
          <td>".$data['core_cond']."</td>
        </tr>";

  $no++;
     }
}else{

  echo "<tr>
        <td colspan='7'>No Data Found</td>
       </tr>";
}
  echo "</table>";
}
?>

<script>
$(function () {
  $('#example3').DataTable({
      "paging": false,
      "lengthChange": true,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": true,
      "responsive": true,

    });
  })
</script>
