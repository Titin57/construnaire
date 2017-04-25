<?php

namespace Controller;

use \W\Controller\Controller;
use Model\OutputModel;

class OutputController extends Controller {

    public function output() {
        
         if(! empty($_POST) ){
                  $pro_id = (isset($_POST['pro_id']) ? trim($_POST['pro_id']) : '');

                  $this->redirectToRoute('output_outputText',array('id'=>$pro_id));
        debug($pro_id);   
        exit;
         }
        $processModel = new \Model\ProcessModel();
        $allProcess = $processModel->findAll();
        $this->show('output/output', array(
  
            'allProcess' => $allProcess,

        ));
    }

    public function outputText() {

        $pro_id = (isset($_POST['id']) ? trim($_POST['id']) : '');
        //$pro_id = $_POST['pro_id']; 
        debug($pro_id);
        //$ro_id = $_GET['id']; 
        debug($pro_id);
        debug($pro_id);
        debug($pro_id);


        //all constructions 4 use with <select>        
        $constructionModel = new \Model\ConstructionModel();


        $allConstructions = $constructionModel->findAll();
//        
        //debug($allConstructions);
        // all process 4 use with <select>        
        $processModel = new \Model\ProcessModel();
        $allProcess = $processModel->findAll();
        //debug($allProcess);



        $model = new \Model\outputModel();
        // output ID still hardcoded
        $allOutputFromProcess = $model->getOutputFromProcess(10);
        debug($allOutputFromProcess);
// 
        // output ID still hardcoded 
        $sumWastedTimePerProcess = $model->sumWastedTimePerProcess($pro_id);
        //debug ($sumWastedTimePerProcess);       
//       
//       
//       //       calculate Task time partial
        //////////////////////////////////
        $sumVATimePerProcess = $model->calcWastedTimePerTask($pro_id, 'tas_va');
//        debug ($sumVATimePerProcess);  
        $sumNVATimePerProcess = $model->calcWastedTimePerTask(10, 'tas_nva');
//        debug ($sumNVATimePerProcess);  
        $sumNVAUTimePerProcess = $model->calcWastedTimePerTask(10, 'tas_nvau');
//        debug ($sumNVAUTimePerProcess);          
//        $merged = ($sumVATimePerProcess + $sumNVAUTimePerProcess);
//        $merged =array_push($sumVATimePerProcess,$sumNVATimePerProcess);
//        $merged = array_merge_recursive($sumVATimePerProcess,$sumNVATimePerProcess);
//        $merged = $sumVATimePerProcess ;
//        $merged [] += $sumNVAUTimePerProcess;
//        debug($merged);
//        for ($i=0; $i < count($sumNVAUTimePerProcess); $i++){
//            $nvaData=$sumVATimePerProcess;
//            $nvaData[][]= $sumNVAUTimePerProcess[$i];
//            $nvaDataB []= $sumNVAUTimePerProcess[$i];
//            $nvaDataB [$i]= $sumNVATimePerProcess[$i];
//            $nvaData= array_push($nvaData[$i][], $sumNVAUTimePerProcess[$i]);
//            array_push($nvaData[$i], $sumNVAUTimePerProcess[$i]);
//            array_push($nvaData[$i], $sumNVATimePerProcess[$i]);
//        };
//        $merged =array_merge($sumVATimePerProcess,$sumNVATimePerProcess,$sumNVAUTimePerProcess);
//        debug($nvaDataB);
//       old stuff -> delete?
        //////////////////////////////////        
        //$tasva=tas_va;
//                debug (calcWastedTimePerTask(10,'tas_va'));  
//        $calcWastedTimePerTask = $model->tasSql(10,calcWastedTimePerTask(10,'tas_va'));
//        debug ($calcWastedTimePerTask);      
        $calcWastedTimePerTaskVa = $model->calcWastedTimePerTaskVa(10);
//        debug ($calcWastedTimePerTaskVa);      
//       Csv stuff
        //////////////////////////////////        
//        debug('debug outputcontroller readCsv' ,$construct);
        $construct = $model->readCsv('building.csv');
//        debug($construct);
        $constructions = $model->readCsv('buildings.csv', 1);
//        debug($constructions);
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

        /* call to  floatToPercent >>>workaround: added dirctly to the view >>>>>>>>>>>>>>>>>> ask Benjamin about it<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
          foreach ($allOutputFromProcess as $key => $value){

          $value['tas_va']= $model->floatToPercent($value['tas_va']);
          //$value['tas_nva']= $model->floatToPercent($value['tas_nva']);
          //$value['tas_nvau']= $model->floatToPercent($value['tas_nvau']);

          };
         */
        $constructions = $model->getConstructionTypesFromCsv();
        //debug($constructions);

        $this->show('output/outputText', array(
            'allProcess' => $allProcess,
            'allConstructions' => $allConstructions,
            'allOutputFromProcess' => $allOutputFromProcess,
//            'getNormalizedProcessNVA' => $getNormalizedProcessNVA, //remove
            //            partial time VA, NVA ,NVAU
            'sumVATimePerProcess' => $sumVATimePerProcess,
            'sumNVATimePerProcess' => $sumNVATimePerProcess,
            'sumNVAUTimePerProcess' => $sumNVAUTimePerProcess
                // inserted here for testing purposes //????
                //    'allOutputFromConstructions' => $allOutputFromConstructions
        ));

        /*
         */
    }

    public function outputVisuals() {
        $model = new \Model\outputModel();
//       calculate partial NVA process parts
        //////////////////////////////////
        $pro_id = (isset($_POST['pro_id']) ? trim($_POST['pro_id']) : '');

        $getTasksProcessNVA = $model->getTasksProcessNVA(10);
//        debug ($getTasksProcessNVA);  
        $getNormalizingProcessNVA = $model->getNormalizingProcessNVA(10);
//        debug ($getNormalizingProcessNVA);  
//       calculate Task time partial
        //////////////////////////////////        
//        $sumVATimePerProcess = $model->calcWastedTimePerTask();
        $sumVATimePerProcess = $model->calcWastedTimePerTask(10, 'tas_va');
//        debug ($sumVATimePerProcess);  
        $sumNVATimePerProcess = $model->calcWastedTimePerTask(10, 'tas_nva');
//        debug ($sumNVATimePerProcess);  
        $sumNVAUTimePerProcess = $model->calcWastedTimePerTask(10, 'tas_nvau');
//        debug ($sumNVAUTimePerProcess);  
//       fetch general process data
        //////////////////////////////////        
        // output ID still hardcoded

        $allOutputFromProcess = $model->getOutputFromProcess(10);
//        debug($allOutputFromProcess);

        $this->show('output/output', array(
            'getTasksProcessNVA' => $getTasksProcessNVA,
            'getNormalizingProcessNVA' => $getNormalizingProcessNVA,
//            'allProcess' => $allProcess,
//            'allConstructions' => $allConstructions,
            'allOutputFromProcess' => $allOutputFromProcess,
//            partial time VA, NVA ,NVAU
            'sumVATimePerProcess' => $sumVATimePerProcess,
            'sumNVATimePerProcess' => $sumNVATimePerProcess,
            'sumNVAUTimePerProcess' => $sumNVAUTimePerProcess
                // inserted here for testing purposes //????
                //    'allOutputFromConstructions' => $allOutputFromConstructions
        ));
    }

}
