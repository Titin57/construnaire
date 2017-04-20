<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\CountryModel;

class CountryController extends Controller {

    // Add a new country

    public function addCountry() {

        // Remove all comments
        unset($_SESSION['flash']);

        //debug($_POST);

        $cou_name = (isset($_POST['cou_name']) ? trim($_POST['cou_name']) : '');

        $data = array(
            'cou_name' => $cou_name,
        );


        // debug($data);
        $model = new \Model\CountryModel();
        $addCountry = $model->insert($data);

        $this->show('country/addcountry');
    }
    
    // here starts the country list method|function
    public function listCountry() {
        // Remove all comments
        unset($_SESSION['flash']);
        // restrict access to this page to users and admin
        // line $this->allowTo(.......) must be uncommented !!
        // $this->allowTo(array('admin','user'));
        
        // code here to list all constructions from DB
        // 
        $model = new \Model\CountryModel();
        // $countries recovers all data from method
        // getAllCountries()
        $countries = $model->getAllCountries();
        // for dev purpose only
        debug($countries);
        $this->show('country/listcountry', array(
            // an associative table must be given to pass “variables”
            'allCountries' => $countries
        ));
    }// end of function|method    

}
