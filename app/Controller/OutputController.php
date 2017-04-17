<?php

namespace Controller;

use \W\Controller\Controller;
use Model\OutputModel;

class OutputController extends Controller {

    public function outputText() {

        // all constructions 4 use with <select>        
        $constructionModel = new \Model\ConstructionsModel();
        $allConstructions = $constructionModel->findAll();
        //debug($allConstructions);
        
        // all process 4 use with <select>        
        $processModel = new \Model\ProcessModel();
        $allProcess = $processModel->findAll();
        //debug($allProcess);


        $model = new \Model\outputModel();
        
        // output ID still hardcoded
        $allOutputFromProcess = $model->getOutputFromProcess(10);
        //debug($allOutputFromProcess);
        
        // inserted here for testing purposes //????
        $allOutputFromConstructions = $model->getOutputFromConstructions(10);
        //debug($allOutputFromConstructions);
        
        
        $this->show('output/outputText', array(
            'allProcess' => $allProcess,
            'allConstructions' => $allConstructions,
            'allOutputFromProcess' => $allOutputFromProcess,
            // inserted here for testing purposes //????
            'allOutputFromConstructions' => $allOutputFromConstructions
        ));

/*
  */
    }

    public function output() {
        $this->show('output/output');
    }

}
