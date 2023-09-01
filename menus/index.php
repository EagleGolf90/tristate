<?php
include('../preload.php');
$_SESSION["RETURN_MENU"] = MENUS_URL;
include(HTML . 'beginHTML.php');

$sqlTable = new SQLTable();
?>
<div class="container">
  <h2>IDGA / Tri-State Cup Main Menu</h2>
  <div class="row">
<?php
$rows = $sqlTable->load('loadMenus', array());
foreach ($rows As $row) {
  $url_menu = TRISTATE_URL . $row['URL'];
?>
  <div class="row">
    <div class="col-6">
      <a class="links" href="<?php echo $url_menu; ?>">
        <div class="card <?php echo $row['TagName']; ?> text-white mb-1 full">
          <div class="card-body">
            <h5 class="card-title text-center"><?php echo $row['Title'] . ($row['Admin'] == 'Y' ? ' (for Admin only)' : ''); ?></h5>
          </div>
        </div>
      </a>
    </div>
    <div class="col-6">&nbsp;</div>
  </div>
<?php
}
?>
</div>

<?php include(HTML . 'endHTML.php'); ?>
