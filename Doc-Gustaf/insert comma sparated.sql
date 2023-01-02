UPDATE master_order SET fav_order = CONCAT(fav_order, ',', 'gustaf') WHERE id_order = 37;
UPDATE master_order SET fav_order = CONCAT( master_order.fav_order , ", gustaf" ) WHERE id_order = 67;