delete FROM facturametadatas WHERE factura_id not in (select factura_id from cobro_factura);
update facturas set estado='P' WHERE id not in (select factura_id from cobro_factura);