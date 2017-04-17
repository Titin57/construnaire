<?php

namespace Model;

class OutputModel extends \W\Model\Model {

    // surcharge construc du parent car il recherche par defauft un primary key "Id"
    public function __construct() {
        parent::__construct();
        $this->setPrimaryKey('pro_id');
    }

    public function getOutputFromProcess($pro_id, $limit = 5) {
        $sql = '
            SELECT  
                    `process_pro_id`,
                    `pro_name`,
                    `pro_text`,
                    
                    `tas_name`,
                    `tas_date`, 
                    `tas_typology`, 
                    `tas_repeat`, 
                    `tas_penalitiy`,  
                    `tas_start`, 
                    `tas_stop`, 
                    `tas_time`, 
                    `tas_text`, 
                    `tas_remark`,  
                    `tas_wastage`, 
                    `tas_va`, 
                    `tas_nva`, 
                    `tas_nvau`, 
                    
                    `tea_name`, 
                    `tea_text`,
                    
                    `con_name`, 
                    `con_client`, 
                    `con_type`, 
                    `con_text`, 
                    
                    `cit_name`,
                    
                    `cou_name`
                    
                    


                    
                FROM process
                INNER JOIN tasks ON process.pro_id = tasks.process_pro_id
                INNER JOIN teams ON teams.tea_id = tasks.teams_tea_id
                INNER JOIN constructions ON constructions.con_id = teams.constructions_con_id
                INNER JOIN city ON constructions.city_cit_id = city.cit_id
                INNER JOIN country ON country.cou_id = city.country_cou_id 

             
                WHERE pro_id= :pro_id

                LIMIT :limit
                ';
        /* debug
          `tas_image1`, `tas_image2`, `tas_image3`,`tas_inserted`, `tas_vocal_message`, `con_inserted`,
          ambiguous: `teams_tea_id`,


          INNER JOIN workers ON workers.tasks_tas_id = tasks.tas_id
          ORDER BY con_created

         */

        $stmt = $this->dbh->prepare($sql);
        $stmt->bindvalue(':pro_id', $pro_id, \PDO::PARAM_INT);
        $stmt->bindvalue(':limit', $limit, \PDO::PARAM_INT);
        //$stmt = execute();

        if ($stmt->execute() === false) {
            debug($stmt->errorInfo());
        } else {
            return $stmt->fetchAll();
        }
    }

    public function getOutputFromConstructions($con_id, $limit = 5) {
        $sql = '
            SELECT  
                    `con_name`, 
                    `con_client`, 
                    `con_type`, 
                    `con_text`,
                    
                    `cit_name`,
                    
                    `cou_name`,
                    
                    `tea_name`, 
                    `tea_text`,
                    
                    `process_pro_id`,
                    `pro_name`,
                    `pro_text`,
                    
                    `tas_name`,
                    `tas_date`, 
                    `tas_typology`, 
                    `tas_repeat`, 
                    `tas_penalitiy`,  
                    `tas_start`, 
                    `tas_stop`, 
                    `tas_time`, 
                    `tas_text`, 
                    `tas_remark`,  
                    `tas_wastage`, 
                    `tas_va`, 
                    `tas_nva`, 
                    `tas_nvau` 
                    
                    
                    
                 
                    
                FROM constructions
                INNER JOIN city ON constructions.city_cit_id = city.cit_id
                INNER JOIN country ON country.cou_id = city.country_cou_id 
                INNER JOIN teams ON constructions.con_id = teams.constructions_con_id
                INNER JOIN tasks ON tasks.teams_tea_id = teams.tea_id
                
               
                INNER JOIN process ON process.pro_id = tasks.process_pro_id

             
                WHERE pro_id= :con_id

                LIMIT :limit
                ';
        //`tas_image1`, `tas_image2`, `tas_image3`,`tas_inserted`, `tas_vocal_message`, `con_inserted`,
        // ambiguous: `teams_tea_id`, 

        /* debug

          INNER JOIN workers ON workers.tasks_tas_id = tasks.tas_id
         *                 ORDER BY con_created
         * 
         */
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindvalue(':con_id', $con_id, \PDO::PARAM_INT);
        $stmt->bindvalue(':limit', $limit, \PDO::PARAM_INT);
        //$stmt = execute();

        if ($stmt->execute() === false) {
            debug($stmt->errorInfo());
        } else {
            return $stmt->fetchAll();
        }
    }

