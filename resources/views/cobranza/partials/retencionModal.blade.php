<div class="modal fade" id="retencion-modal">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Selección de retención</h4>
			</div>
			<div class="modal-body">
			    <div class="form-horizontal">
                    <div class="form-group">
                        <label for="fecha-modal-input" class="col-sm-2 control-label">Fecha retención</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="fecha-retencion-input" autocomplete='off'>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fecha-modal-input" class="col-sm-2 control-label">Comprobante retención</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="comprobante-retencion-input" autocomplete='off'>
                        </div>
                    </div>
			    </div>

				<div class="row" style="margin:15px auto">

					<label class="control-label col-xs-2">Base a pagar</label>

					<div class="col-xs-4">
						<input class="form-control" id="base-modal-input" readonly/>
					</div>
					<label class="control-label col-xs-2">IVA a pagar</label>
					<div class="col-xs-4">
						<input class="form-control" id="iva-modal-input" readonly/>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-offset-3 col-xs-6">
						<table class="table">
							<thead class="bg-primary"><tr><th></th><th>Concepto</th><th>Porcentaje</th></tr></thead>
							<tbody>
								<tr>
									<td><input type="checkbox" class="retencion-check" autocomplete="off" /></td>
									<td>ISLR</td>
									<td><input type="text" class="form-control retencion-input" id="islrper-modal-input" data-target="#base-modal-input" /></td>
								</tr>
								<tr>
									<td><input type="checkbox" class="retencion-check" autocomplete="off"/></td>
									<td>IVA</td>
									<td><input type="text" class="form-control retencion-input" id="ivaper-modal-input" data-target="#iva-modal-input" /></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="row" style="margin:15px auto">

					<label class="control-label col-xs-2">Total</label>

					<div class="col-xs-4">
						<input class="form-control" id="total-modal-input" readonly value="0,00" autocomplete="off"/>
					</div>

				</div>
			</div>
			<div class="modal-footer">

				<button type="button" class="btn btn-primary" id="accept-retencion-modal-btn">Aceptar</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->