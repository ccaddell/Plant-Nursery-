DELIMITER //

create procedure drop_supplier(IN supplier_1 varchar(255))
begin
		DECLARE sup_id INT DEFAULT -1;
		DECLARE plant_id INT DEFAULT -1;
        
        SELECT sid INTO sup_id FROM Supplier WHERE supplier_1 = Supplier.Company_name;
        SELECT pid INTO plant_id FROM Supplier_plants AS sp WHERE sp.sid = sup_id;
        
		DELETE FROM nursery.supplier AS s WHERE s.sid = sup_id;
        DELETE FROM nursery.supplier_plants AS s_p WHERE s_p.sid = sup_id;
        DELETE FROM nursery.plants AS p WHERE p.pid = plant_id;
end //

DELIMITER ;
