<?php

namespace Controller;

use \W\Controller\Controller;
use Model\OutputModel;

class OutputController extends Controller {

    public function outputText() {

        //all constructions 4 use with <select>        
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
        debug($allOutputFromProcess);
        
        
        // inserted here for testing purposes //????
        //$allOutputFromConstructions = $model->getOutputFromConstructions(10);
        //debug($allOutputFromConstructions);

        
        /* Debug floatToPercent
        $value = 0.4;

        $float_one = $model->floatToPercent($value);
        $float_two = $model->floatToPercent(0.45);
        $float_three = $model->floatToPercent(0.123);

        debug($float_one);
        debug($float_two);
        debug($float_three);
         * 
         * $value['tas_va']
        
        */
        
        /* call to  floatToPercent >>>workaround: added dirctly to the view >>>>>>>>>>>>>>>>>> ask Benjamin about it
        foreach ($allOutputFromProcess as $key => $value){
            
            $value['tas_va']= $model->floatToPercent($value['tas_va']);
            //$value['tas_nva']= $model->floatToPercent($value['tas_nva']);
            //$value['tas_nvau']= $model->floatToPercent($value['tas_nvau']);
            
        };
        */
        $constructions= $model->getConstructionTypesFromCsv();
        debug($constructions);
        
        $this->show('output/outputText', array(
            'allProcess' => $allProcess,
            'allConstructions' => $allConstructions,
            'allOutputFromProcess' => $allOutputFromProcess,
            // inserted here for testing purposes //????
        //    'allOutputFromConstructions' => $allOutputFromConstructions
        ));

        /*
         */
    }

    public function output() {
        $this->show('output/output');
    }

}
