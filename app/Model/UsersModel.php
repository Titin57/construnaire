<?php

namespace Model;

class UsersModel extends \W\Model\UsersModel {

    // The constructor is over written, to define the primary key
    public function __construct() {
        parent::__construct();
        $this->setPrimaryKey('usr_id');
    }

    /**
     * Recover the id from table users for a given  token
     * @param type $token
     * @return boolean
     */
    public function getIdByToken($token) {
        // 4*60*60 ==> 4 hrs token validation
        $sql = '
            SELECT usr_id
            FROM users
            WHERE usr_token = :token
            AND usr_token_created + 4*60*60 >= :timestampNow 
        ';
        //debug($sql);
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindValue(':token', $token);
        $stmt->bindValue(':timestampNow', date('Y-m-d H:i:s'));

        if ($stmt->execute() === false) {
            debug($stmt->errorInfo());
        } else {
            if ($stmt->rowCount() > 0) {
                $data = $stmt->fetch(\PDO::FETCH_ASSOC);
                return $data['usr_id'];
            }
        }

        return false;
    }

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}
