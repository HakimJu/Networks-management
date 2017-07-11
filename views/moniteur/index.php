<div class="row">
  	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          	<div class="x_title">
                <h2>Moniteur Serveur</h2>
            	<div class="nav navbar-right">
		   
				</div>
				<div class="clearfix"></div>
          	</div>
          	<div class="x_content">
                    <div class="row">
                        <div class="col-md-8">
  				<table class="table table-striped" id="tableagent">
                                
                                <tr>
                                <td><span class="glyphicon glyphicon-home"></span> Nom d'hôte canonique</td>
                                <td><span><?php echo $CsName ?></span></td>
                                </tr>
                                <tr>
                                <td><span class="glyphicon glyphicon-user"></span> Utilisateurs</td>
                                <td><span><?php echo $users ?></span></td>
                                </tr>
                                <tr>
                                <td><span class="glyphicon glyphicon-screenshot"></span> Adresse IP</td>
                                <td><span><?php echo $Hote ?></span></td>
                                </tr>
                                <tr>
                                <td><span class="glyphicon glyphicon-flag"></span> Distribution</td>
                                <td><span><?php echo "<img src='/resources/img/WinVista.png' /> ". utf8_encode($OsCaption) ?></span></td>
                                </tr>
                                <tr>
                                <td><span class="glyphicon glyphicon-cog"></span> Version du noyau</td>
                                <td><span><?php echo $OsVersion." (".$OSArchitecture.")" ?></span></td>
                                </tr>  
                                <tr>
                                <td><span class="glyphicon glyphicon-info-sign"></span> Machine</td>
                                <td><span><?php echo $Manufacturer." - ".$CsModel ?></span></td>
                                </tr>
                                <tr>
                                <td><span class="glyphicon glyphicon-wrench"></span> Processeurs</td>
                                <td><span><?php echo $CpuName ?></span></td>
                                </tr>
                                <tr>
                                <td><span class="glyphicon glyphicon-tasks"></span> Mémoire Ram</td>
                                <td><span><?php echo $TotalVisibleMemorySize ?></span></td>
                                </tr>
                                <tr>
                                <td><span class="glyphicon glyphicon-tasks"></span> Processus</td>
                                <td><span><?php echo $total_process  ?></span></td>
                                </tr>
                                <tr>
                                <td><span class="glyphicon glyphicon-time"></span> Durée d'activité</td>
                                <td><span><?php echo $uptime ?></span></td>
                                </tr>
                                <tr>
                                <td><span class="glyphicon glyphicon-off"></span> Dernier démarrage</td>
                                <td><span><?php echo $lastboot ?></span></td>
                                </tr>
                                
                                <tr>
                                <td><span class="glyphicon glyphicon-globe"></span> Langue du système</td>
                                <td><span><?php echo "French - France(".$OSLanguage.")" ;?></span></td>
                                </tr>
                                <tr>
                                <td><span class="glyphicon glyphicon-barcode"></span> Codage de la page</td>
                                <td><span><?php echo "windows-".$CodeSet; ?></span></td>
                                </tr>
					
				   
				</table>
          	</div>
                        <div class="col-md-4">
                            <span id="templive"></span>
                            <span id="cpulive"></span>                   
                            <span id="ramlive"></span>
                <?php 
                foreach($disk as $a)
        {
          $DiskName = $a->Name;
	  $DiskSize=round(($a->Size/1073741824),2). ' Go' ;
	  $DiskFree=round(($a->FreeSpace/1073741824),2). ' Go' ;
	  $FileSystem=$a->FileSystem ;
	 // $data['DriveType']=$a->DriveType ;  
          $DiskOccupe=$DiskSize-$DiskFree ;
          $DiskUsed=($DiskOccupe/$DiskSize)*100 ; 
        
        ?>
      <span><?php echo $DiskName." ".$DiskSize." NTFS" ?> </span><div class="progress"><div class="progress-bar progress-bar-striped" role="progressbar" style="<?php echo 'width: '.$DiskUsed.'%' ?>" aria-valuenow="<?php echo $DiskOccupe ?>" aria-valuemin="0" aria-valuemax="100"></div></div>              
               
                <?php }; ?>
                        </div>
                        </div>
                    </div>
        </div>
  	</div>
</div>
