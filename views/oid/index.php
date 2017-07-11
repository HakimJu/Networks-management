<div class="row">
  	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          	<div class="x_title">
                <h2>Liste des OID</h2>
            	<div class="nav navbar-right">
					<a href="<?php echo site_url('oid/add'); ?>" class="btn btn-success btn-sm">AJOUTER</a> 
				</div>
				<div class="clearfix"></div>
          	</div>
          	<div class="x_content">
  				<table class="table table-striped">
				    <tr>
						<th>ID</th>
						<th>Nom MIB</th>
						<th>Description</th>
						<th>OID</th>
						<th>Actions</th>
				    </tr>
					<?php foreach($oid as $o){ ?>
				    <tr>
						<td><?php echo $o['id']; ?></td>
						<td><?php echo $o['nom_mib']; ?></td>
						<td><?php echo $o['description']; ?></td>
						<td><?php echo $o['oid']; ?></td>
						<td>
				            <a href="<?php echo site_url('oid/edit/'.$o['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> MODIFIER</a> 
				            <a href="<?php echo site_url('oid/remove/'.$o['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> SUPPRIMER</a>
				        </td>
				    </tr>
					<?php } ?>
				</table>
          	</div>
        </div>
  	</div>
</div>
