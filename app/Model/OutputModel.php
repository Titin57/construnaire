<?php

namespace Model;

class OutputModel extends \W\Model\Model {

    // surcharge construc du parent car il recherche par defauft un primary key "Id"
    public function __construct() {
        parent::__construct();
        $this->setPrimaryKey('pro_id');
    }

    public function getOutput($pro_id, $limit = 5) {
        $sql = '
                SELECT *
                FROM process
                INNER JOIN tasks ON process.pro_id = tasks.process_pro_id
                INNER JOIN workers ON workers.tasks_tas_id = tasks.tas_id
                INNER JOIN teams ON teams.tea_id = tasks.teams_tea_id
                INNER JOIN constructions ON constructions.con_id = teams.constructions_con_id
                INNER JOIN city ON city.cit_id = constructions.city_cit_id
                INNER JOIN country ON country.cou_id = city.country_cou_id            
                WHERE pro_id= :pro_id
                ORDER BY con_created
                LIMIT :limit
                ';
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
