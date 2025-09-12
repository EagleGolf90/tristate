<?php
if (!isset($_GET['role'])) die('Must have role parameter. Please try again.');
$role = strtolower($_GET['role']);

include('../preload.php');

include(LOAD_PATH . 'loadMenus.php');

include(HTML . 'beginHTML.php');
?>
<div class="container text-center">
  <h2>Tri-State Cup Main Menu</h2>
  <div class="row">
<?php
foreach ($menus->displayMenus() as $row) {
  $url_menu = TRISTATE_URL . $row['URL'] . '?role=' . $role;
  if ($row['Admin'] == 'N') {
?>
  <div class="row">
    <div class="col-12">
      <a class="links" href="<?php echo $url_menu; ?>">
        <div class="card <?php echo $row['TagName']; ?> text-white mb-1 full">
          <div class="card-body">
            <h5 class="card-title text-center"><?php echo $row['Title'] . ($row['Admin'] == 'Y' ? ' (for Admin only)' : ''); ?></h5>
          </div>
        </div>
      </a>
    </div>
  </div>
<?php
  }
}
?>
</div>

<?php include(HTML . 'endHTML.php'); ?>
