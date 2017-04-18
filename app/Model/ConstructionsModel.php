<?php


namespace Model;


class ConstructionsModel extends \W\Model\Model{
    // over ride construc from parent  primary key "Id" to "con_id"
    public function __construct() {
        parent::__construct();
        $this->setPrimaryKey('con_id');
    }// end of method|function __construct
    
    // method to get all construction ordered by startdate desc
    // inner join with city
    public function getAllConstructions($constructionId) {
        $sql = '
            SELECT *
            FROM constrcution
            INNER JOIN city ON city.cit_id = construction.con_id
            INNER JOIN country ON country.cou_id = city.cit_id
            WHERE con_id = :id
            SORT BY con_startdate DESC
            LIMIT 25
        ';
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindValue(':id', $constructionId, \PDO::PARAM_INT);
        
        if ($stmt->execute() === false) {
            debug($stmt->errorInfo());
        }
        else {
            return $stmt->fetchAll();
        }
        
        return false;
    } // end of function|method getAllConstrcutions()
    
} // end of class