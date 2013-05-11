<script>
$('document').ready(function(){
        $("#from_date").datepicker({
            changeMonth:true,changeYear:true,dateFormat: 'yy-mm-dd'
        });
	$("#to_date").datepicker({
            changeMonth:true,changeYear:true,dateFormat: 'yy-mm-dd'
        });
    });
</script>
<header><h3><?php echo $this->page; ?></h3></header>
<div class="module_content">
    <form method="post" action="index.php?controller=admin&action=attendencelist">
	<div class ="filter">
	<label>From Date</label>
	<input type="text" name="from_date" value="<?php echo date('Y-m-d') ?>" id="from_date"/>
	<label>To Date</label>
	<input type="text" name="to_date" value="<?php echo date('Y-m-d') ?>" id="to_date"/>
	<input type="submit" value="Show"/>
    </div>
    </form>
	<table cellspacing="0" class="tablesorter">
		<thead>
			<tr>
				<th>Sn</th>
				<th>Date</th>
				<th>User Name</th>
				<th>Checked In Time</th>
				<th>Checked Out Time</th>
				<th>Worked From</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$counter = 1;
			//$this->articles = array(1, 2, 3, 4, 5, 6, 7, 8);
			foreach ($this->attendences as $attendence) :
				$class = ($counter % 2 == 0) ? 'even-row' : 'odd-row';
				?>
				<tr class="<?php echo $class; ?>">
					<td><?php echo $counter++; ?></td>
					<td><?php echo $attendence['date'] ?></td>
					<td><?php echo $attendence['username'] ?></td>
					<td><?php echo $attendence['checkin'] ?></td>
					<td><?php echo $attendence['checkout'] ?></td>
					<td><?php echo ($attendence['work_from'] == 1)?'Office':'Home'; ?></td>
				</tr>
			<?php endforeach; ?>


		</tbody>
	</table>
</div>
