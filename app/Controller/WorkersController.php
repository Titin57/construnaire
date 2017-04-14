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
            
            //debug($_POST);
            
            $wor_lastname = (isset($_POST['wor_lastname']) ? trim($_POST['wor_lastname']) : '');
            $wor_firstname = (isset($_POST['wor_firstname']) ? trim($_POST['wor_firstname']) : '');
            $wor_quality = (isset($_POST['wor_quality']) ? trim($_POST['wor_quality']) : '');
            $wor_remark = (isset($_POST['wor_remark']) ? trim($_POST['wor_remark']) : '');       
            
            //debug($wor_lastname);
            
            $data = array(               
                'wor_lastname' => $wor_lastname,
                'wor_firstname' => $wor_firstname,
                'wor_quality' => $wor_quality,
                'wor_remark' => $wor_remark,
            );
                                                 
            
            //debug($data);
            $model = new \Model\WorkersModel();       
            $worker = $model->insert($data);
            //debug($worker);
            
            $this->show('worker/addWorker');
	}
        

}
//isset($_POST['wor_lastname']) ? intval(trim($_POST['wor_lastname'])) : 0
//isset($_POST['wor_firstname']) ? intval(trim($_POST['wor_firstname'])) : 0
//isset($_POST['wor_quality']) ? intval(trim($_POST['wor_quality'])) : 0
//isset($_POST['wor_text']) ? trim($_POST['wor_text']) : ''
