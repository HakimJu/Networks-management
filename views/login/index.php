<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>STEG</title>
        <link rel="stylesheet" href="<?php echo site_url('resources/css/bootstrap.min.css') ?>">
	<style type="text/css">

	
	</style>
</head>
<body>

    <div class="container">
        
        <div class="row" style="margin:180px 120px">
           <div class="col-md-8">
            
               <img src="<?php echo site_url('resources/img/STEG.jpg') ?>" width="550px">
        </div>
            
            <div class="col-md-4">
            
              
                
                 <?php echo form_open('login/cnx'); ?>
				
				<div class="row clearfix">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="email" class="control-label">Adresse e-mail</label>
						<div class="form-group">
							<input type="text" name="email" value="<?php echo $this->input->post('email'); ?>" class="form-control" id="email" />
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label for="mdp" class="control-label">Mot de passe</label>
						<div class="form-group">
							<input type="password" name="mdp" value="<?php echo $this->input->post('mdp'); ?>" class="form-control" id="mdp" />
						</div>
					</div>
				</div>
				
				<div class="form-group">
					<button type="submit" class="btn btn-success " >
						<i class="fa fa-check"></i> CONNEXION
					</button>
				</div>
				<?php echo form_close(); ?>
        </div>
        </div>
        
     
        
        <p class="text-warning" style="float:right">Page chargée en <strong>{elapsed_time}</strong> secondes. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
   </div>
<script src="<?php echo site_url('resources/js/bootstrap.min.js') ?>"></script>
</body>
</html>
  				
				       