    ///////////////////////////////////////////// Todo s /////////////////////////////////

    public function calcTime() {

        // if isset tas_start & tas_stop & tas_time  => recalculate  tas_time
        // if isset tas_start & tas_stop             => calculate  tas_time
        // if isset tas_start            & tas_time  => calculate  tas_stop
        // if isset             tas_stop & tas_time  => calculate  tas_start
        // add values to db  , recalculated values in brackets concatenated (possible? db restrictions value type?)
    }

    public function calcVA() {

        // tas_va * 100
        // tas_nva * 100
        //  tas_nvau * 100
        // tas_va + tas_nva + tas_nvau = 100% else error!!
    }

    /*
      public function addConstruction($lastname, $firstname, $email, $birthdate, $friendliness, $sessionId, $cityId) {
      global $pdo;

      $sql = '
      INSERT INTO student (stu_lastname, stu_firstname, stu_email, stu_birthdate, stu_friendliness, session_ses_id, city_cit_id)
      VALUES (:lastname, :firstname, :email, :birthdate, :friendliness, :ses_id, :cit_id)
      ';
      $sth = $pdo->prepare($sql);
      $sth->bindValue(':lastname', $lastname);
      $sth->bindValue(':firstname', $firstname);
      $sth->bindValue(':email', $email);
      $sth->bindValue(':birthdate', $birthdate);
      $sth->bindValue(':friendliness', $friendliness, PDO::PARAM_INT);
      $sth->bindValue(':ses_id', $sessionId, PDO::PARAM_INT);
      $sth->bindValue(':cit_id', $cityId, PDO::PARAM_INT);

      if ($sth->execute() === false) {
      print_r($sth->errorInfo());
      } else {
      // Je récupère l'ID auto-incrémenté
      return $pdo->lastInsertId();
      }

      return false;
      }

      public function addChateauSeb() {
      global $pdo;
      $sql = "INSERT INTO `constructions`(
      `con_name`,
      `con_client`,
      `con_type`,
      `con_text`,
      `city_cit_id`)
      VALUES ('Chateau Carloni',
      'La femme de Seb',
      'chateau',
      'best chateau in town',
      '1')";


      $sth = $pdo->prepare($sql);


      if ($sth->execute() === false) {
      print_r($sth->errorInfo());
      } else {
      return true;
      }
      return false;
      }

      public function addCity($cit_name, $contry_cou_id) {
      global $pdo;
      $sql = "INSERT INTO `city`(`cit_name`,
      `contry_cou_id`)
      VALUES (':cit_name',
      ':contry_cou_id')";
      $sth->bindValue(':cit_name', $cit_name);
      $sth->bindValue(':contry_cou_id', $contry_cou_id, PDO::PARAM_INT);

      $sth = $pdo->prepare($sql);


      if ($sth->execute() === false) {
      print_r($sth->errorInfo());
      } else {
      return true;
      }
      return false;
      }

      public function addCountry($cou_name) {
      global $pdo;
      $sql = "INSERT INTO `country`(`cou_name`)
      VALUES (':cou_name')";
      $sth->bindValue(':cou_name', $cou_name);


      $sth = $pdo->prepare($sql);


      if ($sth->execute() === false) {
      print_r($sth->errorInfo());
      } else {
      return true;
      }
      return false;
      }
     */

    // SQL requests to fill up DB
    ////////////////////// sql data

