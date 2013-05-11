<?php ?>
<script>
<?php if ($checkIn == 1) { ?>
	  	$('#checkin').hide();
  <?php } else { ?>
	  	$('#checkout').hide();
  <?php } ?>
</script>
<input type="button" class="check" id ="checkout" value="Check Out"/>
<input type="button" class="check" id ="checkin" value="Check In"/>
