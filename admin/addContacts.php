<?php
include('../preload.php');
include(CLASSES . 'golf_scores.class.php');
include(HTML . 'beginHTML.php');
?>

<form class="regForm" action="add_contact.php" method="post">
  <div class="container-form">
    <?php include(MENUS . 'areturn_menu.php'); ?>

    <div class="row">
      <div class="col-md-12 text-center">
        <h3>Add Contact</h3>
      </div>
    </div>

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
    <div class="row">
      <div class="col-md-12 text-center">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
      </div>
    </div>
  </div>
</form>

<?php include(HTML . 'endHTML.php'); ?>
