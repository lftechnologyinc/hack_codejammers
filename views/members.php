<?php ?>
<div class="blocks margin-all"><form name="checkinout" id="checkinout" action="" method="POST" />
<?php if ($this->checkIn == 1) { ?>

                           <h4 class="success"> You are currently Checked In from  <i><?php echo $this->CheckedInDate;?></i></h4>
					<h4 class="info">You are currently working from<i> <?php echo ($this->work_from==0)? 'Home':'Office';?></i> </h4>
	  		<input class="btn-large btn-red border-all" style="margin:0 45%;" type="submit" name="checkOut" value="Check Out"/>
  <?php } else { ?>
  <p class="heading">Please click on Check In button to Log Time.</p>
	  		 <input class="btn-green btn-large border-all" style="margin:0 45%;" type="submit" name="checkIn" value="Check In"/>
  <?php } ?>
</form></div>






