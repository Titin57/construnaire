<?php



namespace Controller;


class CityController extends \W\Controller\Controller{
    // Add a new city
    
    public function addCity(){
            
            //debug($_POST);
            
            $cit_name = (isset($_POST['cit_name']) ? trim($_POST['cit_name']) : '');
            
            //debug($cit_name);
            
            $data = array(               
                'cit_name' => $cit_name,

            );
                                                 
            
            //debug($data);
            $model = new \Model\CityModel();  
            $addCity = $model->insert($data); 
            
            $this->show('city/addcity');
	}
    
}
