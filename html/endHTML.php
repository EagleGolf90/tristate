<?php if (PAGE_NAME == 'enterHandicaps.php') { ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="../html/js/tristate-custom.js" type="text/javascript"></script>
<?php } else { ?>
<script type="text/javascript">
$(function () {
    $('#date_entered').datetimepicker();
});
</script>
<?php } ?>

</body>
</html>
