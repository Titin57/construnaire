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
            $tea_worker1 = (isset($_POST['wor_id1']) ? ($_POST['wor_id1']) : '');
            $tea_worker2 = (isset($_POST['wor_id2']) ? ($_POST['wor_id2']) : '');
            $tea_worker3 = (isset($_POST['wor_id3']) ? ($_POST['wor_id3']) : '');
            $tea_worker4 = (isset($_POST['wor_id4']) ? ($_POST['wor_id4']) : '');
                
            //debug($tea_name);
            //debug($tea_worker1);
            //debug($_POST);
            //debug($tea_name);
            //debug($_POST['wor_id1']);
            
            $data = array(
                'tea_id' => $tea_id,
                'tea_name' => $tea_name,
                'tea_text' => $tea_text,  
            );
            
            //$teamWorkerId = getId($tea_name);
            
           
            
            
            $teamList = array();
            
            
            
            //debug($addTeamsWorker);
            
            $model = new \Model\TeamsModel();
            //debug($model);
            $teamList = $model->findAll();
            $addTeam = $model->insert($data); 
            
            $model = new \Model\WorkersModel();
            $allWorker = $model->findAll();
            
            
            $model2 = new \Model\TeamsWorkersModel();
            $teamId = $model2->getId($tea_name);
            
            debug($teamId['0']['tea_id']);
            
            $data2 = array(
                'teams_tea_id' => $teamId['0']['tea_id'],
                'workers_wor_id' => $tea_worker1
            );
           
            debug($data2);
            
            
            $addTeamsWorker = $model2->insert($data2);
            
            
            //debug($teamList);
                        
            $model3 = new \Model\TeamsWorkersModel();
            $teamId = $model3->getId($tea_name);
            
            debug($teamId['0']['tea_id']);
            
            $data3 = array(
                'teams_tea_id' => $teamId['0']['tea_id'],
                'workers_wor_id' => $tea_worker2
            );
           
            debug($data2);
            
            
            $addTeamsWorker = $model3->insert($data3);
            
            //debug($teamList);
            
            $model4 = new \Model\TeamsWorkersModel();
            $teamId = $model4->getId($tea_name);
            
            debug($teamId['0']['tea_id']);
            
            $data4 = array(
                'teams_tea_id' => $teamId['0']['tea_id'],
                'workers_wor_id' => $tea_worker3
            );
           
            debug($data4);
            
            
            $addTeamsWorker = $model4->insert($data4);
            
            //debug($teamList);
            
            $model5 = new \Model\TeamsWorkersModel();
            $teamId = $model5->getId($tea_name);
            
            debug($teamId['0']['tea_id']);
            
            $data5 = array(
                'teams_tea_id' => $teamId['0']['tea_id'],
                'workers_wor_id' => $tea_worker4
            );
           
            debug($data5);
            
            
            $addTeamsWorker = $model5->insert($data5);
  
            $this->show('team/addteam', array(
                'allWorker' => $allWorker,
                
            ));
	}

}