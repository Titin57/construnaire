<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\WorkersModel;

class WorkersController extends Controller
{

	/**
	 * Page d'ajout d'un ouvrier
	 */
	public function addWorker(){
            $data = array(               
                'wor_lastname' => $wor_lastname,
                'wor_firstname' => $wor_firstname = 'Corleone',
                'wor_quality' => $wor_quality = 'mafia',
                'wor_text' => $wor_text = 'Le parain',
            );
            
            $wor_lastname = isset($_POST['wor_lastname']) ? intval(trim($_POST['wor_lastname'])) : 0;
            debug($wor_lastname);
            
            
            
            debug($data);
            $model = new \Model\WorkersModel();       
            $worker = $model->insert($data);
            debug($worker);
            
            $this->show('worker/addWorker');
	}
        

}
//isset($_POST['wor_lastname']) ? intval(trim($_POST['wor_lastname'])) : 0
//isset($_POST['wor_firstname']) ? intval(trim($_POST['wor_firstname'])) : 0
//isset($_POST['wor_quality']) ? intval(trim($_POST['wor_quality'])) : 0
//isset($_POST['wor_text']) ? trim($_POST['wor_text']) : ''
