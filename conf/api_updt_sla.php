<?php

include('conn.php');

    $updt = mysqli_query($koneksi, "UPDATE master_order SET
    tat_po = IF(date_store='0000-00-00',DATEDIFF(CURDATE(), entry_date),DATEDIFF(date_store,entry_date)),
    sla_vendor = IF(ca_date='0000-00-00','ONTIME',IF(ca_app_date<>'0000-00-00',IF(DATEDIFF(CURDATE(), ca_app_date)<=repair_tat ,'ONTIME','OVERDUE'),'ONTIME')),
    tat_gr = IF(eta='0000-00-00','',IF(gr_date='0000-00-00',DATEDIFF(CURDATE(), eta),DATEDIFF(gr_date,eta))),
    tat_core = IF(eta='0000-00-00','',IF(awb_out_date='0000-00-00',DATEDIFF(CURDATE(), awb_date),DATEDIFF(awb_out_date,awb_date))),
    sla_core = IF(req_scheme <> 'Repair',IF(tat_core <= (repair_tat-5), 'ONTIME',IF(tat_core >=repair_tat,'LATE','WARNING')),'');");
?>
