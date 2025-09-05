<?php
include(CONTACTS_PATH . 'Contacts.class.php');
include(CONTACTS_PATH . 'ContactService.class.php');

$sqlTable = new SQLTable();
$contactService = new ContactService($sqlTable);

$contacts = new Contacts($contactService);
?>
