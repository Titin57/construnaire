<?php

namespace Controller;

class UsersController extends \W\Controller\Controller {
    


    public function signin() {
        // unset ==> Alerts are removed !
        unset($_SESSION['flash']);

        $this->show('user/signin');
    }

    public function signinPost() {
        // debug($_POST);
        // Data is recovered in POST
        $email = isset($_POST['email']) ? trim(strip_tags($_POST['email'])) : '';
        $password = isset($_POST['password']) ? trim($_POST['password']) : '';

        $errorList = array();
        // Submitted data is validated
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $errorList[] = 'Wrong email address !';
        }
        if (strlen($password) < 0) {
            $errorList[] = 'The password must be at least 3 characters long !';
        }

        // If everything is ok
        if (empty($errorList)) {
            // Verification if email address and password in the DB
            $authModel = new \W\Security\AuthentificationModel();
            $userId = $authModel->isValidLoginInfo($email, $password);
            if ($userId > 0) {
                // I recover the user data from the DB
                $usersModel = new \Model\UsersModel();
                $userInfos = $usersModel->find($userId);
                // I add the user in the session
                $authModel->logUserIn($userInfos);
                // Here a success message is returned
                $this->flash('Connection for ' . $userInfos['usr_email'] . ' succeeded !', 'success');
                // Redirection to construction page (the comment must be removed)
                $this->redirectToRoute('construction_construction');
            } else {
                // Message in case of error
                $this->flash('User does not exist !', 'danger');
            }
        } else {
            $this->flash(join('<br>', $errorList), 'danger');
        }

        $this->show('user/signin');
    }


    
    public function signup() {
      
        // Empty alerts on the page
        unset($_SESSION['flash']);

        // If POST
        if (!empty($_POST)) {
            // debug($_POST);
            // Recover data on POST
            $email = isset($_POST['email']) ? trim(strip_tags($_POST['email'])) : '';
            $password1 = isset($_POST['password1']) ? trim($_POST['password1']) : '';
            $password2 = isset($_POST['password2']) ? trim($_POST['password2']) : '';

            $errorList = array();
            // Here I validate the data from the input
            if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                $errorList[] = 'No valid email address !';
            }
        
            if (strlen($password1) < 0) {
                $errorList[] = 'The password must be at least 3 characters long !';
            }
            if ($password1 != $password2) {
                $errorList[] = 'Passwords do not match !';
            }

            // If everything is ok
            if (empty($errorList)) {
                // Here I check if email exist
                $usersModel = new \Model\UsersModel();
                if ($usersModel->emailExists($email)) {
                    $this->flash('Email adress is taken !', 'danger');
                } else {
                    // Here I crypt the PW
                    $authModel = new \W\Security\AuthentificationModel();
                    $hashedPassword = $authModel->hashPassword($password1);

                    // Here I insert the dat into the DB
                    $insertedUser = $usersModel->insert(array(
                        'usr_email' => $email,
                        'usr_password' => $hashedPassword,
                        'usr_role' => 'user',
                    ));
                    debug($insertedUser);
                    // Si l'insertion a fonctionné, je redirige sur signin
                    if (!empty($insertedUser)) {
                        // Ajoute un message de succès à afficher
                        $this->flash('You are registered !', 'success');

                        // Redirection vers la page signin
                        $this->redirectToRoute('user_signin');
                    } else {
                        $this->flash('Error in registration !', 'danger');
                    }
                }
            } else {
                $this->flash(join('<br>', $errorList), 'danger');
            }
           
        }

        $this->show('user/signup');
           
    }
        

    public function forgot() {
        // The formular is submitted
        if (!empty($_POST)) {
            // The data is recovered in POST
            $email = isset($_POST['email']) ? trim(strip_tags($_POST['email'])) : '';

            $errorList = array();
            // The email address is validated | checked
            if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                $errorList[] = 'Wrong email address !';
            }

            // If everything is ok
            if (empty($errorList)) {
                // Verification of the email address
                // Here the model is instenced
                $model = new \W\Model\UsersModel();
                // I call the method|function to return the data for a given email address
                $userData = $model->getUserByUsernameOrEmail($email);

                // If there is an account
                if ($userData === false) {
                    $this->flash('Email address does not exist !', 'danger');
                } else {
                    // If email address exist, a token is generated (32 caracters)
                    $token = md5(\W\Security\StringUtils::randomString(128));

                    // I insert the token into the DB
                    $model->update(array(
                        'usr_token' => $token,
                        'usr_token_created' => date('Y-m-d H:i:s')
                            ), $userData['id']);

                    // Here the content of the email address is generated with a link to reset the password
                    $htmlContent = 'Hello,

You asked to change your password. Click on the link to reset your password :
<a href="' . $this->generateUrl('user_reset', array('token' => $token), true) . '">' . $this->generateUrl('user_reset', array('token' => $token), true) . '</a>';

                    // Here the email is sent
                    $isSent = \Helper\Utils::sendEmail($userData['usr_email'], 'Change password', nl2br($htmlContent));

                    if ($isSent) {
                        $this->flash('You got an email with a link to reset your password !', 'success');
                    } else {
                        $this->flash('Error sending the email !', 'danger');
                    }
                }
            } else {
                $this->flash(join('<br>', $errorList), 'danger');
            }
        }

        $this->show('user/forgot');
    }

    public function reset($token) {
        // The model is instanced here
        $model = new \Model\UsersModel();
        $userId = $model->getIdByToken($token);
        $displayForm = false;

        // If token does not exist or has expired
        if ($userId === false) {
            $this->flash('Invalid token !', 'danger');
        } else {
            $displayForm = true;
        }

        // Formular submitted
        if (!empty($_POST)) {
            // Here the password will be recovered
            $password1 = isset($_POST['password1']) ? trim($_POST['password1']) : '';
            $password2 = isset($_POST['password2']) ? trim($_POST['password2']) : '';

            $errorList = array();
            if (strlen($password1) < 6) {
                $errorList[] = 'The password must be at least 6 characters long !';
            }
            if ($password1 != $password2) {
                $errorList[] = 'Passwords do not match !';
            }

            // Si tout est ok
            if (empty($errorList)) {
                // Je hash le mot de passe
                $authModel = new \W\Security\AuthentificationModel();
                $hashPassword = $authModel->hashPassword($password1);

                // Je fais la mise à jour du password et je supprime le token en DB
                $model->update(array(
                    'usr_password' => $hashPassword,
                    'usr_token' => '',
                    'usr_token_created' => ''
                        ), $userId);

                // J'affiche le message de succès
                $this->flash('Password changed successfully ', 'success');

                // Je redirige vers la home
                $this->redirectToRoute('default_home');
            } else {
                $this->flash(join('<br>', $errorList), 'danger');
            }
        }

        $this->show('user/reset', array(
            'displayForm' => $displayForm
        ));
    }

    public function logout() {
        // Je supprime le user en session
        $authModel = new \W\Security\AuthentificationModel();
        $authModel->logUserOut();

        // Je redirige vers la page d'accueil
        $this->redirectToRoute('default_home');
    }

}
