<?php

namespace Model;

class OutputModel extends \W\Model\Model {

    // surcharge construc du parent car il recherche par defauft un primary key "Id"
    public function __construct() {
        parent::__construct();
        $this->setPrimaryKey('pro_id');
    }

    public function sumWastedTimePerProcess($pro_id) {
        $sql = 'SELECT tas_id, SUM(tas_time * tas_nva * tas_repeat) AS tas_timewasted
                FROM tasks
                WHERE process_pro_id =:pro_id';
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindvalue(':pro_id', $pro_id, \PDO::PARAM_INT);
        //$stmt->bindvalue(':limit', $limit, \PDO::PARAM_INT);
        //$stmt = execute();
        //debug($stmt);

        if ($stmt->execute() === false) {
            debug($stmt->errorInfo());
        } else {
            return $stmt->fetchAll();
        }
    }

//    
//    
//      `tas_time` * `tas_va` * `tas_repeat`)   AS `tas_timeVA` 
//        }
//        elseif ($column === 'tas_nva') {
//
//            $sql .= "`tas_nva` * `tas_repeat` 
//                AS tas_timeNVA FROM tasks WHERE `process_pro_id` = :pro_id";
//        }
//        elseif ($column === 'tas_nvau') {
//
//            $sql .= "`tas_nvau` * `tas_repeat` 
//                AS tas_timeNVAU FROM tasks WHERE `process_pro_id` = :pro_id";

    public function calcWastedTimePerTask($pro_id, $column) {
//        $sql = 'SELECT `tas_id`, `tas_time` * ';
        $sql = 'SELECT `tas_time` * ';
        if ($column === 'tas_va') {

            $sql .= "`tas_va` * `tas_repeat` 
                AS tas_timeVA FROM tasks WHERE `process_pro_id` = :pro_id";
        } elseif ($column === 'tas_nva') {

            $sql .= "`tas_nva` * `tas_repeat` 
                AS tas_timeNVA FROM tasks WHERE `process_pro_id` = :pro_id";
        } elseif ($column === 'tas_nvau') {

            $sql .= "`tas_nvau` * `tas_repeat` 
                AS tas_timeNVAU FROM tasks WHERE `process_pro_id` = :pro_id";
        }
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindValue(':pro_id', $pro_id, \PDO::PARAM_INT);
        //$stmt->bindValue(':column', $column, \PDO::PARAM_STR);
//        $stmt->bindParam(':column', "'tas_va'");
        //debug($stmt->bindvalue(':columnName', 'tas_va'));
        //$stmt = execute();
//        debug($sql);
        //$stmt->debugDumpParams();

        if ($stmt->execute() === false) {
            debug($stmt->errorInfo());
        } else {
            return $stmt->fetchAll();
        }
    }

//        tasSql / execTasSql($pro_id, $sql);


    public function tasSql($pro_id, $sql) {
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindValue(':pro_id', $pro_id, \PDO::PARAM_INT);
        //$stmt->bindValue(':column', $column, \PDO::PARAM_STR);
//        $stmt->bindParam(':column', "'tas_va'");
        //debug($stmt->bindvalue(':columnName', 'tas_va'));
        //$stmt = execute();
        debug($sql);
        //$stmt->debugDumpParams();

        if ($stmt->execute() === false) {
            debug($stmt->errorInfo());
        } else {
            return $stmt->fetchAll();
        }
    }

    public function calcWastedTimePerTaskVa($pro_id) {
        $sql = 'SELECT tas_id, tas_time * tas_va * tas_repeat AS tas_timewasted
                FROM tasks
                WHERE process_pro_id =:pro_id';
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindvalue(':pro_id', $pro_id, \PDO::PARAM_INT);
        //$stmt->bindvalue(':columnName', $columnName);
        //$stmt = execute();
        //$stmt->debugDumpParams();
        //debug($stmt);

        if ($stmt->execute() === false) {
            debug($stmt->errorInfo());
        } else {
            return $stmt->fetchAll();
        }
    }

