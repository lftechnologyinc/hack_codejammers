<?php ?>
<form name="checkinout" id="checkinout" action="" method="POST" />
<?php if ($this->checkIn == 1) { ?>
                            You are currently Checked In from <?php echo $this->CheckedInDate;?>
					You are currently working from <?php echo ($this->work_from==0)? 'Home':'Office';?>
	  		<input type="submit" name="checkOut" value="Check Out"/>
  <?php } else { ?>
	  		 <input class="btn-green" type="submit" name="checkIn" value="Check In"/>
  <?php } ?>
</form>






