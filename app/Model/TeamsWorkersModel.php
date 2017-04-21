<?php

namespace Model;

class TeamsWorkersModel extends \W\Model\Model {

    // surcharge construc du parent car il recherche par defauft un primary key "Id"
    public function __construct() {
        parent::__construct();
        $this->setPrimaryKey('teams_tea_id');
    }

    public function getId($teamsName) {

        $sql = '
                    SELECT tea_id
                    FROM teams
                    WHERE tea_name = :name
                ';
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindValue(':name', $teamsName, \PDO::PARAM_STR);

        if ($stmt->execute() === false) {
            debug($stmt->errorInfo());
        } else {
            return $stmt->fetchAll();
        }

        return false;
    }

// end of function|method getAllConstrcutions()
}
