<?php

namespace Controller;

class ConstructionController extends \W\Controller\Controller {

    // here starts the construction add method|function
    public function addConstruction() {


        // Remove all comments
        unset($_SESSION['flash']);

        // Access restriction - remove comment
        // $this->allowTo(array('admin', 'user'));

        // If POST
        if (!empty($_POST)) {
            // debug($_POST);
            // recover data on POST 
            $name = isset($_POST['name']) ? trim(($_POST['name'])) : '';
            $city = isset($_POST['cit_id']) ? trim($_POST['cit_id']) : '';
            $type = isset($_POST['type']) ? trim($_POST['type']) : '';
            $client = isset($_POST['client']) ? trim($_POST['client']) : '';
            $startdate = isset($_POST['con_startdate']) ? trim($_POST['con_startdate']) : '';
            $enddate = isset($_POST['con_enddate']) ? trim($_POST['con_enddate']) : '';

            $errorList = array();
            // I validate inputs
            // construction name
            if (strlen($name) < 3) {
                $errorList[] = 'Construction name must be at least 3 characters long !';
            }
            // city name
            if (intval($city) <= 0) {
                $errorList[] = 'City not in DB !';
            }

            // type name
            if (intval($type) <= 0) {
                $errorList[] = 'Type must be at least 3 characters long !';
            }

            // client name
            if (strlen($client) < 3) {
                $errorList[] = 'Client name must be at least 3 characters long !';
            }

            // If all data is ok
            if (empty($errorList)) {
                // Data is inserted into DB


                $constructionModel = new \Model\ConstructionModel();
                $addConstruction = $constructionModel->insert(array(
                    'con_name' => $name,
                    'city_cit_id' => $city,
                    'con_type' => $type,
                    'con_client' => $client,
                    'con_startdate' => $startdate,
                    'con_enddate' => $enddate
                ));

                // If insertion worked out, 
                // redirection to construction main page
                if (!empty($addConstruction)) {

                    // Redirection to construction list page
                    $this->redirectToRoute('construction_listconstruction');
                } else {
                    $this->flash('Error inserting into the DB !', 'danger');
                }
            } else {
                $this->flash(join('<br>', $errorList), 'danger');
            }
        }

        //todo get all cities by $cities

        $model = new \Model\CityModel();
        $cities = $model->getAllCities();
        $this->show('construction/addconstruction', array(
            'cities' => $cities
        ));
    }

// end of function|method
    //
    // here starts the construction list method|function

    public function listConstruction() {
        // Remove all comments
        unset($_SESSION['flash']);
        
        // restrict access to this page to users and admin
        // line $this->allowTo(.......) must be uncommented !!
        // $this->allowTo(array('admin','user'));
       
        // code here to list all constructions from DB

        $model = new \Model\ConstructionModel();
        // $allconstructions recovers all data from method
        // getAllDataFromConstructions()
        $allconstructions = $model->getAllDataFromConstructions();
        // for dev purpose only
        // debug($allconstructions);
        $this->show('construction/listconstruction', array(
            // an associative table must be given to pass “variables”
            'allConstruction' => $allconstructions
        ));
    }

// end of function|method
}

// end of class
