<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\CityModel;

class CityController extends Controller {

    // Add a new city

    public function addCity() {
        // Remove all comments
        unset($_SESSION['flash']);
        
        // Access restriction - remove comment
        $this->allowTo(array('admin', 'user'));        

        // check if fields are not empty
        if (!empty($_POST)) {
            // read data from input
            $cit_name = (isset($_POST['cit_name']) ? trim($_POST['cit_name']) : '');
            $cou_id = (isset($_POST['cou_id']) ? trim($_POST['cou_id']) : '');

            $errorList = array();
            // if input is validated ...
            // ... city name and country name
            if (strlen($cit_name) <= 0) {
                $errorList[] = 'Enter a city name !';
            }
            if (intval($cou_id) <= 0) {
                $errorList[] = 'Choose a country !';
            }
            // if data is ok
            if (empty($errorList)) {
                $data = array(
                    'cit_name' => $cit_name,
                    'cou_id' => $cou_id,
                );
                $model = new \Model\CityModel();
                $addCity = $model->insert($data);
                //debug($data);
                // if insertion worked out
                // redirect to add construction page
                if ((!empty($addCity))) {
                    $this->redirectToRoute('construction_addconstruction');
                } else {
                    $this->flash('Error inserting into DB !', 'danger');
                }
            } else {
                $this->flash(join('<br>', $errorList), 'danger');
            }
        }
        $model = new \Model\CountryModel();
        $countries = $model->getAllCountries();
        $this->show('city/addcity', array('countries' => $countries));
    }

// here starts the country list method|function
    public function listCities() {
        // Remove all comments
        unset($_SESSION['flash']);

        // restrict access to this page to users and admin
        // line $this->allowTo(.......) must be uncommented !!
        $this->allowTo(array('admin','user'));

        $model = new \Model\CityModel();
        // $countries recovers all data from method
        // getAllCountries()
        $cities = $model->getAllCities();
        // for dev purpose only
        // debug($cities);
        $this->show('city/listcountry', array(
            // an associative table must be given to pass “variables”
            'allCities' => $cities
        ));
    }

// end of function|method  
}
