<?php

namespace Model;


class TasksModel extends \W\Model\Model{
    
    // surcharge construc du parent car il recherche par defauft un primary key "Id"
    public function __construct() {
        parent::__construct();
        $this->setPrimaryKey('tas_id');
    }
    
//        $sql = 'SELECT DISTINCT 
//        public function getTasksFromConstructions($con_id, $limit = 25) {
        public function getTasksFromConstructions() {
        $sql = 'SELECT  
                    `tas_name`,
                    `tas_id`,

                    `con_id`,
                    `con_name`, 
                    `con_type`,  
                    
                    `process_pro_id`,
                    `pro_name`,
                    
                    `tas_stop`,
                    `tas_date`,
                    `tas_start`,
                    (ABS( DATEDIFF(`tas_stop`, NOW()))+1) AS tas_diff
                    

                    

                    
                    
                FROM tasks

               INNER JOIN process ON  tasks.process_pro_id = process.pro_id 
                LEFT JOIN constructions ON tasks.constructions_con_id = constructions.con_id
                
               
             

                ';
//                LIMIT :limit
//                WHERE con_id= :con_id
//                LEFT JOIN process ON tasks.process_pro_id = process.pro_id 

//                LEFT JOIN teams ON teams.tea_id = tasks.teams_tea_id 
//                LEFT JOIN process ON process.pro_id = tasks.process_pro_id
        $stmt = $this->dbh->prepare($sql);
//        $stmt->bindvalue(':con_id', $con_id, \PDO::PARAM_INT);
//        $stmt->bindvalue(':limit', $limit, \PDO::PARAM_INT);
        //$stmt = execute();

        if ($stmt->execute() === false) {
            debug($stmt->errorInfo());
        } else {
            return $stmt->fetchAll();
        }
    }
//                    `con_id`,
//                    `con_name`, 
//                    `con_type`,  
//                RIGHT JOIN constructions ON tasks.constructions_con_id = constructions.con_id
//                          
    
    // old query - from process -probably not needed
  //        public function getTasksFromConstructions($con_id, $limit = 25) {
        public function OLDgetTasksFromConstructions( $limit = 25) {
        $sql = 'SELECT DISTINCT 
                    `tas_name`,
                    `con_id`,
                    `con_name`, 
                    `con_type`,  
                    
                    `process_pro_id`,
                    `pro_name`,
                    
                    `tas_stop`,
                    `tas_date`,
                    `tas_start` 
                    
                FROM constructions


                LEFT JOIN tasks ON tasks.constructions_con_id = constructions.con_id
                LEFT JOIN teams ON teams.tea_id = tasks.teams_tea_id 
                LEFT JOIN process ON process.pro_id = tasks.process_pro_id
                
               
                          
             

                LIMIT :limit
                ';
//                WHERE con_id= :con_id

        $stmt = $this->dbh->prepare($sql);
//        $stmt->bindvalue(':con_id', $con_id, \PDO::PARAM_INT);
        $stmt->bindvalue(':limit', $limit, \PDO::PARAM_INT);
        //$stmt = execute();

        if ($stmt->execute() === false) {
            debug($stmt->errorInfo());
        } else {
            return $stmt->fetchAll();
        }
    }  
       
}




