<?php
class Contacts {
    private $contactService;

    public function __construct(IContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    public function getAllContacts() {
        return $this->contactService->getAllContacts();
    }

    public function getContactById($id) {
        return $this->contactService->getContactById($id);
    }

}
?>
