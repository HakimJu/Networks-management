<div class="row">
  	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          	<div class="x_title">
                <h2>Moniteur Agent</h2>
            	<div class="nav navbar-right">
		   
				</div>
				<div class="clearfix"></div>
          	</div>
          	<div class="x_content">
                    <div class="row">
                        <div class="col-md-4 col-md-offset-4">
  			     <div class="form-group">
                                <label for="sel1">Sélectionner Agent </label>
                                
                                <select class="form-control" id="agentselect">
                                   <?php foreach ($agents as $a)
                                   {
                                       ?>
                                   
                                  <option><?php echo $a['nom_agent'] ?></option>
                                   <?php }; ?>
                                </select>
                              </div>
          	</div>
                        
                        </div>
                    
                            
                          
                            <span id="txtHint"></span>
                      
                        
                        
                    </div>
                    </div>
        </div>
  	</div>
</div>
