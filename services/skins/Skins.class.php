<?php
class Skins {
    private $skinsService;

    public function __construct(ISkinsService $skinsService)
    {
        $this->skinsService = $skinsService;
    }

    public function getSkinsParticipants() {
        return $this->skinsService->getSkinsParticipants();
    }

    public function displaySkinsParticipants() {
        return $this->skinsService->displaySkinsParticipants();
    }

    public function checkSkins($skinsRecord) {
        return $this->skinsService->checkSkins($skinsRecord);
    }

    public function addSkins($skinsRecord) {
        $ret = $this->skinsService->addSkins($skinsRecord);
    }

    public function deleteSkins($roundPlayed, $playerID) {
        $this->skinsService->deleteSkins($roundPlayed, $playerID);
    }

}
?>
