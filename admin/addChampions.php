<?php
include('../preload.php');
include(INCLUDES . 'initialize_golf.php');
$champions = $golf->getChampions();
$champions_row = $golf->displayChampions();

include(HTML . 'beginHTML.php');
include(MENUS . 'navbar.php');
?>

<form class="regForm" action="add.php" method="post">
  <input type="text" name="page" value="champions" hidden>
  <div class="container-list">
    <?php
    $display_message = '<h3>Add Champion</h3>';
    include(INCLUDES . 'display_message.php');
    ?>

    <div class="row">
      <div class="col-md-12">
        <div class="form-floating mb-3" required>
          <select name="year_played" class="form-control">
            <option value="" selected>Select one</option>
<?php for ($x = 0; $x < 32; $x++) { ?>
            <option value="<?php echo (1992 + $x); ?>"><?php echo (1992 + $x); ?></option>
<?php } ?>
          </select>
          <label for="year_played">Year Played</label>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="form-floating mb-3" required>
          <select name="course_id" class="form-control">
            <option value="" selected>Select one</option>
<?php $courses = $golf->getCourses();
      foreach ($courses as $course) {
?>
            <option value="<?php echo $course['CourseID']; ?>"><?php echo $course['CourseName']; ?></option>
<?php } ?>
          </select>
          <label for="course_id">Course Name</label>
        </div>
      </div>
    </div>

    <div row="row">
      <div class="col-md-12">
        <div class="form-floating mb-3">
          <select name="playerID" class="form-control" required>
            <option value="" selected>Select one</option>
<?php
foreach ($participants as $participant) {
  $name_value = $champion['LastName'] . ', ' . $participant['FirstName'];
?>
            <option value="<?php echo $participant['PlayerID']; ?>"><?php echo $name_value; ?></option>
<?php
}
?>
          </select>
          <label for="playerID">Name</label>
        </div>
      </div>
    </div>

    <div row="row">
      <div class="col-md-12">
        <div class="form-floating mb-3">
          <input type="number" name="winner_score" class="form-control" required>
          <label for="winner_score">Winner Score</label>
        </div>
      </div>
    </div>

    <?php include(INCLUDES . 'submit_button.php'); ?>

    <hr/>

    <?php include('displayChampions.php'); ?>
  </div>
</form>

<?php include(HTML . 'endHTML.php'); ?>
