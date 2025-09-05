<?php
interface IContactService {
    public function getAllContacts();
    public function getContactById($id);
    public function displayContacts($org_id);
}

class ContactService implements IContactService {
    private $sqlTable;

    public function __construct(SQLTable $sqlTable) {
        $this->sqlTable = $sqlTable;
    }

    public function getAllContacts() {
        return $this->sqlTable->load('getAllContacts', array());
    }

    public function getContactById($id) {
        return $this->sqlTable->load('getContactsById', array($id));
    }

    public function displayContacts($org_id) {
        return $this->sqlTable->load('displayContacts', array($org_id));
    }

}
?>
