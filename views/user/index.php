<div class="row">
  	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          	<div class="x_title">
                <h2>Liste des administrateurs</h2>
            	<div class="nav navbar-right">
					<a href="<?php echo site_url('user/add'); ?>" class="btn btn-success btn-sm">AJOUTER</a> 
				</div>
				<div class="clearfix"></div>
          	</div>
          	<div class="x_content">
  				<table class="table table-striped">
				    <tr>
						<th>ID</th>
						<th>Nom</th>
						<th>Prénom</th>
						<th>E-mail</th>
						<th>Mot de passe</th>
						<th>Rôle</th>
						<th>Actions</th>
				    </tr>
					<?php foreach($users as $u){ ?>
				    <tr>
						<td><?php echo $u['id']; ?></td>
						<td><?php echo $u['nom']; ?></td>
						<td><?php echo $u['prenom']; ?></td>
						<td><?php echo $u['email']; ?></td>
						<td><?php echo $u['mdp']; ?></td>
						<td><?php echo $u['role']; ?></td>
						<td>
				            <a href="<?php echo site_url('user/edit/'.$u['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> MODIFIER</a> 
				            <a href="<?php echo site_url('user/remove/'.$u['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> SUPPRIMER</a>
				        </td>
				    </tr>
					<?php } ?>
				</table>
          	</div>
        </div>
  	</div>
</div>
