<?php
interface IContactService {
    public function getAllContacts();
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
        return $this->sqlTable->load('getContactById', array($id));
    }

}
?>
