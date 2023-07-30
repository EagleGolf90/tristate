<?php
session_start();
if (isset($_SESSION['favanimal'])) {
  echo $_SESSION['favanimal'] . '<br/>';
} else {
  echo 'Logout<br/>';
}
?>
