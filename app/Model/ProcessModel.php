<?php

namespace Model;


class ProcessModel extends \W\Model\Model{
    
    // surcharge construc du parent car il recherche par defauft un primary key "Id"
    public function __construct() {
        parent::__construct();
        $this->setPrimaryKey('pro_id');
    }
    
    public function getTasksFromProcess($process_pro_id){
        $sql = '
            SELECT tas_name
            FROM tasks
            WHERE process_pro_id = :id
        ';
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindValue(':id', $process_pro_id, \PDO::PARAM_INT);
        
        if ($stmt->execute() === false) {
            debug($stmt->errorInfo());
        }
        else {
            return $stmt->fetchAll();
        }
        
        return false;
    }
       

    
}
