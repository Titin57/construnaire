<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\WorkersModel;

class WorkersController extends Controller{

	/**
	 * Ajout d'un ouvrier
	 */    
	public function AddWorker(){
            
            // Remove all comments
            unset($_SESSION['flash']);
            //debug($_POST);
            
            if (!empty($_POST)) {
                $wor_lastname = (isset($_POST['wor_lastname']) ? trim($_POST['wor_lastname']) : '');
                $wor_firstname = (isset($_POST['wor_firstname']) ? trim($_POST['wor_firstname']) : '');
                $wor_quality = (isset($_POST['wor_quality']) ? trim($_POST['wor_quality']) : '');
                $wor_remark = (isset($_POST['wor_remark']) ? trim($_POST['wor_remark']) : '');       
                
                $errorList = array();
                
                if (strlen($wor_lastname) < 2) {
                $errorList[] = 'Worker lastname must be at least 2 characters long !';
                }
                // city name
                if (strlen($wor_firstname) < 2) {
                    $errorList[] = 'Worker firstname must be at least 2 characters long !';
                }

                // type name
                if (strlen($wor_quality) < 5) {
                    $errorList[] = 'Worker Quality must be at least 5 characters long !';
                }
                
                //debug($errorList);
                
                if(!empty($errorList)){
                    $this->flash(join('<br>', $errorList), 'danger');           
                }
                
                else {

                    $data = array(               
                        'wor_lastname' => $wor_lastname,
                        'wor_firstname' => $wor_firstname,
                        'wor_quality' => $wor_quality,
                        'wor_remark' => $wor_remark,
                    );


                    //debug($data);
                    $model = new \Model\WorkersModel();
                    $allWorker = $model->findAll();
                    //debug($allWorker);
                    $addWorker = $model->insert($data); 
                    //debug($addWorker);

                    
                    
                    if (!empty($addWorker)) {

                    // Redirection to construction list page
                    //$this->redirectToRoute('construction_listconstruction');
                        $this->flash('Insertion ok !', 'succes');
                        $this->show('worker/addworker');
                    }
                    else {
                        $this->flash('Error inserting into the DB !', 'danger');
                    }
                    
                }
                //else {
                    //$this->flash(join('<br>', $errorList), 'danger');           
                //}
            }
            else {
                $this->show('worker/addworker');
            }
                    $this->show('worker/addworker');
                    //$this->show('team/addteam', array(
                    //    'allWorker' => $allWorker,
                    //));
        }
        
        public function ModWorker() {
            $wor_id = (isset($_POST['wor_id']) ? trim($_POST['wor_id']) : '');
            $wor_lastname = (isset($_POST['wor_lastname_mod']) ? trim($_POST['wor_lastname_mod']) : '');
            $wor_firstname = (isset($_POST['wor_firstname_mod']) ? trim($_POST['wor_firstname_mod']) : '');
            $wor_quality = (isset($_POST['wor_quality_mod']) ? trim($_POST['wor_quality_mod']) : '');
            $wor_remark = (isset($_POST['wor_remark_mod']) ? trim($_POST['wor_remark_mod']) : '');       
            
            //debug($wor_lastname);
            
            $data = array(
                'wor_id' => $wor_id,
                'wor_lastname' => $wor_lastname,
                'wor_firstname' => $wor_firstname,
                'wor_quality' => $wor_quality,
                'wor_remark' => $wor_remark,
            );
                                                 
            
            //debug($data);
            $model = new \Model\WorkersModel();  
            $addWorker = $model->update($data, $wor_id); 
            $allWorker = $model->findAll();
            $selectworker = $model->find($wor_id);
            
            debug($wor_id);
            debug($selectworker);
            
            $ListWorker = array();
            
            /*foreach ($allWorker as $currentWorker) {
                $ListWorker[] = $currentWorker['wor_lastname'];
            }*/
            
            //debug($ListWorker);
            
            $this->show('worker/modworker',array(
                'allWorker' => $allWorker
            ));
        }
        
        public function AllWorker () {
            
            $model = new \Model\WorkersModel();  
            
            
            foreach ($allWorker as $currentWorker) {
                
            }
            debug($allWorker);
            
            $this->show('worker/allworker',array(
                'allWorker' => $allWorker
            ));
        }
}

