<?php
class GolfScores {
  private $sqlTable;
  private $courseInfo;
  private $courseDetails;
  private $players;
  private $roundPlayed;
  private $roundID;
  

  public function __construct() {
    $this->sqlTable = new SQLTable();
    $this->courseInfo = array();
    $this->courseDetails = array();
    $this->load();
  }

  public function getCourseInfo() { return $this->courseInfo; }
  public function getCourseDetails() { return $this->courseDetails; }
  public function getPlayers() { return $this->players; }
  public function getRoundPlayed() { return $this->roundPlayed; }
  public function getRoundID() { return $this->roundID; }

  public function getGroups($group) {
    $this->loadListOfPlayers('loadPlayersGroup', array($group));
    return $this->players;
  }

  private function load() {
    $this->loadCourseInfo();
    $this->loadCourseDetails();
    $this->loadListOfPlayers('loadListOfPlayers', array());
    $this->loadSetup();
  }

  private function loadSetup() {
    $rows = $this->sqlTable->load('getRounds', array());
    foreach ($rows as $row) {
      $this->roundPlayed = $row['RoundPlayed'];
      $this->roundID = $row['RoundID'];
    }
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

  public function addScores() {
    $players = $_POST['player'];
    $round_played = $_POST['roundPlayed'];
    $round_id = $_POST['roundID'];

    foreach ($players as $key => $value) {
      $player_id = $value;

      $tag_name = '';
      if ($value < 100) $tag_name = '0' . $value;
      if ($value < 10) $tag_name = '00' . $value;
    
      $score_id = $_POST['scores' . $tag_name];
      $hole = 1;
      $total = 0;

      foreach ($score_id as $key => $value) {
        $total += $value;
        $parm = array($player_id, $round_played, $round_id, $hole, $value);
        $ret = $this->sqlTable->execute('addScores', $parm);
        $hole++;
      }

      $parm = array($round_played, $player_id, $total);
      $ret = $this->sqlTable->execute('updateScores', $parm);
    }
  }
}
?>
