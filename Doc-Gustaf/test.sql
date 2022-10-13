UPDATE 
    master_order
SET 
    tat_po = CASE WHEN serv_status <>'' THEN CURDATE()-entry_date ELSE date_store-entry_date
    sla_vendor = CASE WHEN CURDATE()-ca_app_date<=repair_tat THEN 'ONTIME' ELSE 'OVERDUE'
END;


UPDATE master_order SET invoice='testdariterminal' WHERE po_number=340011288;