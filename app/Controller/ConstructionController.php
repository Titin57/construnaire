<?php

namespace Controller;

/**
 * Description of construction
 *
 * @author CS
 */
class ConstructionaddController extends \W\Controller\Controller {

    // here starts the construction add method|function
    public function addConstruction() {
        // Remove all comments
        unset($_SESSION['flash']);
        // If POST
        if (!empty($_POST)) {
            //debug($_POST);
            // recover data on POST 
            $name = isset($_POST['name']) ? trim(($_POST['name'])) : '';
            // drop down menu for cties
            $city = isset($_POST['city']) ? trim($_POST['city']) : '';
            // drop down menu for contries
            $country = isset($_POST['country']) ? trim($_POST['country']) : '';
            $type = isset($_POST['type']) ? trim($_POST['type']) : '';
            $client = isset($_POST['client']) ? trim($_POST['client']) : '';

            $errorList = array();
            // I validate inputs
            // construction name
            if (strlen($name) < 3) {
                $errorList[] = 'Name must be at least 3 characters long !';
            }
            // city name
            if (strlen($city) < 3) {
                $errorList[] = 'Name must be at least 3 characters long !';
            }
            // country name
            if (strlen($country) < 3) {
                $errorList[] = 'Name must be at least 3 characters long !';
            }
            // type name
            if (strlen($type) < 3) {
                $errorList[] = 'Name must be at least 3 characters long !';
            }

            // client name
            if (strlen($client) < 3) {
                $errorList[] = 'Name must be at least 3 characters long !';
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

                // If insertion worked out, redirection to construction main page
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
    
    // here starts the construction list method|function
    public function listConstruction() {
        // Remove all comments
        unset($_SESSION['flash']);
        // code here to list all constructions from DB
        
    }
    
}// end of class
