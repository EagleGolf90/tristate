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
    if (PAGE_NAME != 'add_contact.php') {
      $this->courseInfo = array();
      $this->courseDetails = array();
      $this->load();
    }
  }

  public function getCourseInfo() { return $this->courseInfo; }
  public function getCourseDetails() { return $this->courseDetails; }
  public function getPlayers() { return $this->players; }
  public function getRoundPlayed() { return $this->roundPlayed; }
  public function getRoundID() { return $this->roundID; }
  public function getRounds() { return $this->sqlTable->load('loadRounds', array()); }

  public function getGroups($roundPlayed, $group) {
    $this->loadListOfPlayers('loadPlayersGroup', array($roundPlayed, $group));
    return $this->players;
  }

  public function getLeaderboard() { return $this->sqlTable->load('loadLeaderboard', array($this->roundPlayed)); }
  public function getTwoDayLeaderboard() { return $this->sqlTable->load('loadTwoDayLeaderboard', array()); }

  private function load() {
    $this->loadSetup();
    $this->loadCourseInfo();
    $this->loadCourseDetails();
    $this->loadListOfPlayers('loadListOfPlayers', array($this->roundPlayed));
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
    foreach ($rows as $row) $this->players[] = array($row['GroupID'], $row['FullName'], $row['PlayerID'], $row['TotalScore']);
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
      if ($ret == 1) {
        echo 'Player ' . $player_id . ' scores ' . $total . ' is submitted.<br/>';
      }
    }
  }

  private function generateID() {
    $rs = $this->sqlTable->load('getUniqueID', array(BUS_UNIT, 'PlayerID'));
    $id = 1;

    foreach ($rs As $r) $id = $r['UniqueID'] + 1;

    $parm = array(BUS_UNIT, 'PlayerID', $id);
    $ret = $this->sqlTable->execute('updateUniqueID', $parm);

    return $id;
  }

  public function addNames() {
    $player_id = $this->generateID();
    $parm = array($player_id, $_POST['firstName'], $_POST['lastName'], $_POST['org_name']);
    $ret = $this->sqlTable->execute('addNames', $parm);
  }
}
?>