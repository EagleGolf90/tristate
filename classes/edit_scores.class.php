<?php
class EditScores {
  private $sqlTable;

  public function __construct() { $this->sqlTable = new SQLTable(); }

  public function () {
    $rows = $this->sqlTable->load('', array());
  }

  public function getPlayers($roundPlayed) { return $this->sqlTable->load('loadPlayers', array($roundPlayed)); }
}
?>
