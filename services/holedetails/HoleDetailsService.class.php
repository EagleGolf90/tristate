<?php
interface IHoleDetailsService {
    public function getHoleDetailsById($courseID);
}

class HoleDetailsService implements IHoleDetailsService {
    private $sqlTable;

    public function __construct(SQLTable $sqlTable) {
        $this->sqlTable = $sqlTable;
    }

    public function getHoleDetailsById($courseID) {
        return $this->sqlTable->load('loadCourseDetails', array($courseID));
    }

}
?>
