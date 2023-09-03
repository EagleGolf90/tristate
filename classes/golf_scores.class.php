<?php
class GolfScores {
  private $sqlTable;
  private $courseInfo;
  private $courseDetails;
  private $players;
  private $roundPlayed;
  private $roundID;
  private $courseID;
  private $finalCut = 0;

  public function __construct() {
    $this->sqlTable = new SQLTable();
    $this->courseInfo = array();
    $this->courseDetails = array();
  }

  public function getCourseInfo($roundPlayed)
  {
    $this->roundPlayed = $roundPlayed;
    $this->loadCourseInfo();
    return $this->courseInfo;
  }

  public function getCourseDetails()
  {
    $this->loadCourseDetails();
    return $this->courseDetails;
  }

  public function getRoundPlayed() {
    $rs = $this->sqlTable->load('getRoundInfo', array('(select MIN(RoundPlayed) from rounds where DatePlayed >= CURRENT_DATE())'));
    $roundPlayed = 1;
    foreach ($rs as $r) $roundPlayed = $r['RoundPlayed'];
    return $roundPlayed;
  }

  public function getRoundID($roundPlayed) {
    $this->roundPlayed = $roundPlayed;
    $this->loadRoundID();
    return $this->roundID;
  }

  public function getTeamScores() { return $this->sqlTable->load('loadTeams', array()); }

  public function getPlayers($roundPlayed)
  {
    $this->roundPlayed = $roundPlayed;
    $this->loadRoundID();
    $this->loadListOfPlayers('loadListOfPlayers', array($roundPlayed));
    return $this->players;
  }

  public function getGroups($roundPlayed, $group) {
    $this->roundPlayed = $roundPlayed;
    $this->loadRoundID();
    $this->loadListOfPlayers('loadPlayersGroup', array($roundPlayed, $group));
    return $this->players;
  }

  public function getFinalCut() {
    $this->loadFinalCut();
    return $this->finalCut;
  }

  public function getParticipants($roundPlayed) { return $this->sqlTable->load('loadParticipants', array($roundPlayed)); }
  public function displayParticipants($roundPlayed) { return $this->sqlTable->load('displayParticipants', array($roundPlayed)); }

  public function displayContacts() { return $this->sqlTable->load('displayContacts', array()); }

  public function getPairings($roundPlayed) { return $this->sqlTable->load('loadPairings', array($roundPlayed)); }
  public function displayPairings($roundPlayed) { return $this->sqlTable->load('displayPairings', array($roundPlayed)); }

  public function getRounds() { return $this->sqlTable->load('loadRounds', array()); }
  public function getLeaderboard() { return $this->sqlTable->load('loadLeaderboard', array()); }
  public function getTwoDayLeaderboard() { return $this->sqlTable->load('loadTwoDayLeaderboard', array()); }
  public function checkSkins($roundPlayed) { return $this->sqlTable->load('checkSkins', array($roundPlayed)); }

  public function addScores() {
    $players = $_POST['player'];
    $round_played = $_POST['roundPlayed'];
    $round_id = $_POST['roundID'];

    foreach ($players as $key => $value) {
      $player_id = $value;

      $tag_name = $this->concatenateZeros($value);
      $score_id = $_POST['scores' . $tag_name];

      $hole = 1;
      $totalScore = 0;

      foreach ($score_id as $key => $value) {
        $totalScore += $value;
        $parm = array($player_id, $round_played, $round_id, $hole, $value);
        $ret = $this->sqlTable->execute('addScores', $parm);
        $hole++;
      }

      $parm = array($round_played, $player_id, $totalScore);
      $ret = $this->sqlTable->execute('updateScores', $parm);
      if ($ret == 1) echo 'Player ' . $player_id . ' scores ' . $totalScore . ' is submitted.<br/>';
    }
  }

  public function addNames() { $ret = $this->sqlTable->execute('addNames', array($this->generateID(), $_POST['firstName'], $_POST['lastName'], $_POST['org_name'])); }
  public function addParticipants() { $ret = $this->sqlTable->execute('addParticipants', array($_POST['roundPlayed'], $_POST['playerID'])); }
  public function addPairings() { $ret = $this->sqlTable->execute('addPairings', array($_POST['roundPlayed'], 1, strtoupper($_POST['group']), $_POST['playerID'])); }
  public function deletePairings($roundPlayed, $group) { return $this->sqlTable->execute('deletePairings', array($roundPlayed, $group)); }

  private function concatenateZeros($value) {
    $temp_value = '';
    if ($value < 100) $temp_value = '0' . $value;
    if ($value < 10) $temp_value = '00' . $value;
    return $temp_value;
  }

  private function loadFinalCut() {
    $rows = $this->sqlTable->load('loadFinalCut', array());
    foreach ($rows as $row) $this->finalCut = $row['FinalCut'];
  }

  private function loadCourseInfo() {
    $rows = $this->sqlTable->load('loadCourseInfo', array($this->roundPlayed));
    foreach ($rows as $row) {
      $this->courseID = $row['CourseID'];

      $this->courseInfo[] = array(
                 $row['CourseID'],
                 $row['CourseName'],
                 $row['DatePlayed'],
                 $row['City'],
                 $row['State'],
                 $row['CourseRating'],
                 $row['SlopeRating']);
    }
  }

  private function loadCourseDetails() {
    $rows = $this->sqlTable->load('loadCourseDetails', array($this->courseID));
    foreach ($rows as $row) $this->courseDetails[] = array($row['Par'], $row['Yards'], $row['Handicap']);
  }

  private function loadRoundID() {
    $rows = $this->sqlTable->load('getRoundInfo', array($this->roundPlayed));
    foreach ($rows as $row) $this->roundID = $row['RoundID'];
  }

  private function loadListOfPlayers($sql_name, $parm) {
    $this->players = array();
    $rows = $this->sqlTable->load($sql_name, $parm);
    foreach ($rows as $row) $this->players[] = array($row['GroupID'], $row['FullName'], $row['PlayerID'], $row['TotalScore']);
  }

  private function generateID() {
    $rs = $this->sqlTable->load('getUniqueID', array(BUS_UNIT, 'PlayerID'));

    $id = 1;
    foreach ($rs As $r) $id = $r['UniqueID'] + 1;

    $ret = $this->sqlTable->execute('updateUniqueID', array(BUS_UNIT, 'PlayerID', $id));

    return $id;
  }
}
?>