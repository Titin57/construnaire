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
          
} // end of class