<div class="row">
  	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          	<div class="x_title">
                <h2>Scanner Port</h2>
            	<div class="nav navbar-right">
					
				</div>
				<div class="clearfix"></div>
          	</div>
          	<div class="x_content">
  		
                    <div class="row">
                        
                        <div class="col-md-6 col-md-offset-3">
                             
                            <form id="form_port">
                           
                            <label>Port initiale
                               
                                <input type="text"  class="form-control input-sm " id="port_init" />
                            </label>
                                
                           
                            
                            <label>Port finale
                            <input type="text"  class="form-control input-sm" id="port_end" />
                            </label>  
                            <label>IP  
                             <select class="form-control input-sm" id="domaine">
                                   <?php foreach ($q as $a)
                                   {
                                       ?>
                                   
                                  <option><?php echo $a['ip'] ?></option>
                                   <?php }; ?>
                                </select>
                           </label>     
                                
                                <input type="submit" name="click" value="SCANNER"  class="btn btn-success " id="port_btn"/>
                            
                            </form>  
                        </div> 
                       
                    </div>  
                    
                    <div class="row">
                        
                        <div class="col-md-4 col-md-offset-3">
                            
                            
                            <span id="txtHint" >
                                
                            </span>
                            
                            
                        </div>
                        
                    </div>
                    
                    
          	</div>
        </div>
  	</div>
</div>
