<?php


namespace Model;


class ConstructionModel extends \W\Model\Model{
    // over ride construc from parent  primary key "Id" to "con_id"
    public function __construct() {
        parent::__construct();
        $this->setPrimaryKey('con_id');
        // this could have been avoided if model would have been defined 
        // with table name "ConstructionsMode" instead of ">ConstructionModel"
        $this->setTable('constructions');
    }// end of method|function __construct
    
    // method to get all construction ordered by startdate desc
    // inner join with city
    public function getAllDataFromConstructions() {
        $sql = '
            SELECT *
            FROM constructions
            INNER JOIN city ON city.cit_id = constructions.city_cit_id
            INNER JOIN country ON country.cou_id = city.country_cou_id
            ORDER BY con_startdate DESC
        ';
        $stmt = $this->dbh->prepare($sql);
        // $stmt->bindValue(':id', $con_Id, \PDO::PARAM_INT);
        
        if ($stmt->execute() === false) {
            debug($stmt->errorInfo());
        }
        else {
            return $stmt->fetchAll();
        }
        
        return false;
    } // end of function|method getAllDataFromConstructions()
    
    
} // end of class