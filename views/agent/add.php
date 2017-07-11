<div class="row">
  	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          	<div class="x_title">
                <h2>Ajouter Agent </h2>
                <ul class="nav navbar-right panel_toolbox">
                  	<li>
                  		<a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  	</li>
                </ul>
                <div class="clearfix"></div>
          	</div>
          	<div class="x_content">
				<?php echo validation_errors(); ?>
				<?php echo form_open('agent/add'); ?>
				<div class="row clearfix">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="nom_agent" class="control-label">Nom Agent</label>
						<div class="form-group">
							<input type="text" name="nom_agent" value="<?php echo $this->input->post('nom_agent'); ?>" class="form-control" id="nom_agent" />
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="placement" class="control-label">Placement</label>
						<div class="form-group">
							<input type="text" name="placement" value="<?php echo $this->input->post('placement'); ?>" class="form-control" id="placement" />
						</div>
					</div>
				</div>
				<div class="row clearfix">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="ip" class="control-label">Adresse IP</label>
						<div class="form-group">
							<input type="text" name="ip" value="<?php echo $this->input->post('ip'); ?>" class="form-control" id="ip" />
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="utilisateur" class="control-label">Utilisateur</label>
						<div class="form-group">
							<input type="text" name="utilisateur" value="<?php echo $this->input->post('utilisateur'); ?>" class="form-control" id="utilisateur" />
						</div>
					</div>
				</div>
				<div class="row clearfix">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="mdp" class="control-label">Mot de passe</label>
						<div class="form-group">
							<input type="text" name="mdp" value="<?php echo $this->input->post('mdp'); ?>" class="form-control" id="mdp" />
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