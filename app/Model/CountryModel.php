<?php

namespace Model;

class CountryModel extends \W\Model\Model{
    // over ride construc from parent  primary key "Id" to "con_id"
    public function __construct() {
        parent::__construct();
        $this->setPrimaryKey('cou_id');
    }// end of method|function CountryModel
    
    
} // end of class