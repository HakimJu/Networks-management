<div class="row">
  	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          	<div class="x_title">
                <h2>Ajouter Administrateur </h2>
                <ul class="nav navbar-right panel_toolbox">
                  	<li>
                  		<a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  	</li>
                </ul>
                <div class="clearfix"></div>
          	</div>
          	<div class="x_content">
				
				<?php echo form_open('user/add'); ?>
				<div class="row clearfix">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="nom" class="control-label">Nom</label>
						<div class="form-group">
							<input type="text" name="nom" value="<?php echo $this->input->post('nom'); ?>" class="form-control" id="nom" />
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="prenom" class="control-label">Prénom</label>
						<div class="form-group">
							<input type="text" name="prenom" value="<?php echo $this->input->post('prenom'); ?>" class="form-control" id="prenom" />
						</div>
					</div>
				</div>
				<div class="row clearfix">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="email" class="control-label">E-mail</label>
						<div class="form-group">
							<input type="text" name="email" value="<?php echo $this->input->post('email'); ?>" class="form-control" id="email" />
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="mdp" class="control-label">Mot de passe </label>
						<div class="form-group">
							<input type="text" name="mdp" value="<?php echo $this->input->post('mdp'); ?>" class="form-control" id="mdp" />
						</div>
					</div>
				</div>
				<div class="row clearfix">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="role" class="control-label">Rôle</label>
						<div class="form-group">
							<input type="text" name="role" value="<?php echo $this->input->post('role'); ?>" class="form-control" id="role" />
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