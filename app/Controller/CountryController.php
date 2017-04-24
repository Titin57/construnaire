<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\CountryModel;

class CountryController extends Controller {

    // Add a new country

    public function addCountry() {

        // Remove all comments
        unset($_SESSION['flash']);
        
        // Access restriction - remove comment
        // $this->allowTo(array('admin', 'user'));        

        if (!empty($_POST)) {
            //debug($_POST);

            $cou_name = (isset($_POST['cou_name']) ? trim($_POST['cou_name']) : '');

            $errorList = array();
            // I validate inputs
            // construction name
            if (strlen($cou_name) <= 0) {
                $errorList[] = 'Enter a country name !';
            }

            // If all data is ok
            if (empty($errorList)) {
                // Data is inserted into DB
                $data = array(
                    'cou_name' => $cou_name,
                );
                // debug($data);
                $model = new \Model\CountryModel();
                $addCountry = $model->insert($data);
                // If insertion worked out, 
                // redirection to construction main page
                if (!empty($addCountry)) {

                    // Redirection to construction list page
                    $this->redirectToRoute('city_addcity');
                } else {
                    $this->flash('Error inserting into the DB !', 'danger');
                }
            } else {
                $this->flash(join('<br>', $errorList), 'danger');
            }
        }
        $this->show('country/addcountry');
    }

}
