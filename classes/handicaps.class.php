<?php
class Handicap {
  private $sqlTable;
  private $dateEntered;

  public function __construct() { $this->sqlTable = new SQLTable(); }

  private function checkHandicap() {
    $parm = array($_POST['groupID'], $_POST['playerID'], $this->dateEntered);
    $rows = $this->sqlTable->load('checkHandicaps', $parm);
    foreach ($rows as $row) return false;
    return true;
  }

  private function calculateHandicap() {
    $score = intval($_POST['score']);
    $course_rating = floatval($_POST['course_rating']);
    $slope_rating = intval($_POST['slope_rating']);
    return ((($score-$course_rating)*113)/$slope_rating);
  }

  public function AddHandicap() {
    $tempDate = date_create($_POST['date_entered']);
    $this->dateEntered = date_format($tempDate, "Y-m-d");
    $handicap = $this->calculateHandicap();

    $parm = array($_POST['groupID'], $_POST['playerID'], $this->dateEntered, $_POST['score'], $_POST['course_rating'], $_POST['slope_rating'], $handicap);
    $flag = 'N';
    if ($this->checkHandicap()) {
      $ret = $this->sqlTable->execute('AddHandicap', $parm);
      $flag = 'Y';
    }

    return $flag;
  }
}
?>
