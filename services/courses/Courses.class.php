<?php
class Courses {
    private $courseService;
    private $holeDetailsService;

    public function __construct(
              ICourseService $courseService,
              IHoleDetailsService $holeDetailsService)
    {
        $this->courseService = $courseService;
        $this->holeDetailsService = $holeDetailsService;
    }

    public function getCourseById($courseID) {
        return $this->courseService->getCourseById($courseID);
    }

    public function getHoleDetailsById($courseID) {
        return $this->holeDetailsService->getHoleDetailsById($courseID);
    }

}
?>
