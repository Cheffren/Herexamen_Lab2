<?php
require_once('../bootstrap.php');
class Calendar {
  private $pdo = null;
  private $stmt = null;
  public $error = "";

  function __construct () {
    try {
      $this->pdo = DB::getInstance();
    }
    catch (Exception $ex){
      exit($ex->getMessage());
    }
  }

  //SQL statement uitvoeren
  function exec ($sql, $data=null) {
    try {
      $this->stmt = $this->pdo->prepare($sql);
      $this->stmt->execute($data);
      return true;
    }
    //error opvangen als er iets is mis gegaan tijdens het uitvoeren van de sql statement
    catch (Exception $ex) {
      $this->error = $ex->getMessage();
      return false;
    }
  }

  //Event opslaan
  function save ($start, $end, $txt, $color, $id=null) {
    //START & END DATE QUICK CHECK
    $uStart = strtotime($start);
    $uEnd = strtotime($end);
    if ($uEnd < $uStart) {
      $this->error = "End date cannot be earlier than start date";
      return false;
    }

    //SQL - INSERT OR UPDATE
    if ($id==null) {
      $sql = "INSERT INTO `events` (`evt_start`, `evt_end`, `evt_text`, `evt_color`) VALUES (?,?,?,?)";
      $data = [$start, $end, $txt, $color];
    } else {
      $sql = "UPDATE `events` SET `evt_start`=?, `evt_end`=?, `evt_text`=?, `evt_color`=? WHERE `evt_id`=?";
      $data = [$start, $end, $txt, $color, $id];
    }

    //EXECUTE
    return $this->exec($sql, $data);
  }

  //DELETE EVENT
  function del ($id) {
    return $this->exec("DELETE FROM `events` WHERE `evt_id`=?", [$id]);
  }

  //GET EVENTS FOR SELECTED MONTH
  function get ($month, $year) {
    //FIST & LAST DAY OF MONTH
    $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
    $dayFirst = "{$year}-{$month}-01 00:00:00";
    $dayLast = "{$year}-{$month}-{$daysInMonth} 23:59:59";

    //GET EVENTS
    if (!$this->exec(
      "SELECT * FROM `events` WHERE (
        (`evt_start` BETWEEN ? AND ?)
        OR (`evt_end` BETWEEN ? AND ?)
        OR (`evt_start` <= ? AND `evt_end` >= ?)
      )", [$dayFirst, $dayLast, $dayFirst, $dayLast, $dayFirst, $dayLast]
    )) { return false; }

    // $events = [
    //  "e" => [ EVENT ID => [DATA], EVENT ID => [DATA], ... ],
    //  "d" => [ DAY => [EVENT IDS], DAY => [EVENT IDS], ... ]
    // ]
    $events = ["e" => [], "d" => []];
    while ($row = $this->stmt->fetch()) {
      $eStartMonth = substr($row["evt_start"], 5, 2);
      $eEndMonth = substr($row["evt_end"], 5, 2);
      $eStartDay = $eStartMonth==$month
                 ? (int)substr($row["evt_start"], 8, 2) : 1 ;
      $eEndDay = $eEndMonth==$month
               ? (int)substr($row["evt_end"], 8, 2) : $daysInMonth ;
      for ($d=$eStartDay; $d<=$eEndDay; $d++) {
        if (!isset($events["d"][$d])) { $events["d"][$d] = []; }
        $events["d"][$d][] = $row["evt_id"];
      }
      $events["e"][$row["evt_id"]] = $row;
      $events["e"][$row["evt_id"]]["first"] = $eStartDay;
    }
    return $events;
  }
}
//Nieuw calender object maken
$_CAL = new Calendar();

/*
  We hebben deze tutorial gevolgt: https://code-boxx.com/simple-php-calendar-events/ 
*/