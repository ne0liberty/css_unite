-- Active: 1661187206419@@127.0.0.1@3306@css_order
UPDATE master_order
SET 
tat_po = IF(serv_status<>'',CURDATE()-entry_date,date_store-entry_date),
sla_vendor = IF(ca_date='','ONTIME',IF(ca_app_date<>'0',IF(CURDATE()-ca_app_date<=repair_tat ,'ONTIME','OVERDUE'),'ONTIME'));