    /*     ///////// constructions
      INSERT INTO `constructions`(
      `con_name`,
      `con_client`,
      `con_type`,

      `con_text`,
      `city_cit_id`)
      VALUES (
      'treehouse of horror',
      'Bart Simpson',
      'Treehouse',
      'as seen on tv',
      6),(
      'Sam s tent',
      'sam',
      'tent',
      'back to the roots',
      5),(
      'pleasure castle',
      'carlito',
      'imaginary building',
      'entry through your dream',
      4)
     * ///////// cities
      INSERT INTO samw_sql1.`city` (
      `cit_name` ,
      `country_cou_id`
      )
      VALUES
      ('Sebville', 1),
      ('San Carlito', 2),
      ('New Carlolina', 2),
      ('Samtown', 3),
      ('Imaginiville', 4)
     * 

      ///////// counties
      INSERT INTO samw_sql1.`country`(`cou_name`)
      VALUES ('sebastianistan'),('Carlolandia'),('Sambia'),('Utopia')

      ///////// teams
      INSERT INTO `teams`
      (`tea_name`, `tea_text`, `constructions_con_id`)
      VALUES
      ('A-Team', 'best team ever', 1),
      ('css', 'better than A-Team', 1),
      ('Top Dogs', 'Named after the famous WORMS Team', 2)

      ///////// process of TREEHOUSE of hooro XVII
      INSERT INTO `process`(
      `pro_name`,
      `pro_text`)
      VALUES (
      '`building the framework of the treehouse`',
      '`construction of a treehouse`'

      ),(
      '`building the stairs  of the treehouse`',
      '`construction of a treehouse`'
      ),(
      '`installation of the bathroom in the Treehouse`',
      '`construction of a treehouse`'

      )
      ///////// process
      INSERT INTO `process`(
      `pro_name`,
      `pro_text`)
      VALUES (
      '`beeing the funny guy`',
      '`joking around, doing pranks`'

      ),(
      '`beeing John Malkovic`',
      '`surreal film role`'

      ),(
      '`building the framework`',
      '`construction of a treehouse`'

      ),(
      '`building the stairs`',
      '`construction of a treehouse`'

      ),(
      '`building the floor`',
      '`construction of a treehouse`'

      ),(
      '`installation of the toilet`',
      '`construction of a treehouse`'

      ),(
      '`installation of the whirlpool`',
      '`construction of a treehouse`'

      )
     * ///////// tasks Treehouse
     * INSERT INTO samw_sql1.`tasks`(
      `tas_name`,
      `tas_date`,
      `tas_typology`,

      `tas_repeat`,
      `tas_penalitiy`,
      `tas_start`,

      `tas_stop`,
      `tas_time`,
      `tas_text`,

      `tas_remark`,
      `tas_wastage`,
      `tas_va`,

      `tas_nva`,
      `tas_nvau`,
      `teams_tea_id`,
      `process_pro_id`
      )
      VALUES (
      'cutting the framework',
      2017-04-16,
      'Homer Simpson',

      45,
      '`heavy lifting`',
      '2017-01-01 00:13:03',

      '2017-01-04 00:19:08',
      0,
      'cleotus s wood is of inferior quality: overprocessing`',

      'the accident with Ralph Wiggum could have been prevented with basic security measures',
      'Surprocessing ou setup inutiles',
      0.4,

      0.25,
      0.35,
      1,
      10),
      (
      'assembling the Framework',
      2017-04-12,
      'Homer Simpson',

      25,
      'Retravail',
      '2017-01-01 08:00:03',

      'NULL',
      '00:06:08',
      'took the worker to long to get the framework up and standing',

      'the worker tried to attach the pieces to one another without wondering where to join them',
      '`Surprocessing ou setup inutiles`',
      0.5,

      0.45,
      0.05,
      3,
      10),
      (
      'laying the floor panels',
      2017-04-01,
      'Team Springfield',

      1,
      '`heavy lifting`',
      'NULL',

      '2017-04-05 19:10:02',
      '08:00:08',
      'innsufficient thickness of the panels, several layers needed to support Homer s weight',

      'buy the good stuff next time',
      'Surproduction',
      0.3,

      0.35,
      0.35,
      2,
      10),
      (
      'laying the floor panels',
      2017-04-01,
      'Team Springfield',

      1,
      '`heavy lifting`',
      'NULL',

      '2017-04-05 19:10:02',
      '08:00:08',
      'innsufficient thickness of the panels, several layers needed to support Homer s weight',

      'buy the good stuff next time',
      'Surproduction',
      0.3,

      0.35,
      0.35,
      2,
      10),
      (
      'laying the floor panels',
      2017-04-01,
      'Team Springfield',

      1,
      '`heavy lifting`',
      'NULL',

      '2017-04-06 19:10:02',
      '08:04:02',
      'innsufficient thickness of the panels, several layers needed to support Homer s weight',

      'buy the good stuff next time',
      'Surproduction',
      0.3,

      0.35,
      0.35,
      2,
      10)

     * 
     * 
     * 
      INSERT INTO samw_sql1.`tasks`(
      `tas_name`,
      `tas_date`,
      `tas_typology`,

      `tas_repeat`,
      `tas_penalitiy`,
      `tas_start`,

      `tas_stop`,
      `tas_time`,
      `tas_text`,

      `tas_remark`,
      `tas_wastage`,
      `tas_va`,

      `tas_nva`,
      `tas_nvau`,
      `teams_tea_id`,
      `process_pro_id`
      )
      VALUES (
      'installation of the toilet',
      2017-04-16,
      'Team',

      1,
      '`heavy lifting`',
      '2017-01-01 00:00:03',

      '2017-01-04 00:04:08',
      '00:06:08',
      'flush it hard`',

      'brown water dumped to the neighbour',
      '`Déplacements`',
      0.2,

      0.25,
      0.55,
      1,
      10),
      (
      'running the waterpipes',
      2017-04-12,
      'Worker',

      15,
      '`posture`',
      '2017-01-01 08:00:03',

      '2017-01-01 12:00:08',
      '00:06:08',
      'no water no fun',

      'no water source so far',
      '`Surprocessing ou setup inutiles`',
      0.8,

      0.15,
      0.05,
      2,
      10),
      (
      'installation of the whirpool',
      2017-04-01,
      'Team',

      1,
      '`heavy lifting`',
      '2017-04-01 12:00:03',

      '2017-04-01 15:00:08',
      '00:06:08',
      'no treehouse without whirpool',

      'Nelson forgot to bring the hookers, opening party canceled',
      '`Sous‐utilisation des Compétences`',
      0.9,

      0.05,
      0.05,
      2,
      10)
      ///////// tasks
      INSERT INTO samw_sql1.`tasks`(
      `tas_name`,
      `tas_date`,
      `tas_typology`,

      `tas_repeat`,
      `tas_penalitiy`,
      `tas_start`,

      `tas_stop`,
      `tas_time`,
      `tas_text`,

      `tas_remark`,
      `tas_wastage`,
      `tas_va`,

      `tas_nva`,
      `tas_nvau`,
      `teams_tea_id`,
      `process_pro_id`
      )
      VALUES (
      'resurection of jesus',
      2017-04-16,
      'tas_typology',

      4,
      '`heavy lifting`',
      '2017-01-01 00:00:03',

      '2017-01-04 00:04:08',
      '00:06:08',
      '`tas_text`',

      '`tas_remark`',
      '`tas_wastage`',
      0.5,

      0.25,
      0.25,
      2,
      1),
      (
      'making fun of the children',
      2017-04-12,
      'Worker',

      15,
      '`posture`',
      '2017-01-01 08:00:03',

      '2017-01-01 12:00:08',
      '00:06:08',
      '`it s always fun beeing around the kids`',

      '`buy a bigger present next year`',
      '`Surprocessing ou setup inutiles`',
      0.6,

      0.15,
      0.25,
      2,
      1),
      (
      'april fool s day',
      2017-04-01,
      'Team',

      1,
      '`heavy lifting`',
      '2017-04-01 12:00:03',

      '2017-04-01 15:00:08',
      '00:06:08',
      '`humor is a bitch`',

      '`no more pranks`',
      '`Sous‐utilisation des Compétences`',
      0.3,

      0.15,
      0.55,
      2,
      1)

     */
}

// end of file
