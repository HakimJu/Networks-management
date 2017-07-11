<div class="row">
  	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          	<div class="x_title">
                <h2>Modifier OID</h2>
                <ul class="nav navbar-right panel_toolbox">
                  	<li>
                  		<a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  	</li>
                </ul>
                <div class="clearfix"></div>
          	</div>
          	<div class="x_content">
	          	
				<?php echo form_open('oid/edit/'.$oid['id']); ?>
				<div class="row clearfix">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="nom_mib" class="control-label">Nom MIB</label>
						<div class="form-group">
							<input type="text" name="nom_mib" value="<?php echo ($this->input->post('nom_mib') ? $this->input->post('nom_mib') : $oid['nom_mib']); ?>" class="form-control" id="nom_mib" />
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="description" class="control-label">Description</label>
						<div class="form-group">
							<input type="text" name="description" value="<?php echo ($this->input->post('description') ? $this->input->post('description') : $oid['description']); ?>" class="form-control" id="description" />
						</div>
					</div>
				</div>
				<div class="row clearfix">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="oid" class="control-label">OID</label>
						<div class="form-group">
							<input type="text" name="oid" value="<?php echo ($this->input->post('oid') ? $this->input->post('oid') : $oid['oid']); ?>" class="form-control" id="oid" />
						</div>
					</div>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-success">
						<i class="fa fa-check"></i> ENREGISTRER
					</button>
				</div>
				<?php echo form_close(); ?>			
			</div>
        </div>
  	</div>
</div>
