<?php
class Pairings {
    private $pairingService;

    public function __construct(IPairingService $pairingService)
    {
        $this->pairingService = $pairingService;
    }

    public function getPairings($roundPlayed) {
        return $this->pairingService->getPairings($roundPlayed);
    }

    public function displayPairings($roundPlayed) {
        return $this->pairingService->displayPairings($roundPlayed);
    }

    public function calculateGroupSize() {
        return $this->pairingService->calculateGroupSize();
    }

}
?>
