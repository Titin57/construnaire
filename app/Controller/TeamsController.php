<?php

namespace Controller;

use \W\Controller\Controller;

class TeamsController extends Controller
{

	/**
	 * Page d'ajout d'une nouvelle tâche
	 */
	public function addteam(){
            
            //debug($_POST['tas_time']);
            
            $tea_name = (isset($_POST['tea_name']) ? trim($_POST['tea_name']) : '');
            $tea_text = (isset($_POST['tea_text']) ? trim($_POST['tea_text']) : '');
                

            
            $data = array(               
                'tea_name' => $tea_name,
                'tea_text' => $tea_text,
   
            );
                                                 
            
            debug($data);
            $model = new \Model\TeamsModel();  
            $addTeam = $model->insert($data); 
            
            $this->show('team/addteam');
	}

}