<?php ?>
<div class="blocks margin-all"><form name="checkinout" id="checkinout" action="" method="POST" />
<?php if ($this->checkIn == 1) { ?>
                            <h4>You are currently Checked In from</h4> <?php echo $this->CheckedInDate;?>
	  		<input class="btn-large btn-red border-all" style="margin:0 45%;" type="submit" name="checkOut" value="Check Out"/>
  <?php } else { ?>
	  		 <input class="btn-green btn-large border-all" style="margin:0 45%;" type="submit" name="checkIn" value="Check In"/>
  <?php } ?>
</form></div>






