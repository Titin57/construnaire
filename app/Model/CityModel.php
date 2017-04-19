<?php

namespace Model;

class CityModel extends \W\Model\Model{
    // over ride construc from parent  primary key "Id" to "cit_id"
    public function __construct() {
        parent::__construct();
        $this->setPrimaryKey('cit_id');
        
    }// end of method|function
    
    
    
} // end of class