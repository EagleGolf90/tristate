<?php
include('../preload.php');

include(CONCRETE_PATH . 'Presenter.class.php');
$presenter = new Presenter();

include(LOAD_PATH . 'loadContacts.php');

include(HTML . 'beginHTML.php');
include(MENUS . 'navbar.php');
?>

<form class="regForm" action="add.php" method="post">
  <input type="text" name="page" value="contacts" hidden>
  <div class="container-form">
    <?php $presenter->formatHtmlString('<h3>Add Contact</h3>'); ?>

    <div row="row">
      <div class="col-md-12">
        <div class="form-floating mb-3">
          <input type="text" name="firstName" class="form-control" id="floatingInput">
          <label for="firstName">First Name</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" name="lastName" class="form-control" id="floatingInput">
          <label for="lastName">Last Name</label>
        </div>
        <div class="form-floating mb-3">
          <select name="org_name" class="form-select">
            <option selected>Select one</option>
            <option value="1">Indiana</option>
            <option value="2">Kentucky</option>
            <option value="3">Ohio</option>
          </select>
          <label for="org_name">Organization</label>
        </div>
      </div>
    </div>

    <?php include(INCLUDES . 'submit_button.php'); ?>

    <hr/>
    <div class="row">
      <div class="col-md-12">
        <div id="tabs">
          <ul>
            <li><a href="#tabs-1">Indiana</a></li>
            <li><a href="#tabs-2">Kentucky</a></li>
            <li><a href="#tabs-3">Ohio</a></li>
          </ul>
          <?php include('displayContacts.php'); ?>
        </div>
      </div>
    </div>
  </div>
</form>

<?php include(HTML . 'endHTML.php'); ?>
