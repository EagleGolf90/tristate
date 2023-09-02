<?php
include('../preload.php');
include(INCLUDES . 'initialize_golf.php');
$contacts_row = $golf->displayContacts();

include(HTML . 'beginHTML.php');
?>

<form class="regForm" action="add_contact.php" method="post">
  <div class="container-form">
    <?php
    include(MENUS . 'return_menu.php');
    $display_message = '<h3>Add Contact</h3>';
    include(INCLUDES . 'display_message.php');
    ?>

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
        <table class="table table-bordered">
<?php
$count = 0;
foreach ($contacts_row as $contact) {
?>
        <tr>
          <td><?php echo $contact['LastName'] . ', ' . $contact['FirstName']; ?></td>
          <td><?php echo $contact['Organization']; ?></td>
        </tr>
<?php
  $count += 1;
}
?>
        <tr><td colspan="2"><b>Total: <?php echo $count; ?></b></td></tr>
        </table>
      </div>
    </div>
  </div>
</form>

<?php include(HTML . 'endHTML.php'); ?>
