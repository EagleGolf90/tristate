<?php
include('../preload.php');

include(CLASSES . 'golf_scores.class.php');
$golf = new GolfScores();

$courseInfo = $golf->getCourseInfo();
$holes = $golf->getCourseDetails();

// $course_name = 'Willows';
// $date_played = 'Saturday, July 22, 2023';
// $players = array("001" => "Brian Timberlake", "027" => "Jeff Cecil", "018" => "Mark Flaherty");
// $holes = array(4, 3, 4, 4, 3, 5, 4, 4, 5, 4, 3, 5, 4, 4, 4, 4, 3, 5);

// echo 'Course ID: ' . $courseInfo[0][0] . '<br/>';
// echo 'Course Name: ' . $courseInfo[0][1] . '<br/>';
// echo 'Start Date: ' . $courseInfo[0][2] . '<br/>';
// echo 'City: ' . $courseInfo[0][3] . '<br/>';
// echo 'State: ' . $courseInfo[0][4] . '<br/>';
// echo 'Course Rating: ' . $courseInfo[0][5] . '<br/>';
// echo 'Slope Rating: ' . $courseInfo[0][6] . '<br/>';

$course_name = $courseInfo[0][1];
$temp_date_played = date_create($courseInfo[0][2]);
$date_played = date_format($temp_date_played, "l, F d, Y");
$location = $courseInfo[0][3] . ', ' . $courseInfo[0][4];
$players = array("001" => "Brian Timberlake", "027" => "Jeff Cecil", "018" => "Mark Flaherty", "013" => "Ben Young");
//$holes = $courseDetails;

foreach($age as $x => $val) {
  echo "$x = $val<br>";
}

include(HTML . 'beginHTML.php');
?>

<div class="container">
  <form class="form-signin">
    <div class="text-center mb-4">
      <h1 class="ctr"><?php echo $course_name; ?></h1>
      <h5 class="ctr"><?php echo $location; ?></h5>
      <h5 class="ctr"><?php echo $date_played; ?></h5>
    </div>

<?php foreach ($players as $key => $name) { ?>
    <div class="form-label-group">
      <h3><?php echo $name; ?></h3>
      <table class="table table-bordered table-striped">
        <tr>
          <th>Hole</th>
<?php for ($x = 1; $x <= 18; $x++) { ?>
          <th class="scores"><?php echo $x; ?></th>
<?php } ?>
        </tr>
        <tr>
          <th>Par</th>
<?php for ($x = 0; $x < 18; $x++) { ?>
          <th class="scores"><?php echo $holes[$x][0]; ?></th>
<?php } ?>
        </tr>
        <tr>
          <th>&nbsp;</th>
<?php for ($x = 1; $x <= 18; $x++) {
        $tag_id = 'p_' . $key . '_' . ($x < 10 ? '0' : '') . $x;
?>
          <td class="scores"><input type="text" id="<?php echo $tag_id; ?>" class="form-control holes" required autofocus></td>
<?php } ?>
        </tr>
      </table>
    </div>
<?php } ?>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
  </form>

</div>

<?php
include(HTML . 'scripts.php');
include(HTML . 'endHTML.php');
?>
