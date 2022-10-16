-- Active: 1661187206419@@127.0.0.1@3306@css_order
UPDATE master_order
SET date_store = ''
WHERE date_store IS NULL;