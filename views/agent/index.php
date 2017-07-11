<div class="row">
  	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          	<div class="x_title">
                <h2>Liste des Agents </h2>
            	<div class="nav navbar-right">
					<a href="<?php echo site_url('agent/add'); ?>" class="btn btn-success btn-sm">AJOUTER</a> 
				</div>
				<div class="clearfix"></div>
          	</div>
          	<div class="x_content">
  				<table class="table table-striped" id="tableagent">
				    <tr>
						<th>ID</th>
						<th>Nom Agent</th>
						<th>Placement</th>
						<th>IP</th>
						
						<th>Actions</th>
				    </tr>
					<?php foreach($agents as $a){ ?>
				    <tr>
						<td><?php echo $a['id']; ?></td>
						<td><?php echo $a['nom_agent']; ?></td>
						<td><?php echo $a['placement']; ?></td>
						<td class="server"><?php echo $a['ip']; ?></td>
						
						<td>
				            <a href="<?php echo site_url('agent/edit/'.$a['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> MODIFIER</a> 
				            <a href="<?php echo site_url('agent/remove/'.$a['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> SUPPRIMER</a>
				        </td>
				    </tr>
					<?php } ?>
				</table>
          	</div>
        </div>
  	</div>
</div>
