<?php

namespace Controller;

/**
 * Description of construction
 *
 * @author CS
 */
class ConstructionController extends \W\Controller\Controller {

    // here starts the construction add method|function
    public function addConstruction() {
        
        // Remove all comments
        unset($_SESSION['flash']);
        
        // If POST
        if (!empty($_POST)) {
            //debug($_POST);
            // recover data on POST 
            $name = isset($_POST['name']) ? trim(($_POST['name'])) : '';
            $city = isset($_POST['city']) ? trim($_POST['city']) : '';
            $country = isset($_POST['country']) ? trim($_POST['country']) : '';
            $type = isset($_POST['type']) ? trim($_POST['type']) : '';
            $client = isset($_POST['client']) ? trim($_POST['client']) : '';

            $errorList = array();
            // I validate inputs
            // construction name
            if (strlen($name) < 3) {
                $errorList[] = 'Construction name must be at least 3 characters long !';
            }
            // city name
            if (strlen($city) < 3) {
                $errorList[] = 'City name must be at least 3 characters long !';
            }
            // country name
            if (strlen($country) < 3) {
                $errorList[] = 'Country name must be at least 3 characters long !';
            }
            // type name
            if (strlen($type) < 3) {
                $errorList[] = 'Type must be at least 3 characters long !';
            }

            // client name
            if (strlen($client) < 3) {
                $errorList[] = 'Client name must be at least 3 characters long !';
            }


            // If all data is ok
            if (empty($errorList)) {
                // Data is inserted into DB
                $addConstruction = $constructionModel->insert(array(
                    'con_name' => $name,
                    'con_city' => $city,
                    'con_country' => $country,
                    'con_type' => $type,
                    'con_client' => $client
                ));

                // If insertion worked out, 
                // redirection to construction main page
                if (!empty($addConstruction)) {


                    // Redirection to construction list page
                    $this->redirectToRoute('constrcution_listconstruction');
                } else {
                    $this->flash('Error inserting into the DB !', 'danger');
                }
            }
        } else {
            $this->flash(join('<br>', $errorList), 'danger');
        }

        $this->show('construction/construction');
    }// end of function|method
    //
    // here starts the construction list method|function
    public function listConstruction() {
        // Remove all comments
        unset($_SESSION['flash']);
        // restrict access to this page to users and admin
        // line $this->allowTo(.......) must be uncommented !!
        // $this->allowTo(array('admin','user'));
        
        // code here to list all constructions from DB
        // 
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
    }// end of function|method

} // end of class
