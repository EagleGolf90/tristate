<?php
class HoleDetails {
    private $holeDetailsService;

    public function __construct(IHoleDetailsService $holeDetailsService)
    {
        $this->holeDetailsService = $holeDetailsService;
    }

    public function getHoleDetailsById($courseID) {
        return $this->holeDetailsService->getHoleDetailsById($courseID);
    }

}
?>
