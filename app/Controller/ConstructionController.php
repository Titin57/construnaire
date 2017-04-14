<?php


namespace Controller;

/**
 * Description of construction
 *
 * @author CS
 */
class ConstructionController extends \W\Controller\Controller {

    public function construction() {
        // Je vide les alerts en Session
        unset($_SESSION['flash']);
        // SI POST
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
            if (strlen($client) < 3)  {
                $errorList[] = 'Name must be at least 3 characters long !';
            }
            
            
            // If all data is ok
            if (empty($errorList)) {
                // Je teste si l'email existe
                $constructionModel = new \W\Model\UsersModel();
                if ($usersModel->emailExists($email)) {
                    $this->flash('L\'adresse email existe déjà !', 'danger');
                }
                else {
                    // Je crypte le MDP
                    $authModel = new \W\Security\AuthentificationModel();
                    $hashedPassword = $authModel->hashPassword($password1);
                    
                    // J'insère les données en DB
                    $insertedUser = $usersModel->insert(array(
                        'usr_email' => $email,
                        'usr_password' => $hashedPassword,
                        'usr_role' => 'user',
                    ));
                    
                    // Si l'insertion a fonctionné, je redirige sur signin
                    if (!empty($insertedUser)) {
                        // Ajoute un message de succès à afficher
                        $this->flash('Inscription effectué', 'success');
                        
                        // Redirection vers la page signin
                        $this->redirectToRoute('user_signin');
                    }
                    else {
                        $this->flash('Erreur dans l\'insertion', 'danger');
                    }
                }
            }
            else {
                $this->flash(join('<br>', $errorList), 'danger');
            }
        }
        $this->show('construction/construction');
    } // end of function|method
} // end of class