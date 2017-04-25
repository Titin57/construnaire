<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\TeamModel;

class TeamsController extends Controller{

	/**
	 * Page d'ajout d'une nouvelle équipe
	 */
    public function addteam(){
            
            // Remove all comments
            unset($_SESSION['flash']);
            
            $model = new \Model\WorkersModel();
            $allWorker = $model->findAll();
            
            //debug($_POST['tea_id']);
        if (!empty($_POST)) {    
            $tea_id = (isset($_POST['tea_id']) ? trim($_POST['tea_id']) : '');
            $tea_name = (isset($_POST['tea_name']) ? trim($_POST['tea_name']) : '');
            $tea_text = (isset($_POST['tea_text']) ? trim($_POST['tea_text']) : '');
            $tea_worker1 = (isset($_POST['wor_id1']) ? ($_POST['wor_id1']) : '');
            $tea_worker2 = (isset($_POST['wor_id2']) ? ($_POST['wor_id2']) : '');
            $tea_worker3 = (isset($_POST['wor_id3']) ? ($_POST['wor_id3']) : '');
            $tea_worker4 = (isset($_POST['wor_id4']) ? ($_POST['wor_id4']) : '');
            
            
            
            $errorList = array();
                
            if (strlen($tea_name) < 3) {
                $errorList[] = 'Team name must be at least 3 characters long !';
            }
            if (strlen($tea_text) < 3) {
                $errorList[] = 'Team fonction must be at least 3 characters long !';
            }
            if (strlen($tea_worker1) < 2) {
                $errorList[] = 'Worker 1 lastname must be at least 2 characters long !';
            }
            if (strlen($tea_worker2) < 2) {
                $errorList[] = 'Worker 2 lastname must be at least 2 characters long !';
            }
            if (strlen($tea_worker3) < 2) {
                $errorList[] = 'Worker 3 lastname must be at least 2 characters long !';
            }
            if (strlen($tea_worker4) < 2) {
                $errorList[] = 'Worker 4 lastname must be at least 2 characters long !';
            }
                
            //debug($errorList);
                
            if(!empty($errorList)){
                $this->flash(join('<br>', $errorList), 'danger');           
            }
            else {

                $data = array(
                    'tea_id' => $tea_id,
                    'tea_name' => $tea_name,
                    'tea_text' => $tea_text,  
                );
            
            $teamList = array();
            
            $model = new \Model\TeamsModel();
            $teamList = $model->findAll();
            $addTeam = $model->insert($data); 
            
            $model = new \Model\WorkersModel();
            $allWorker = $model->findAll();
            
            $model2 = new \Model\TeamsWorkersModel();
            $teamId = $model2->getId($tea_name);
               
            $data2 = array(
                'teams_tea_id' => $teamId['0']['tea_id'],
                'workers_wor_id' => $tea_worker1
            );

            $addTeamsWorker = $model2->insert($data2);
          
            $model3 = new \Model\TeamsWorkersModel();
            $teamId = $model3->getId($tea_name);
            
            $data3 = array(
                'teams_tea_id' => $teamId['0']['tea_id'],
                'workers_wor_id' => $tea_worker2
            );

            $addTeamsWorker = $model3->insert($data3);

            $model4 = new \Model\TeamsWorkersModel();
            $teamId = $model4->getId($tea_name);
            
            $data4 = array(
                'teams_tea_id' => $teamId['0']['tea_id'],
                'workers_wor_id' => $tea_worker3
            );
           
            $addTeamsWorker = $model4->insert($data4);
            
            $model5 = new \Model\TeamsWorkersModel();
            $teamId = $model5->getId($tea_name);
             
            $data5 = array(
                'teams_tea_id' => $teamId['0']['tea_id'],
                'workers_wor_id' => $tea_worker4
            );
            
            $addTeamsWorker = $model5->insert($data5);
            
                if (!empty($addTeamsWorker)) {

                    $this->flash('Insertion ok !', 'succes');
                    $this->show('team/addteam', array(
                    'allWorker' => $allWorker,   
                    ));
                }
                else {
                    $this->flash('Error inserting into the DB !', 'danger');
                } 
            }
        }
            else{
                $this->show('team/addteam', array(
                'allWorker' => $allWorker,   
                ));
            }
            $this->show('team/addteam', array(
                'allWorker' => $allWorker,   
            ));
    }

}