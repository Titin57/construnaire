<?php

namespace Controller;

use \W\Controller\Controller;

class TeamsController extends Controller
{

	/**
	 * Page d'ajout d'une nouvelle tâche
	 */
	public function addteam(){
            
            //debug($_POST['tea_id']);
            
            $tea_id = (isset($_POST['tea_id']) ? trim($_POST['tea_id']) : '');
            $tea_name = (isset($_POST['tea_name']) ? trim($_POST['tea_name']) : '');
            $tea_text = (isset($_POST['tea_text']) ? trim($_POST['tea_text']) : '');
            //$tea_worker1 = (isset($_POST['$tea_worker1']) ? trim($_POST['$tea_worker1']) : '');
            //$tea_worker2 = (isset($_POST['$tea_worker2']) ? trim($_POST['$tea_worker2']) : '');
            //$tea_worker3 = (isset($_POST['$tea_worker3']) ? trim($_POST['$tea_worker3']) : '');
            //$tea_worker4 = (isset($_POST['$tea_worker4']) ? trim($_POST['$tea_worker4']) : '');
                

            
            $data = array(
                'tea_id' => $tea_id,
                'tea_name' => $tea_name,
                'tea_text' => $tea_text,
                //'tea_worker1' => $tea_worker1,
                //'tea_worker2' => $tea_worker2,
                //'tea_worker3' => $tea_worker3,
                //'tea_worker4' => $tea_worker4,
   
            );
                                                 
            
            //debug($data);
            $teamList = array();
            
            
            $model = new \Model\TeamsModel(); 
            $teamList = $model->findAll();
            $addTeam = $model->insert($data); 
            
            $model = new \Model\WorkersModel();
            $allWorker = $model->findAll();
            
            //debug($teamList);
            
            $this->show('team/addteam', array(
                'allWorker' => $allWorker,
                
            ));
	}

}