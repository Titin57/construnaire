<?php

namespace Model;


class ProcessModel extends \W\Model\Model{
    
    // surcharge construc du parent car il recherche par defauft un primary key "Id"
    public function __construct() {
        parent::__construct();
        $this->setPrimaryKey('pro_id');
    }
    
    
       

    
}
