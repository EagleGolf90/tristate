<?php
interface ICourseService {
    public function getCourseInfo();
    public function getCourseDetails($courseID);
}

class CourseService implements ICourseService {
    private $sqlTable;

    public function __construct(SQLTable $sqlTable) {
        $this->sqlTable = $sqlTable;
    }

    public function getCourseInfo() {
        return $this->sqlTable->load('loadCourseInfo', array());
    }

    public function getCourseDetails($courseID) {
        return $this->sqlTable->load('loadCourseDetails', array($courseID));
    }
}
?>
