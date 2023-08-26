<?php
class GolfScores {
  private $sqlTable;
  private $courseInfo;
  private $courseDetails;
  private $players;

  public function __construct() {
    $this->sqlTable = new SQLTable();
    $this->courseInfo = array();
    $this->courseDetails = array();
    $this->load();
  }

  public function getCourseInfo() { return $this->courseInfo; }
  public function getCourseDetails() { return $this->courseDetails; }
  public function getPlayers() { return $this->players; }

  public function getGroups($group) {
    $this->loadListOfPlayers('loadPlayersGroup', array($group));
    return $this->players;
  }

  private function load() {
    $this->loadCourseInfo();
    $this->loadCourseDetails();
    $this->loadListOfPlayers('loadListOfPlayers', array());
  }

  private function loadListOfPlayers($sql_name, $parm) {
    $this->players = array();
    $rows = $this->sqlTable->load($sql_name, $parm);
    foreach ($rows as $row) $this->players[] = array($row['GroupID'], $row['FullName'], $row['PlayerID']);
  }

  private function loadCourseInfo() {
    $rows = $this->sqlTable->load('loadCourseInfo', array());
    foreach ($rows as $row) {
      $this->courseInfo[] = array(
                 $row['CourseID'],
                 $row['CourseName'],
                 $row['StartDate'],
                 $row['City'],
                 $row['State'],
                 $row['CourseRating'],
                 $row['SlopeRating']);
    }
  }

  private function loadCourseDetails() {
    $rows = $this->sqlTable->load('loadCourseDetails', array());
    foreach ($rows as $row) {
      $this->courseDetails[] = array($row['Par'], $row['Yards']);
    }
  }

  public function displayScores() {
    $players = $_POST['player'];
    foreach ($players as $key => $value) {
      echo "Player ID: " . $value . "<br>";
    
      $player_id = '';
      if ($value < 100) $player_id = '0' . $value;
      if ($value < 10) $player_id = '00' . $value;
    
      $score_id = $_POST['scores' . $player_id];
      $all_scores = '';
      $totals = 0;
    
      foreach ($score_id as $key => $value) {
        if ($all_scores != '') $all_scores .= ', ';
        $all_scores .= $value;
        $totals += $value;
      }
      echo 'Scores: ' . $all_scores . '<br/>Total: ' . $totals . '<br/>';
    }
  }
}
?>
