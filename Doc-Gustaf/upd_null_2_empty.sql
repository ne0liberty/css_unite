-- Active: 1661187206419@@127.0.0.1@3306@css_order
UPDATE master_order
SET awb_out = ''
WHERE awb_out IS NULL