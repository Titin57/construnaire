<?php

namespace Controller;

use \W\Controller\Controller;

class TasksController extends Controller
{

	/**
	 * Page d'ajout d'une nouvelle tâche
	 */
	public function addtask(){
            
            //debug($_POST['tas_time']);
            
            $tas_name = (isset($_POST['tas_name']) ? trim($_POST['tas_name']) : '');
            $tas_date = (isset($_POST['tas_date']) ? trim($_POST['tas_date']) : '');
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
            //debug($tas_start);
            
            $data = array(               
                'tas_name' => $tas_name,
                'tas_date' => $tas_date,
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
            $model = new \Model\TasksModel();  
            $addTask = $model->insert($data); 
            
            $this->show('task/addtask');
	}

}