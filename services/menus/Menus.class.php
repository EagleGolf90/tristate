<?php
class Menus {
    private $menuService;

    public function __construct(IMenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function displayMenus() {
        return $this->menuService->displayMenus();
    }

}
?>
