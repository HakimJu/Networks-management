<?php

 
class Moniteur extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Moniteur_model');
    } 

    /*
     * Listing of agents
     */
    function index()
    {  
	    if($this->session->userdata('logged_in'))
                {
                  $session_data = $this->session->userdata('logged_in');
                  $data['nom'] = $session_data['nom'];
                  $data['prenom'] = $session_data['prenom'];
                  $data['email'] = $session_data['email'];
				  $data['role'] = $session_data['role'];
                  
               
        $os = $this->Moniteur_model->os();
        $cs = $this->Moniteur_model->cs();
        $cpu = $this->Moniteur_model->cpu();
        $process = $this->Moniteur_model->process();
        
        
        foreach($os as $a)
        {
          $data['CodeSet'] = $a->CodeSet;
	  $data['OSLanguage']=$a->OSLanguage;
	  $data['OsVersion']=$a->Version;
	  $data['OsCaption']=$a->Caption ;
	  $data['OSArchitecture']=$a->OSArchitecture ;  
         $data['TotalVisibleMemorySize']=round(($a->TotalVisibleMemorySize*1024/1073741824),2). ' Go' ;
	/*   $data['FreePhysicalMemory']=round(($a->FreePhysicalMemory*1024/1073741824),2). ' Go' ;
          
          $data['UsedPhysicalMemory']=$data['TotalVisibleMemorySize']-$data['FreePhysicalMemory'] ;
          $data['RamUsed']=($data['UsedPhysicalMemory']/$data['TotalVisibleMemorySize'])*100 ;  */
        }
        $data['lastboot']=$this->Moniteur_model->lastboot();
        $data['uptime']=$this->Moniteur_model->uptime();
        
        foreach($cs as $a)
        {
          $data['Manufacturer'] = $a->Manufacturer;
	  $data['CsName']=$a->Name;
	  $data['CsModel']=$a->Model;
          $data['Hote']=gethostbyname($data['CsName']);
	  
            
        }
        foreach($cpu as $a)
        {
         // $data['LoadPercentage'] = $a->LoadPercentage;
	  $data['CpuName']=$a->Name;
	  
        }
        $users = 0;
        $processus=0;
        
        foreach($process as $a)
        {  
            
           if (strtoupper($a->Caption) == strtoupper('explorer.exe')) 
                         {
                    $users++;
                         }
           if (strtoupper($a->Caption)) 
                         {
                    $processus++;
                         }    
          $data['users'] = $users;
          $data['total_process']=$processus;
          
        }
        
        $data['disk']=$this->Moniteur_model->disk();
        
        

        $data['_view'] = 'moniteur/index';
        $this->load->view('layouts/main',$data);
		 }
                else
                {
                  //If no session, redirect to login page
                  redirect(site_url('login'), 'refresh');
                }
    }

   
    Function livecpu()
   {
      $cpu = $this->Moniteur_model->cpu(); 
      foreach ($cpu as $a)
      {
          $cpuload=$a->LoadPercentage;
          
      }
      if ($cpuload <25)
                         {
                        $class_cpu="progress-bar progress-bar-success";
                         }   
                        elseif ($cpuload <50)
                        {
                        $class_cpu="progress-bar progress-bar-info";    
                        }elseif($cpuload <75)
                        {
                        $class_cpu="progress-bar progress-bar-warning";    
                        } else {
                        $class_cpu="progress-bar progress-bar-danger";    
						$this->db->insert('logs',array('ip' => '127.0.0.1','info' =>" Surcharge CPU !"));
                        }
                        
       $class_cpu='CPU '.$cpuload.' %<div class="progress"><div class="'.$class_cpu.'" role="progressbar" style="width: '.$cpuload.'%" aria-valuenow="'.$cpuload.'" aria-valuemin="0" aria-valuemax="100"></div></div>'   ;              
        echo $class_cpu  ;                
       
   }
   
   Function serverlivecpu()
   {
       $ip=$_POST['ip'];
       $q=$this->Moniteur_model->get_agent_ip($ip);
         
         foreach ($q as $a)
         {
             $utilisateur=$q['utilisateur'];
             $mdp=$q['mdp'];
             
         $query=$this->Moniteur_model->oslive($ip,$utilisateur,$mdp);
           
         foreach ($query['cpulive'] as $a)
      {
          $cpuload=$a->LoadPercentage;
          
      }
      if ($cpuload <25)
                         {
                        $class_cpu="progress-bar progress-bar-success";
                         }   
                        elseif ($cpuload <50)
                        {
                        $class_cpu="progress-bar progress-bar-info";    
                        }elseif($cpuload <75)
                        {
                        $class_cpu="progress-bar progress-bar-warning";  
						 			   
                        } else {
                        $class_cpu="progress-bar progress-bar-danger"; 
                           $this->db->insert('logs',array('ip' => $ip,'info' =>" Surcharge CPU  !"));						
                        }
                        
    
         }
      
      
       
       $class_cpu='CPU '.$cpuload.' %<div class="progress"><div class="'.$class_cpu.'" role="progressbar" style="width: '.$cpuload.'%" aria-valuenow="'.$cpuload.'" aria-valuemin="0" aria-valuemax="100"></div></div>'   ;              
      
       echo $class_cpu;                 
   }
   
    Function serverliveram()
   {
       $ip=$_POST['ip'];
       $q=$this->Moniteur_model->get_agent_ip($ip);
         
         foreach ($q as $a)
         {
             $utilisateur=$q['utilisateur'];
             $mdp=$q['mdp'];
             
             
         $query=$this->Moniteur_model->oslive($ip,$utilisateur,$mdp);
         
     
       foreach ($query['oslive'] as $a)
      {
          
          $TotalMemory=round(($a->TotalVisibleMemorySize*1024/1073741824),2). ' Go' ;
	  $FreeMemory=round(($a->FreePhysicalMemory*1024/1073741824),2). ' Go' ;
          
          $UsedMemory=$TotalMemory-$FreeMemory ;
          $Memory=($UsedMemory/$TotalMemory)*100 ;  
      }
      if ($Memory <25)
                         {
                        $class_memory="progress-bar progress-bar-success";
                         }   
                        elseif ($Memory <50)
                        {
                        $class_memory="progress-bar progress-bar-info";    
                        }elseif($Memory <75)
                        {
                        $class_memory="progress-bar progress-bar-warning";    
                        } else {
                        $class_memory="progress-bar progress-bar-danger";   
                              $this->db->insert('logs',array('ip' => $ip,'info' =>" Surcharge RAM !"));							
                        }
       }                   
                        
      $class_memory='Mémoire Libre '.$FreeMemory.'<div class="progress"><div class="'.$class_memory.'" role="progressbar" style="width: '.$Memory.'%" aria-valuenow="'.$UsedMemory.'" aria-valuemin="0" aria-valuemax="100"></div></div>'   ;              
       echo $class_memory; 
                     
   }
   
    Function serverlivetemp()
   {
        $ip=$_POST['ip'];
       $q=$this->Moniteur_model->get_agent_ip($ip);
         
         foreach ($q as $a)
         {
             $utilisateur=$q['utilisateur'];
             $mdp=$q['mdp'];
             
         }
         $temp = $this->Moniteur_model->templive($ip,$utilisateur,$mdp);
      
      foreach ($temp as $a)
      {
          $temp=$a->CurrentTemperature;
	  $temp =( $temp -2732 )/10 ;
         
      }
      if ($temp <25)
                         {
                        $class_temp="progress-bar progress-bar-success";
                         }   
                        elseif ($temp <50)
                        {
                        $class_temp="progress-bar progress-bar-info";    
                        }elseif($temp <65)
                        {
                        $class_temp="progress-bar progress-bar-warning";    
                        } else {
                        $class_temp="progress-bar progress-bar-danger";    
						 $this->db->insert('logs',array('ip' => $ip,'info' =>" Temperature élevée !"));	
                        }
                        
       $class_temp='Température '.$temp.' Celsius<div class="progress"><div class="'.$class_temp.'" role="progressbar" style="width: '.$temp.'%" aria-valuenow="'.$temp.'" aria-valuemin="0" aria-valuemax="100"></div></div>'   ;              
        echo $class_temp ;                
       
   }
   
   
    Function liveram()
   {
      $ram = $this->Moniteur_model->os(); 
      foreach ($ram as $a)
      {
          
          $TotalMemory=round(($a->TotalVisibleMemorySize*1024/1073741824),2). ' Go' ;
	  $FreeMemory=round(($a->FreePhysicalMemory*1024/1073741824),2). ' Go' ;
          
          $UsedMemory=$TotalMemory-$FreeMemory ;
          $Memory=($UsedMemory/$TotalMemory)*100 ;  
      }
      if ($Memory <25)
                         {
                        $class_memory="progress-bar progress-bar-success";
                         }   
                        elseif ($Memory <50)
                        {
                        $class_memory="progress-bar progress-bar-info";    
                        }elseif($Memory <75)
                        {
                        $class_memory="progress-bar progress-bar-warning";    
                        } else {
                        $class_memory="progress-bar progress-bar-danger";   
 $this->db->insert('logs',array('ip' => '127.0.0.1','info' =>" Surcharge RAM !"));						
                        }
                        
       $class_memory='Mémoire Libre '.$FreeMemory.'<div class="progress"><div class="'.$class_memory.'" role="progressbar" style="width: '.$Memory.'%" aria-valuenow="'.$UsedMemory.'" aria-valuemin="0" aria-valuemax="100"></div></div>'   ;              
        echo $class_memory ;                
       
   }
   
    Function livetemp()
   {
      $temp = $this->Moniteur_model->temp(); 
      foreach ($temp as $a)
      {
          $temp=$a->CurrentTemperature;
	  $temp =( $temp -2732 )/10 ;
         
      }
      if ($temp <25)
                         {
                        $class_temp="progress-bar progress-bar-success";
                         }   
                        elseif ($temp <50)
                        {
                        $class_temp="progress-bar progress-bar-info";    
                        }elseif($temp <65)
                        {
                        $class_temp="progress-bar progress-bar-warning";    
                        } else {
                        $class_temp="progress-bar progress-bar-danger";   
$this->db->insert('logs',array('ip' => '127.0.0.1','info' =>" Temperature élevée !"));							
                        }
                        
       $class_temp='Température '.$temp.' Celsius<div class="progress"><div class="'.$class_temp.'" role="progressbar" style="width: '.$temp.'%" aria-valuenow="'.$temp.'" aria-valuemin="0" aria-valuemax="100"></div></div>'   ;              
        echo $class_temp;                
       
   }
   
   function check()
   {
	    if($this->session->userdata('logged_in'))
                {
                  $session_data = $this->session->userdata('logged_in');
                  $data['nom'] = $session_data['nom'];
                  $data['prenom'] = $session_data['prenom'];
                  $data['email'] = $session_data['email'];
				  $data['role'] = $session_data['role'];
       
        $data['agents']= $this->Moniteur_model->get_all_agents() ;
          
        $data['_view'] = 'moniteur/check';
        $this->load->view('layouts/main',$data);
				}
          else
                {
                  //If no session, redirect to login page
                  redirect(site_url('login'), 'refresh');
                }
       
   }
   
   function livecheckagent()
   {
        $agent=$_POST['agent'];
        
        $r= $this->Moniteur_model->get_agent($agent) ;
        
        foreach ($r as $a)
        {
            $ip=$r['ip'];
            $utilisateur=$r['utilisateur'];
            $mdp=$r['mdp'];
            
        }
        
        $query=$this->Moniteur_model->remotepc($ip,$utilisateur,$mdp) ;
        
         foreach($query['os'] as $a)
        {
          $CodeSet = $a->CodeSet;
	  $OSLanguage=$a->OSLanguage;
	  $OsVersion=$a->Version;
	  $OsCaption=$a->Caption ;
	  $OSArchitecture=$a->OSArchitecture ;  
         $TotalVisibleMemorySize=round(($a->TotalVisibleMemorySize*1024/1073741824),2). ' Go' ;
	/*   $data['FreePhysicalMemory']=round(($a->FreePhysicalMemory*1024/1073741824),2). ' Go' ;
          
          $data['UsedPhysicalMemory']=$data['TotalVisibleMemorySize']-$data['FreePhysicalMemory'] ;
          $data['RamUsed']=($data['UsedPhysicalMemory']/$data['TotalVisibleMemorySize'])*100 ;  */
        }
       // $lastboot=$this->Moniteur_model->lastboot();
       // $uptime=$this->Moniteur_model->uptime();
        
        
        foreach($query['cs'] as $a)
        {
          $Manufacturer = $a->Manufacturer;
	  $CsName=$a->Name;
	  $CsModel=$a->Model;
          $Hote=gethostbyname($CsName);
	  
            
        }
        foreach($query['cpu'] as $a)
        {
         // $data['LoadPercentage'] = $a->LoadPercentage;
	  $CpuName=$a->Name;
	  
        }
        $users = 0;
        $processus=0;
        
        foreach($query['Process'] as $a)
        {  
            
           if (strtoupper($a->Caption) == strtoupper('explorer.exe')) 
                         {
                    $users++;
                         }
           if (strtoupper($a->Caption)) 
                         {
                    $processus++;
                         }    
          $users = $users;
          $total_process=$processus;
          
        }
        
       
         echo '<div class="row">
                 <div class="col-md-8">
             
                <table class="table table-striped" id="tableagent">
                                
                                <tr>
                                <td><span class="glyphicon glyphicon-home"></span> Nom d\'hôte canonique</td>
                                <td><span>'.$CsName.'</span></td>
                                </tr>
                                <tr>
                                <td><span class="glyphicon glyphicon-user"></span> Utilisateurs</td>
                                <td><span>'.$users.'</span></td>
                                </tr>
                                <tr>
                                <td><span class="glyphicon glyphicon-screenshot"></span> Adresse IP</td>
                                <td class="hote"><span>'.$Hote.'</span></td>
                                </tr>
                                <tr>
                                <td><span class="glyphicon glyphicon-flag"></span> Distribution</td>
                                <td><span><img src="/resources/img/WinVista.png" />  '.utf8_encode($OsCaption).'</span></td>
                                </tr>
                                <tr>
                                <td><span class="glyphicon glyphicon-cog"></span> Version du noyau</td>
                                <td><span>'.$OsVersion.' ('.$OSArchitecture.')</span></td>
                                </tr>  
                                <tr>
                                <td><span class="glyphicon glyphicon-info-sign"></span> Machine</td>
                                <td><span>'.$Manufacturer.' - '.$CsModel.'</span></td>
                                </tr>
                                <tr>
                                <td><span class="glyphicon glyphicon-wrench"></span> Processeurs</td>
                                <td><span>'.$CpuName.'</span></td>
                                </tr>
                                <tr>
                                <td><span class="glyphicon glyphicon-tasks"></span> Mémoire Ram</td>
                                <td><span>'.$TotalVisibleMemorySize.'</span></td>
                                </tr>
                                <tr>
                                <td><span class="glyphicon glyphicon-tasks"></span> Processus</td>
                                <td><span>'.$total_process.'</span></td>
                                </tr>
                                <tr>
                                <td><span class="glyphicon glyphicon-time"></span> Durée d\'activité</td>
                                <td><span>'.$query['uptime'].'</span></td>
                                </tr>
                                <tr>
                                <td><span class="glyphicon glyphicon-off"></span> Dernier démarrage</td>
                                <td><span>'.$query['lastboot'].'</span></td>
                                </tr>
                                
                                <tr>
                                <td><span class="glyphicon glyphicon-globe"></span> Langue du système</td>
                                <td><span>French - France('.$OSLanguage.')</span></td>
                                </tr>
                                <tr>
                                <td><span class="glyphicon glyphicon-barcode"></span> Codage de la page</td>
                                <td><span>windows-'.$CodeSet.'</span></td>
                                </tr>
					
				   
				</table>
                                </div>
                              <div class="col-md-4">
                            <span id="servertemplive"></span> 
                            <span id="servercpulive"></span>                   
                            <span id="serverramlive"></span>';
         
        
                foreach($query['disk'] as $a)
        {
          $DiskName = $a->Name;
	  $DiskSize=round(($a->Size/1073741824),2). ' Go' ;
	  $DiskFree=round(($a->FreeSpace/1073741824),2). ' Go' ;
	  $FileSystem=$a->FileSystem ;
	 // $data['DriveType']=$a->DriveType ;  
          $DiskOccupe=$DiskSize-$DiskFree ;
          $DiskUsed=($DiskOccupe/$DiskSize)*100 ; 
        
        echo '<span>'.$DiskName.'  '.$DiskSize.'  '.$FileSystem.'</span><div class="progress"><div class="progress-bar progress-bar-striped" role="progressbar" style="width: '.$DiskUsed.'%" aria-valuenow="'.$DiskOccupe.'" aria-valuemin="0" aria-valuemax="100"></div></div>';
        
        };
        
        echo '</div></div>';
   }
   
     function logout()
              {
                $this->session->unset_userdata('logged_in');
                session_destroy();
                redirect(site_url('login'), 'refresh');
              }
}
