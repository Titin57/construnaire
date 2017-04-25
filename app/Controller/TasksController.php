<?php

namespace Controller;

use \W\Controller\Controller;

class TasksController extends Controller{

	/**
	 * Page d'ajout d'une nouvelle tâche
	 */
	public function addtask(){
            
            // Remove all comments
            unset($_SESSION['flash']);
            
            $model2 = new \Model\WorkersModel();
            $allWorker = $model2->findAll();
            
            $model3 = new \Model\TeamsModel();
            $allTeam = $model3->findAll();
            
            $model = new \Model\ProcessModel();  
            $allProcess = $model->findAll();
            

            $model = new \Model\ConstructionModel();
            $allConstruc = $model->findAll();
            
            if (!empty($_POST)) {    
                $tas_name = (isset($_POST['tas_name']) ? trim($_POST['tas_name']) : '');
                $tas_date = (isset($_POST['tas_date']) ? trim($_POST['tas_date']) : '');
                $constructions_con_id = (isset($_POST['con_id']) ? trim($_POST['con_id']) : '');
                $process_pro_id = (isset($_POST['pro_name']) ? trim($_POST['pro_name']) : '');
                $tas_typology = (isset($_POST['tas_typology']) ? trim($_POST['tas_typology']) : '');
                $tas_wastage = (isset($_POST['tas_wastage']) ? trim($_POST['tas_wastage']) : '');
                $tas_repeat = (isset($_POST['tas_repeat']) ? trim($_POST['tas_repeat']) : '');       
                $tas_text = (isset($_POST['tas_text']) ? trim($_POST['tas_text']) : '');       
                $tas_remark = (isset($_POST['tas_remark']) ? trim($_POST['tas_remark']) : '');       
                $tas_penality = (isset($_POST['tas_penality']) ? trim($_POST['tas_penality']) : '');       
                $tas_va = (isset($_POST['tas_va']) ? trim($_POST['tas_va']) : '');       
                $tas_nva = (isset($_POST['tas_nva']) ? trim($_POST['tas_nva']) : '');       
                $tas_nvau = (isset($_POST['tas_nvau']) ? trim($_POST['tas_nvau']) : '');       
                $tas_start = (isset($_POST['tas_start']) ? trim($_POST['tas_start']) : '');       
                $tas_stop = (isset($_POST['tas_stop']) ? trim($_POST['tas_stop']) : '');       
                $tas_time = (isset($_POST['tas_time']) ? trim($_POST['tas_time']) : '');       
                $tas_start = date("Y-m-d").' '.$tas_start;   
                $tas_stop = date("Y-m-d").' '.$tas_stop;   
                

                $errorList = array();

                if (strlen($tas_name) < 2) {
                    $errorList[] = 'Tasks name must be at least 2 characters long !';
                }
                    
                if (strlen($tas_wastage) < 2) {
                    $errorList[] = 'wastage must be at least 2 characters long !';
                }

                if (strlen($tas_penality) < 2) {
                    $errorList[] = 'Penality must be at least 2 characters long !';
                }

                if(!empty($errorList)){
                    $this->flash(join('<br>', $errorList), 'danger');           
                }
                else{
                $data = array(               
                    'tas_name' => $tas_name,
                    'tas_date' => $tas_date,
                    'constructions_con_id' => $constructions_con_id,
                    'process_pro_id' => $process_pro_id,
                    'tas_typology' => $tas_typology,
                    'tas_wastage' => $tas_wastage,
                    'tas_repeat' => $tas_repeat,
                    'tas_text' => $tas_text,
                    'tas_remark' => $tas_remark,
                    'tas_penality' => $tas_penality,
                    'tas_va' => $tas_va,
                    'tas_nva' => $tas_nva,
                    'tas_nvau' => $tas_nvau,
                    'tas_start' => $tas_start,
                    'tas_stop' => $tas_stop,
                    'tas_time' => $tas_time,
                    );
                   
                    //debug($data);

                $model2 = new \Model\WorkersModel();
                $allWorker = $model2->findAll();

                $model3 = new \Model\TeamsModel();
                $allTeam = $model3->findAll();

                $model = new \Model\ProcessModel();  
                $allProcess = $model->findAll();


                $model = new \Model\ConstructionModel();
                $allConstruc = $model->findAll();

                $model = new \Model\TasksModel();  
                $addTask = $model->insert($data);

                    if (!empty($addTask)) {
                        $this->flash('Insertion ok !', 'succes');
                        $this->show('task/addtask', array(
                        'allWorker' => $allWorker,
                        'allTeam' => $allTeam,
                        'allProcess' => $allProcess,
                        'allConstruc' => $allConstruc
                        ));
                    }
                    else {
                        $this->flash('Error inserting into the DB !', 'danger');
                    } 
                }
            }
            else{
                $this->show('task/addtask', array(
                'allWorker' => $allWorker,
                'allTeam' => $allTeam,
                'allProcess' => $allProcess,
                'allConstruc' => $allConstruc   
                ));
            }
            
            
            $this->show('task/addtask', array(
                'allWorker' => $allWorker,
                'allTeam' => $allTeam,
                'allProcess' => $allProcess,
                'allConstruc' => $allConstruc
                    
            ));
	}

}