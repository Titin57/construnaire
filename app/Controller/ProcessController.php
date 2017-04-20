<?php

namespace Controller;

use \W\Controller\Controller;

class ProcessController extends Controller
{

	/**
	 * Page d'ajout d'une nouvelle tâche
	 */
	public function process(){
            
            //debug($_POST['tas_time']);
            
            $pro_name = (isset($_POST['pro_name']) ? trim($_POST['pro_name']) : '');            
            
            $data = array(               
                'pro_name' => $pro_name,              
            );
                                                 
            
            debug($data);
            $model = new \Model\ProcessModel();  
            $addProcess = $model->insert($data); 
            
		$this->show('process/process');
	}

}