    // remove later
    public function calculateWastedTimePerProcess($pro_id) {
//        $dataProcessRelatedTasks = getOutputFromProcess($pro_id);
//        debug($dataProcessRelatedTasks);
    }

    /*
     * values needed
     * tas_time
     * [tas_start & tas_stop => add later]
     * tas_wastage (unit of the calculated time)
     * tas_nvau (percentage of the tas_time which gives the resulting part of the process in minutes
     * 
     */

    public function getTasksProcessNVA($pro_id) {

        $sql = 'SELECT 
                        `tas_id`,
                        `tas_name`,                        
                        
                        `pro_name`,
                        ROUND(TIME_TO_SEC(`tas_time`)/60) AS `tas_time_input`, 
                        TIMESTAMPDIFF(MINUTE,`tas_start`,`tas_stop`) AS `tas_time_calc`,
                        `tas_nva`

                FROM process
                INNER JOIN tasks ON tasks.process_pro_id = process.pro_id 

                        
                WHERE pro_id= :pro_id';

        $stmt = $this->dbh->prepare($sql);
        $stmt->bindvalue(':pro_id', $pro_id, \PDO::PARAM_INT);
        //debug ($stmt);
        if ($stmt->execute() === false) {
            debug($stmt->errorInfo());
        } else {
            return $stmt->fetchAll();
        }
    }
        public function getNormalizingProcessNVA($pro_id) {

        $sql = 'SELECT 
                        SUM(`tas_nva`)AS `tas_sum_nva`

                FROM process
                INNER JOIN tasks ON tasks.process_pro_id = process.pro_id 

                        
                WHERE pro_id= :pro_id';

        $stmt = $this->dbh->prepare($sql);
        $stmt->bindvalue(':pro_id', $pro_id, \PDO::PARAM_INT);
        //debug ($stmt);
        if ($stmt->execute() === false) {
            debug($stmt->errorInfo());
        } else {
            return $stmt->fetchAll();
        }
    }
//                            (`tas_nva`/(SUM(`tas_nva`))) AS `tas_factor_nva`,
//                        (`tas_nva`*(`tas_nva`/(SUM(`tas_nva`)))) AS `tas_normailzed_nva`,
//                        SUM(
//                            `tas_nva` * `tas_nva`/ (SUM(`tas_nva`)   )
//                                              ) AS `tas_control_nva`
    
    /*  WORKING function!!
      CREATE FUNCTION TimeWasted ( tas_time INT, tas_nva FLOAT, tas_repeat INT)
      RETURNS INT DETERMINISTIC
      RETURN
      (tas_time * tas_nva * tas_repeat)
     */

    // limit contraprocuctive??

