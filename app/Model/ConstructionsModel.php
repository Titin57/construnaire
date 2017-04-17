<?php

namespace Model;

class ConstructionsModel extends \W\Model\Model {

    // surcharge construc du parent car il recherche par defauft un primary key "Id"
    public function __construct() {
        parent::__construct();
        $this->setPrimaryKey('con_id');
    }

}

// end of file
