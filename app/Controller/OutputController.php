<?php

namespace Controller;

use \W\Controller\Controller;
use Model\OutputModel;

class OutputController extends Controller {

    public function outputText() {


        $model = new \Model\outputModel();
        
        // output ID still hardcoded
        $allOutput = $model->getOutput(1);
          debug($allOutput);
        $this->show('output/outputText', array(
            'allOutput' => $allOutput
        ));

/*
  */
    }

    public function output() {
        $this->show('output/output');
    }

}
