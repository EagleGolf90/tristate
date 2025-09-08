<?php
interface ITranslateService {
    public function getEventById($event);
}

class TranslateService implements ITranslateService {
    private $sqlTable;

    public function __construct(SQLTable $sqlTable) {
        $this->sqlTable = $sqlTable;
    }

    public function getEventById($event) {
        return $this->sqlTable->load('loadEventById', array($event));
    }

}
?>
