<?php
class Scores {
    private $courseService;
    private $playerService;
    private $scoreService;

    public function __construct(
             ICourseService $courseService,
             IPlayerService $playerService,
             IScoreService $scoreService)
    {
        $this->courseService = $courseService;
        $this->playerService = $playerService;
        $this->scoreService = $scoreService;
    }

    public function getCourseInfo($roundPlayed) {
        return $this->courseService->getCourseInfo($roundPlayed);
    }

    public function getPlayers($roundPlayed) {
        return $this->playerService->getPlayers($roundPlayed);
    }

    public function getTeamScores($org_id) {
        return $this->scoreService->getTeamScores($org_id);
    }

    public function getAllScores() {
        return $this->sqlTable->load('loadAllScores', array($roundPlayed));
    }

    public function getScoresByRound($roundPlayed) {
        return $this->scoreService->getScoresByRound($roundPlayed);
    }

    public function addScores($scoreData) {
        return $this->scoreService->addScores($scoreData);
    }

    public function getRounds() {
        return $this->scoreService->getRounds();
    }

    public function getCurrentRound() {
        return $this->scoreService->getCurrentRound();
    }

}
?>
