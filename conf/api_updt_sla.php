<?php

include('conn.php');

$updt = mysqli_query($koneksi, "UPDATE master_order SET
tat_po = IF(date_store='0000-00-00',DATEDIFF(CURDATE(), entry_date),date_store-entry_date),
sla_vendor = IF(ca_date='0000-00-00','ONTIME',IF(ca_app_date<>'0000-00-00',IF(DATEDIFF(CURDATE(), ca_app_date)<=repair_tat ,'ONTIME','OVERDUE'),'ONTIME')),
tat_gr = IF(eta='0000-00-00','',IF(gr_date='0000-00-00',DATEDIFF(CURDATE(), eta),gr_date-eta)),
tat_core = IF(eta='0000-00-00','',IF(awb_out_date='0000-00-00',DATEDIFF(CURDATE(), awb_date),awb_out_date-awb_date));");
?>
