<?php
interface IHoleDetailsService {
    public function getHoleDetailsById($courseID);
    public function getHoleDetailsByRound();
    public function getHoleHandicaps();
}

class HoleDetailsService implements IHoleDetailsService {
    private $sqlTable;

    public function __construct(SQLTable $sqlTable) {
        $this->sqlTable = $sqlTable;
    }

    public function getHoleDetailsById($courseID) {
        return $this->sqlTable->load('loadHoleDetails', array($courseID));
    }

    public function getHoleDetailsByRound() {
        return $this->sqlTable->load('loadCourseDetails', array());
    }

    public function getHoleHandicaps() {
        $rows = $this->getHoleDetailsByRound();

        $handicapTableCell = '';
        foreach ($rows as $row) {
        if ($row['HoleNumber'] == 10) $handicapTableCell .= '<td class="text-center">&nbsp;</td>';
            $handicapTableCell .= '<td class="scores">' . $row['Handicap'] . '</td>';
        }
        $handicapTableCell .= '<td class="text-center">&nbsp</td><td class="text-center">&nbsp</td>';

        return $handicapTableCell;
    }
}
?>
