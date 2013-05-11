<?php ?>
<form name="checkinout" id="checkinout" action="" method="POST" />
<?php if ($this->checkIn == 1) { ?>
	  		<input type="submit" name="checkOut" value="Check Out"/>
  <?php } else { ?>
	  		 <input type="submit" name="checkIn" value="Check In"/>
  <?php } ?>
</form>






