<?php

namespace Controller;

use \W\Controller\Controller;
use Model\OutputModel;

class OutputController extends Controller {

    public function outputText() {


        $model = new \Model\outputModel();
        
        // output ID still hardcoded
        $allOutputFromProcess = $model->getOutputFromProcess(10);
          //debug($allOutputFromProcess);
        $this->show('output/outputText', array(
            'allOutputFromProcess' => $allOutputFromProcess
        ));

/*
  */
    }

    public function output() {
        $this->show('output/output');
    }

}
