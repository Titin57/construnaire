<?php

namespace Model;

class CountryModel extends \W\Model\Model {

    // over ride construc from parent  primary key "Id" to "con_id"
    public function __construct() {
        parent::__construct();
        $this->setPrimaryKey('cou_id');
    }

// end of method|function CountryModel
    // method to get all countries ordered ASC

    public function getAllCountries() {
        $sql = '
            SELECT * 
            FROM country
            GROUP BY cou_name ASC
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