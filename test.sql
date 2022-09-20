UPDATE master_order SET tat_po = IF(serv_status<>'',CURDATE()-entry_date,date_store-entry_date);
UPDATE master_order SET sla_vendor = IF()