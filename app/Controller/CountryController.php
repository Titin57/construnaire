<?php


namespace Controller;


class CountryController extends \W\Controller\Controller{
    // Add a new country
    
    public function addCountry(){
            
            //debug($_POST);
            
            $cit_name = (isset($_POST['cou_name']) ? trim($_POST['cou_name']) : '');
            
            //debug($cit_name);
            
            $data = array(               
                'cou_name' => $cou_name,

            );
                                                 
            
            //debug($data);
            $model = new \Model\CountryModel();  
            $addCountry = $model->insert($data); 
            
            $this->show('country/addcoutry');
	}
}
