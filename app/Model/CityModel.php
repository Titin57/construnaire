<?php

namespace Model;

class CityModel extends \W\Model\Model {

    // over ride construc from parent  primary key "Id" to "cit_id"
    public function __construct() {
        parent::__construct();
        $this->setPrimaryKey('cit_id');
    }

// end of method|function
// end of method|function CountryModel
    // method to get all countries ordered ASC

    public function getAllCities() {
        $sql = '
            SELECT * 
            FROM city
            GROUP BY cit_name ASC
        ';
        $stmt = $this->dbh->prepare($sql);
        // $stmt->bindValue(':id', $con_Id, \PDO::PARAM_INT);

        if ($stmt->execute() === false) {
            debug($stmt->errorInfo());
        } else {
            return $stmt->fetchAll();
        }

        return false;
    }

// end of function|method getAllCountries()    
}

// end of class