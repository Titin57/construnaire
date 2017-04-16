<?php


namespace Model;

/**
 * Description of ConstructModel
 *
 * @author Carlo
 */
class ConstructModel extends \W\Model\Model{
    // over ride construc from parent  primary key "Id" to "con_id"
    public function __construct() {
        parent::__construct();
        $this->setPrimaryKey('con_id');
    }// end of method|function ConstructModel
} // end of class