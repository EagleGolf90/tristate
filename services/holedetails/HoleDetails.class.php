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

    public function getHoleDetailsByRound() {
        return $this->holeDetailsService->getHoleDetailsByRound();
    }

    public function getHoleHandicaps() {
        return $this->holeDetailsService->getHoleHandicaps();
    }
}
?>
