<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Model;

/**
 * Description of ConstructionaddModel
 *
 * @author Etudiant
 */
class ConstructionaddModel extends \W\Model\UsersModel {

    // The constructor is over written, to define the primary key
    public function __construct() {
        parent::__construct();
        $this->setPrimaryKey('con_id');
    }

    public function getAllVideogame() {
        $sql = '
            SELECT con_id, con_name
            FROM construction
        ';
        $stmt = $this->dbh->prepare($sql);

        if ($stmt->execute() === false) {
            debug($stmt->errorInfo());
        } else {
            return $stmt->fetchAll();
        }

        return false;
    }

}

// end of class
