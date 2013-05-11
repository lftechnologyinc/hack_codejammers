<header><h3>Check  in - Check out Timing</h3></header>
<div class="module_content">
	<table cellspacing="0" class="tablesorter">
		<thead>
			<tr>
				<th>Sn</th>
				<th>Date</th>
				<th>Checked In Time</th>
				<th>Checked Out Time</th>
				<th>Worked From</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$counter = 1;
			
			foreach ($this->list as $list) :
				$class = ($counter % 2 == 0) ? 'even-row' : 'odd-row';
				?>
				<tr class="<?php echo $class; ?>">
					<td><?php echo $counter++; ?></td>
					<td><?php echo $list['date'] ?></td>
					<td><?php echo $list['checkin'] ?></td>
					<td><?php echo $list['checkout'] ?></td>
					<td><?php echo ($list['work_from']) ? 'Office' : 'Home' ?></td>
				</tr>
			<?php endforeach; ?>


		</tbody>
	</table>
</div>
