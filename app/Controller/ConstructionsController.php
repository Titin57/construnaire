<?php


namespace Controller;

use \W\Controller\Controller;
use \Model\ConstructionsModel;


class ConstructionsController extends Controller {

    public function allConstruction() {
        // Clear all messages
        unset($_SESSION['flash']);
        
        // Access restriction (uncomment line $this....)
        // $this->allowTo('user');
        }
        
        // I recover all data from construction 
        $allConstruction = $model->getAllConstructions($con_id);
        //debug($allConstructions); 
        
        $this->show('default/home');
    } // end of addconstruction function|method
    
    
} // end of class