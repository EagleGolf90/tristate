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
}
?>
