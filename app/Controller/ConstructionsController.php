<?php


namespace Controller;

use \W\Controller\Controller;
use \Model\ConstructionsModel;


class ConstructionsController extends Controller {

    public function addconstruction() {
        // Je vide les alerts en Session
        unset($_SESSION['flash']);
        // SI POST
        if (!empty($_POST)) {
            //debug($_POST);
            // recover data on POST 
            $con_name = isset($_POST['con_name']) ? trim(($_POST['con_name'])) : '';
            // drop down menu for cties
            $con_client = isset($_POST['con_client']) ? trim($_POST['con_client']) : '';
            $con_type = isset($_POST['con_type']) ? trim($_POST['con_type']) : '';

            
            $errorList = array();
            // I validate inputs
            // construction name
            if (strlen($con_name) < 3) {
                $errorList[] = 'Name must be at least 3 characters long !';
            }
            // construction type
            if (strlen($type) < 3) {
                $errorList[] = 'Name must be at least 3 characters long !';
            }            
            
            // construction client
            if (strlen($client) < 0)  {
                $errorList[] = 'Name must be at least 3 characters long !';
            }
            
            
            // If all data is ok
            if (empty($errorList)) {
                // I check if construction name exist
                $constructionsModel = new \W\Model\ConstrcutionsModel();
                if ($constructionsModel->constrcutionExists($con_name)) {
                    $this->flash('This construction exist in DB !', 'danger');
                }
                else {
                    
                    // Insert data into DB
                    $insertedConstrcution = $constructionsModel->insert(array(
                        'con_name' => $con_name,
                        'con_client' => $con_client,
                        'con_type' => $con_type,
                    ));
                    
                    // If insertion in DB was ok, redirection to construction page
                    if (!empty($insertedConstrcution)) {
                        // Confirmation message will be displayed
                        $this->flash('Construction added successfully into DB', 'success');
                        
                        // Redirection to construction main page
                        $this->redirectToRoute('construction_construction');
                    }
                    else {
                        $this->flash('Error, no insertion was done !', 'danger');
                    }
                }
            }
            else {
                $this->flash(join('<br>', $errorList), 'danger');
            }
        }
        $this->show('construction/construction');
    } // end of addconstruction function|method
    
    
} // end of class