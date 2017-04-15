<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\WorkersModel;

class WorkersController extends Controller
{

	/**
	 * Ajout d'un ouvrier
	 */    
	public function Worker(){
            
            //debug($_POST);
            
            $wor_lastname = (isset($_POST['wor_lastname']) ? trim($_POST['wor_lastname']) : trim($_POST['wor_lastname_mod']));
            $wor_firstname = (isset($_POST['wor_firstname']) ? trim($_POST['wor_firstname']) : trim($_POST['wor_firstname_mod']));
            $wor_quality = (isset($_POST['wor_quality']) ? trim($_POST['wor_quality']) : trim($_POST['wor_quality_mod']));
            $wor_remark = (isset($_POST['wor_remark']) ? trim($_POST['wor_remark']) : trim($_POST['wor_remark_mod']));       
            
            //debug($wor_lastname);
            
            $data = array(               
                'wor_lastname' => $wor_lastname,
                'wor_firstname' => $wor_firstname,
                'wor_quality' => $wor_quality,
                'wor_remark' => $wor_remark,
            );
                                                 
            
            //debug($data);
            $model = new \Model\WorkersModel();  
            $addWorker = $model->insert($data);
            //$modWorker = $model->update($data);
            $allWorker = $model->findAll();
                 
            debug($allWorker);
            //debug($addWorker);
            
            //$selectWorker = array();
            //foreach ($allWorker as $currentWorker){           
            //        $selectWorker[] = $currentWorker;               
            //}
            
            //debug($currentWorker);
            //debug($selectWorker);
            
            $this->show('worker/worker',array(
                'allWorker' => $allWorker
            ));
	}
        
        /**
	 * Mod d'un ouvrier
	 */  
        /*public function ModWorker(){
            
            debug($_POST);
            
            $wor_lastname = (isset($_POST['wor_lastname_mod']) ? trim($_POST['wor_lastname_mod']) : '');
            $wor_firstname = (isset($_POST['wor_firstname_mod']) ? trim($_POST['wor_firstname_mod']) : '');
            $wor_quality = (isset($_POST['wor_quality_mod']) ? trim($_POST['wor_quality_mod']) : '');
            $wor_remark = (isset($_POST['wor_remark_mod']) ? trim($_POST['wor_remark_mod']) : '');       
            
            //debug($wor_lastname);
            
            $data = array(               
                'wor_lastname_mod' => $wor_lastname,
                'wor_firstname_mod' => $wor_firstname,
                'wor_quality_mod' => $wor_quality,
                'wor_remark_mod' => $wor_remark,
            );
                                                 
            
            //debug($data);
            $model = new \Model\WorkersModel();       
            $worker = $model->update($data);
            //debug($worker);
            
            $this->show('worker/worker');
	}*/

}
//isset($_POST['wor_lastname']) ? intval(trim($_POST['wor_lastname'])) : 0
//isset($_POST['wor_firstname']) ? intval(trim($_POST['wor_firstname'])) : 0
//isset($_POST['wor_quality']) ? intval(trim($_POST['wor_quality'])) : 0
//isset($_POST['wor_text']) ? trim($_POST['wor_text']) : ''
