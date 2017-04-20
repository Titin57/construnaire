<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\CityModel;

class CityController extends Controller {

    // Add a new city

    public function addCity() {
        // Remove all comments
        unset($_SESSION['flash']);

        //debug($_POST);

        $cit_name = (isset($_POST['cit_name']) ? trim($_POST['cit_name']) : '');

        //debug($cit_name);

        $data = array(
            'cit_name' => $cit_name,
        );


        //debug($data);
        $model = new \Model\CityModel();
        $addCity = $model->insert($data);

        $this->show('city/addcity');
    }

}
