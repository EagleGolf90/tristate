<?php
interface IMenuService {
    public function displayMenus();
}

class MenuService implements IMenuService {
    private $sqlTable;

    public function __construct(SQLTable $sqlTable) {
        $this->sqlTable = $sqlTable;
    }

    public function displayMenus() {
        return $this->sqlTable->load('loadAdminMenus', array());
    }

}
?>
