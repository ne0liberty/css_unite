<?php
include('conn.php');

$update2 = mysqli_query($koneksi, "UPDATE master_order SET serv_status=
IF(req_scheme='exchange',
IF(serv_status='CANCEL','CANCEL',
IF(awb_in='','NEED AWB IN',
IF(gr_date='0000-00-00','SERV SHIPPED',
IF(date_store='0000-00-00','NEED INSPECT',
IF(sn_out='','NEED CORE',
IF(shipment_order_date='0000-00-00','NEED SO',
IF(awb_out='','NEED AWB OUT',
IF(invoice='','NEED REPAIR QUOTE',
IF(ca_app_date='0000-00-00','NEED REPAIR APPROVAL',
IF(payment_ref='','NEED PAYMENT',
'CLOSED')))))))))),
IF(req_scheme='repair',
IF(serv_status='CANCEL','CANCEL',
IF(sn_out='','NEED CORE',
IF(shipment_order_date='0000-00-00','NEED SO',
IF(awb_out='','NEED AWB OUT',
IF(invoice='','NEED REPAIR QUOTE',
IF(ca_app_date='0000-00-00','NEED REPAIR APPROVAL',
IF(payment_ref='','NEED PAYMENT',
IF(awb_in='','NEED AWB IN',
IF(gr_date='0000-00-00','SERV SHIPPED',
IF(date_store='0000-00-00','NEED INSPECT',
'CLOSED')))))))))),
IF(serv_status='CANCEL','CANCEL',
IF(awb_in='','NEED AWB IN',
IF(gr_date='0000-00-00','SERV SHIPPED',
IF(date_store='0000-00-00','NEED INSPECT',
IF(sn_out='','NEED CORE',
IF(shipment_order_date='0000-00-00','NEED SO',
IF(awb_out='','NEED AWB OUT',
'CLOSED')))))))));");


$update3 = mysqli_query($koneksi, "UPDATE master_order SET core_stat=
IF(req_scheme='exchange',
IF(serv_status='CANCEL','CANCEL',
IF(sn_out='','NEED CORE',
IF(shipment_order_date='0000-00-00','NEED SO',
IF(awb_out='','NEED AWB OUT',
'CLOSED')))),
IF(req_scheme='pooling',
IF(serv_status='CANCEL','CANCEL',
IF(sn_out='','NEED CORE',
IF(shipment_order_date='0000-00-00','NEED SO',
IF(awb_out='','NEED AWB OUT',
'CLOSED')))),
''));");

?>
