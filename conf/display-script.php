<?php
$conn = mysqli_connect("localhost", "root", "", "css_order");

/// edit data
if(isset($_POST['vendorId'])){
    $vendorId= $_POST['vendorId'];
    
   
   $fetchData =fetchDataById($vendorId);
   displayData($fetchData );

}

function fetchDataById($vendorId){
    
    global $conn;
    $query ="SELECT * FROM master_order WHERE shipment_order_date='".$_POST["soDate"]."' AND created_by='".$_POST["userID"]."' AND vendor='$vendorId'; ";
    $result = $conn->query($query);
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