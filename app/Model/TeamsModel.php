<?php

namespace Model;


class TeamsModel extends \W\Model\Model{
    
    // surcharge construc du parent car il recherche par defauft un primary key "Id"
    public function __construct() {
        parent::__construct();
        $this->setPrimaryKey('tea_id');
    }
    
    
       
}




