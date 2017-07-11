<div class="row">
  	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          	<div class="x_title">
                <h2>Logs</h2>
            	<div class="nav navbar-right">
					
				</div>
				<div class="clearfix"></div>
          	</div>
          	<div class="x_content">
  		
                    <div class="row">
                        
                       <table class="table table-striped" id="tablelogs">
				    <tr>
						<th>IP</th>
						<th>Type d'erreur</th>
						<th>Date</th>
						
				    </tr>
					<?php foreach($logs as $a){ ?>
				    <tr>
						<td><?php echo $a['ip']; ?></td>
						<td class="text-danger" ><?php echo $a['info']; ?></td>
						<td><?php echo $a['date']; ?></td>
						
				    </tr>
					<?php } ?>
				</table>
                       
                    </div>  
                    
                  
                    
          	</div>
        </div>
  	</div>
</div>
