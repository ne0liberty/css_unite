-- Active: 1665550077115@@127.0.0.1@3306@css_order
UPDATE master_order SET 
tat_po = IF(date_store='',DATEDIFF(CURDATE(), entry_date),date_store-entry_date),
sla_vendor = IF(ca_date='','ONTIME',IF(ca_app_date<>'',IF(DATEDIFF(CURDATE(), ca_app_date)<=repair_tat ,'ONTIME','OVERDUE'),'ONTIME')),
tat_gr = IF(eta='','',IF(gr_date='',DATEDIFF(CURDATE(), eta),gr_date-eta));