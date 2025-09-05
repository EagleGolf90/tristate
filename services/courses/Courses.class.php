<?php
class Courses {
    private $courseService;

    public function __construct(ICourseService $courseService)
    {
        $this->courseService = $courseService;
        $this->holeDetailsService = $holeDetailsService;
    }

    public function getCourseInfo() {
        return $this->courseService->getCourseInfo();
    }

    public function getCourseDetails($courseID) {
        return $this->courseService->getCourseDetails($courseID);
    }

}
?>
