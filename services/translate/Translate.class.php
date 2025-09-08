<?php
class Translate {
    private $translateService;

    public function __construct(ITranslateService $translateService)
    {
        $this->translateService = $translateService;
    }

    public function getEventById($event) {
        return $this->translateService->getEventById($event);
    }

}
?>
