UPDATE master_order SET 
tat_po = IF(serv_status<>'',CURDATE()-entry_date,date_store-entry_date),
sla_vendor = IF(ca_date='','ONTIME',IF(ca_app_date<>'',IF(CURRENT_DATE()-ca_app_date<=repair_tat ,'ONTIME','OVERDUE'),'ONTIME'));