    /*
      funny fact :[
      DATE_FORMAT(FROM_UNIXTIME(`tas_start`) , "%d-%m-%Y" ) AS `tas_start_date`,
      ] works in mysql but not through a php mysql requet

     * 
     */
    public function getOutputFromProcess($pro_id, $limit = 50) {

        $sql = 'SELECT `pro_id`,
                        `tas_id`,
                        
                        `pro_name`,
                        `pro_text`,

                        `tas_name`,
                        `tas_date`, 
                        `tas_typology`, 
                        `tas_repeat`, 
                        `tas_penality`,
                        DATE_FORMAT(`tas_start` , "%H:%i" ) AS `tas_start`,
                        DATE_FORMAT(`tas_start` , "%d-%m-%Y" ) AS `tas_start_date`,
                        DATE_FORMAT(`tas_stop` , "%H:%i" ) AS `tas_stop`,
                        DATE_FORMAT(`tas_stop` , "%d-%m-%Y" ) AS `tas_stop_date`,

                        `tas_time`,
                        ROUND(TIME_TO_SEC(`tas_time`)/60) AS `tas_time_input`, 
                        TIMESTAMPDIFF(MINUTE,`tas_start`,`tas_stop`) AS `tas_time_calc`,

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

                        `cou_name`,
                        `worker1`.`wor_id` AS team_worker_id,
                        `unique_worker`.`wor_id` AS unique_worker_id,
                        coalesce (`unique_worker`.`wor_id`,`worker1`.`wor_id`) AS single_unique_worker,
                        
                        (ROUND(TIME_TO_SEC(`tas_time`)/60)  * `tas_repeat`) AS `tas_timeTotal`,
                        (TIMESTAMPDIFF(MINUTE,`tas_start`,`tas_stop`)  * `tas_repeat`) AS `tas_calc_timeTotal`,
                        
                        (ROUND((TIME_TO_SEC(`tas_time`)/60) * `tas_va`)) AS `tas_timeVA`,
                        (ROUND((TIME_TO_SEC(`tas_time`)/60) * `tas_nva`)) AS `tas_timeNVA`,
                        (ROUND((TIME_TO_SEC(`tas_time`)/60) * `tas_nvau`)) AS `tas_timeNVAU`,
                        (ROUND((TIME_TO_SEC(`tas_time`)/60) * `tas_va` * `tas_repeat`)) AS `tas_total_timeVA`,
                        (ROUND((TIME_TO_SEC(`tas_time`)/60) * `tas_nva` * `tas_repeat`)) AS `tas_total_timeNVA`,
                        (ROUND((TIME_TO_SEC(`tas_time`)/60) * `tas_nvau` * `tas_repeat`)) AS `tas_total_timeNVAU`,
                        ROUND((TIMESTAMPDIFF(MINUTE,`tas_start`,`tas_stop`) * `tas_va` * `tas_repeat`)) AS `tas_calc_timeVA`,
                        ROUND((TIMESTAMPDIFF(MINUTE,`tas_start`,`tas_stop`) * `tas_nva` * `tas_repeat`)) AS `tas_calc_timeNVA`,
                        ROUND((TIMESTAMPDIFF(MINUTE,`tas_start`,`tas_stop`) * `tas_nvau` * `tas_repeat`)) AS `tas_calc_timeNVAU`
                         
                         
                        
                         

                FROM process
                INNER JOIN tasks ON tasks.process_pro_id = process.pro_id 
                INNER JOIN constructions ON tasks.constructions_con_id = constructions.con_id
                INNER JOIN city ON constructions.city_cit_id = city.cit_id
                INNER JOIN country ON country.cou_id = city.country_cou_id 

                LEFT JOIN teams ON tasks.teams_tea_id = teams.tea_id
                LEFT JOIN teams_workers ON teams_workers.teams_tea_id= teams.tea_id
                LEFT JOIN workers AS worker1 ON teams_workers.workers_wor_id = worker1.wor_id
                LEFT JOIN workers AS unique_worker ON tasks.workers_wor_id = unique_worker.wor_id

                WHERE pro_id= :pro_id

                LIMIT :limit
                ';

//                Left JOIN workers ON tasks.workers_wor_id = workers.wor_id
        /*

          //debug()
          /* debug
          INNER JOIN workers ON workers.wor_id = tasks.tas_id
          `tas_image1`, `tas_image2`, `tas_image3`,`tas_inserted`, `tas_vocal_message`, `con_inserted`,
          ambiguous: `teams_tea_id`,


          INNER JOIN workers ON workers.tasks_tas_id = tasks.tas_id
          ORDER BY con_created */


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
        $sql = 'SELECT `con_name`, 
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
                    `tas_penality`,  
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

    // export getOutputFromConstructions($con_id)
    // export getOutputFromProcess($pro_id)
    public function exportCsv($array2csv, $filename) {
        if (!empty($array2csv)) {
            array_unshift($array2csv, array_keys($array[0]));
            $filename = $filename;
            //write ()
        }
    }

    public static function floatToPercent($floatToPercent) {
        if (isset($floatToPercent)) {
            // test if value existe then : tas_va * 100
            if (!empty($floatToPercent)) {

                if ($floatToPercent <= 1) {
                    $floatToPercent = 100 * $floatToPercent;
                    return $floatToPercent;
                } else {
                    debug("Error: input to change from float to percent doesn't match expectations! expected: float");
                }
            } else {
                debug('Error: no input to change from float to percent');
            }
        }
        // test if value existe then :  tas_nva * 100
        // test if value existe then :   tas_nvau * 100
        // tas_va + tas_nva + tas_nvau = 100% else error!!
    }

    public function timeDiffMinutes($startDate, $endDate) {
        debug($startDate);
//       $startDate= new DateTime($startDate);
//        $endDate = new DateTime($endDate);
        /*
          $mystartDateTime = \DateTime::createFromFormat('Y-m-d h:i:s', $startDate);
          debug($mystartDateTime);
          //        $startDate = $mystartDateTime->format('m/d/Y h:i:s');
          debug($startDate);

          $myEndDateTime = \DateTime::createFromFormat('Y-m-d h:i:s', $endDate);
          //        $endDate = $myEndDateTime->format('m/d/Y h:i:s');
          $date = date_diff($mystartDateTime  , $myEndDateTime, TRUE);
         */
        $date = ($startDate - $endDate);
        return $date;
    }

    public function myDate($date) {
        debug($date);
        $date = date("d-m-y", strtotime($date));
        return $date;
    }

    // opens a csv file in the public\assets\csv\ folder
    // set multidata to 1 if there are several data parts in one row
    public function readCsv($filename, $multiData = 0) {
        $rows = array();

        // absolute path to PUBLIC dir 
        // FrameworkW users: add following line to your "M:\__xampp\htdocs\construnaire\public\index.php"
        //define ('BASEPATH', dirname(__FILE__)); 

        $filepath = BASEPATH . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'csv' . DIRECTORY_SEPARATOR;
        $filepath .= $filename;
        if (file_exists($filepath)) {
            if ($multiData !== 0) {
                // if there is multiple data seperated by ',' per line in the csv
                $file = fopen($filepath, "r");

                foreach (file($filepath, FILE_IGNORE_NEW_LINES) as $line) {
                    $rows[] = str_getcsv($line);
                }
                return $rows;
                fclose($filepath);
            } else {
                // if there is only one data per line in the csv
                $file = fopen($filepath, "r");
                foreach (file($filepath, FILE_IGNORE_NEW_LINES) as $line) {
                    $rows[] = $line;
                }
                return $rows;
                fclose($filepath);
            }
        } else {
            debug("does not exists");
            // put a flush in here to give the user a nice error message 
        }
    }

    public function getConstructionTypesFromCsv() {


        $constructions = array();

        // use __file__                         >>>>>>>>>>  ask ben<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
        $file = fopen("../public/assets/csv/building.csv", "r");
        //fgetcsv(file,length,separator,enclosure)
        $constructions = \fgetcsv($file, 125, ',');

        return $constructions;

        // import Csv
        // link csv data con_type [INT]
        // return names
    }

    //******************************************************************** VA - NVAU - NVAI *************************************************
    // BETTER ALTERNATIVE BENEATH?? calculate wasted minutes per task (from the overall minutes per task with the percentage of wasted time : $tas_time *$tas_nva )
    // input calculateWastedTimePerTask $tas_nva=>float , $tas_time=> in minutes (has to be calculated before)
    public function calculateWastedTimePerTask($tas_nva, $tas_time) {
        //tas_time has to be calculated before
        // tas_time(of the entire task) is multiplied by the $tas_nva whicch is a float// result = wastedTime for this task
        // I stack (one after the other) the results in an array
        // I return the array of the times in minutes of every task in this process // first value in array corresponds to first task
    }

    // calculate wasted minutes per task (from the overall minutes per task with the percentage of wasted time : $tas_time *$tas_nva )
    // input calculateWastedTimePerTask $tas_id=>INT, $tas_nva=>float , $tas_time=> in minutes (has to be calculated before), $tas_wastage=>STRING
    public function calculateWastedTimePerTaskArray($tas_id, $tas_nva, $tas_time, $tas_wastage) {
        //tas_time has to be calculated before
        // tas_time(of the entire task) is multiplied by the $tas_nva which is a float// result = wastedTime for this task in minutes
        // I stack (one after the other) the results in an array of arrays

        /* format to return :

          array=
          (
          [0]=>array
          (
          [$tas_id_1]
          [$tas_nva_time_1]
          [$tas_wastage_1]
          )
          [1]=>array
          (
          [$tas_id_2]
          [$tas_nva_time_2]
          [$tas_wastage_2]
          )
          )
         */


        // return the array oa arrays with the times in minutes of every task in this process
        // return $WastedTimePerTaskArray
    }

    // calculate the sum of the wasted time NVAI for ONE process
    // input = resunt from funtion calculateWastedTimePerTaskArray ()
    public function oldCalculateWastedTimePerProcess($WastedTimePerTaskArray) {
        // addition of all the values for the wastage in minutes

        /*
          [$tas_nva_time_1] + [$tas_nva_time_2] + [$tas_nva_time_3] + ...
         */

        //return $WastedTimePerProcess 
    }

    // calculate the sum of the time for ONE process -> just a simple value to display
    // input = tas_time (minutes) from innitial array
    public function calculateTotalTimePerProcess($OutputFromProcess/* [tas_time] */) {
        // addition of all the values for the Time in minutes tas_time

        /*
          [$tas_nva_time_1] + [$tas_nva_time_2] + [$tas_nva_time_3] + ...
         */

        //return $timePerProcess 
    }

    // calculate the percentage of the wasted time NVAI (for every task of ONE process) in relation to $WastedTimePerProcess   
    public function todoCalculatePercentWastedTimePerProcess($WastedTimePerTaskArray, $WastedTimePerProcess) {
        // calc the
        //$percentage= (part/whole) *100
        //$tas_nva_percent= ($WastedTimePerTaskArray/$WastedTimePerProcess) *100

        /* format to return :

          array=
          (
          [0]=>array
          (
          [$tas_id_1]
          [$tas_nva_time_1]
          [$tas_wastage_1]
          [$tas_nva_percent_1]
          )
          [1]=>array
          (
          [$tas_id_2]
          [$tas_nva_time_2]
          [$tas_wastage_2]
          [$tas_nva_percent_2]
          )
          )
         */

        //
    }

    ///////////////////////////////////////////// Todo s /////////////////////////////////
    /*
      public function calcTime() {

      // if isset tas_start & tas_stop & tas_time  => recalculate  tas_time -> point out difference if >10min
      // if isset tas_start & tas_stop             => calculate  tas_time
      // if isset tas_start            & tas_time  => calculate  tas_stop
      // if isset             tas_stop & tas_time  => calculate  tas_start
      // add values to db  , recalculated values in brackets concatenated (possible? db restrictions value type?)
     * 
     * 
     * sql can do the calculation!!!!
     * function sql 
     * 
      }




      public function importCsvToDb() {
      // needed? => nice 2 have!!

      }

      public function exportXls() {
      // export getOutputFromConstructions($con_id)
      // export getOutputFromProcess($pro_id)

      }
     */
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
      ('Imaginiville', 4),
      ('Springfield', 4)
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
      ('Top Dogs', 'Named after the famous WORMS Team', 2),
      ('Everegreen Terrasse Team', 'inner circle of the simpsons cast', 10)

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
      `tas_penality`,
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
      `tas_penality`,
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
      `tas_penality`,
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
     * 
     * 
     * 
     * SELECT wor_lastname 


      FROM teams
      INNER JOIN teams_workers ON teams.tea_id = teams_workers.teams_tea_id
      INNER JOIN workers ON teams_workers.workers_wor_id = workers.wor_id


      WHERE tea_id= 1


     */
}

// end of file
