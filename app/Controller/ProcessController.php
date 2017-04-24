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
            $process_pro_id = (isset($_POST['pro_id']) ? trim($_POST['pro_id']) : '');
            
            //debug($_POST);
            
            $data = array(               
                'pro_name' => $pro_name,              
            );
                                                 
            $model6 = new \Model\ProcessModel();
            $allProcess = $model6->findAll();
            //debug($data);
            //$model = new \Model\ProcessModel();  
            //$addProcess = $model->insert($data);
            
            $model7 = new \Model\ProcessModel();
            $allTasks = $model7->getTasksFromProcess($process_pro_id);
            
            
            
		$this->show('process/process',array(
                    'allProcess' => $allProcess,
                    'allTasks' => $allTasks,
                    'process_pro_id' => $process_pro_id,
                    'pro_name' => $pro_name
                ));
                
	}

}