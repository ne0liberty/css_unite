<?php

include 'conn.php';

$updt_stat = mysqli_query($koneksi, "UPDATE master_order SET serv_status=
                             IF(req_scheme='exchange',
                             IF(awb_in='','NEED AWB IN',
                             IF(gr_date='','SERV SHIPPED',
                             IF(date_store='','NEED INSPECT',
                             IF(sn_out='','NEED CORE',
                             IF(shipment_order_date='','NEED SO',
                             IF(awb_out='','NEED AWB OUT',
                             IF(invoice='','NEED REPAIR QUOTE',
                             IF(ca_app_date='','NEED REPAIR APPROVAL',
                             IF(payment_ref='','NEED PAYMENT',
                             'CLOSED'))))))))),
                             IF(sn_out='','NEED CORE',
                             IF(shipment_order_date='','NEED SO',
                             IF(awb_out='','NEED AWB OUT',
                             IF(invoice='','NEED REPAIR QUOTE',
                             IF(ca_app_date='','NEED REPAIR APPROVAL',
                             IF(payment_ref='','NEED PAYMENT',
                             IF(awb_in='','NEED AWB IN',
                             IF(gr_date='','SERV SHIPPED',
                             IF(date_store='','NEED INSPECT',
                             'CLOSED')))))))))
                             );");

echo "update berhasil";
break();

?>
