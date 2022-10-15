-- Active: 1661187206419@@127.0.0.1@3306@css_order
UPDATE master_order
SET 
tat_po = CASE WHEN serv_status <>'' THEN CURDATE()-entry_date ELSE date_store-entry_date END,
sla_vendor = CASE WHEN CURDATE()-ca_app_date<=repair_tat THEN 'ONTIME' ELSE 'OVERDUE' END;


