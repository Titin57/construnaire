<?php

namespace Model;


class OutputModel extends \W\Model\Model
{
    public function getOutput($conId, $limit=25) {
        $sql = '
            SELECT *
            FROM construction
            WHERE con_id= :conId
            ORDER BY con_inserted
            LIMIT :limit
            ';
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindvalue(':conId', $conId, \PDO::PARAM_INT);
        $stmt->bindvalue(':limit', $limit, \PDO::PARAM_INT);
        //$stmt = execute();

        if ($stmt->execute() === false) {
            debug($stmt->errorInfo());
        } else {
            return $stmt->fetchAll();
        }
    }
    
    
    
    
}