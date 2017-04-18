<?php

namespace Controller;

use \W\Controller\Controller;
use Model\OutputModel;

class OutputController extends Controller {

    public function outputText() {


        $model = new \Model\outputModel();
        $allOutput = $model->getOutput();
        /*
          //$allGenres = $model->getGenres();
          //$selectedConsole = $model->find($id);
          //$conference = $model->find(2);
        */
          debug(allOutput);
        $this->show('modification/modification', array(
            'allOutput' => $allOutput,
                //'allGenres' => $allGenres
        ));




        $this->show('output/outputText');
    }

    public function output() {
        $this->show('output/output');
    }

}
