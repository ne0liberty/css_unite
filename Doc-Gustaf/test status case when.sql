-- Active: 1661187206419@@127.0.0.1@3306@css_order
UPDATE master_order
SET 
serv_status= CASE WHEN awb_in='' THEN 'Waiting AWB' END,
serv_status= CASE WHEN gr_date='' THEN 'SHIPPED' END,
serv_status= CASE WHEN date_store='' THEN 'Waiting Inspect' ELSE 'CLOSED' END;