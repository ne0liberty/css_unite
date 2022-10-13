UPDATE master_order
SET serv_status 
CASE 
    WHEN awb_in = '' THEN 'Waiting AWB' 
    WHEN gr_date = '' THEN 'SHIPPED'
    WHEN date_store = '' THEN 'Waiting Inspect'
    ELSE 'CLOSED'

END;