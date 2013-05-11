<script language="javascript" type="text/javascript" src="js/jquery.jqplot.min.js"></script>
<link rel="stylesheet" type="text/css" href="js/jquery.jqplot.css" />
<script class="include" language="javascript" type="text/javascript" src="js/jqplot.dateAxisRenderer.min.js"></script>

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
			$points = array();

			foreach ($this->list as $list) :
				$class = ($counter % 2 == 0) ? 'even-row' : 'odd-row';
				$timestamp = strtotime($list['date']);

				$hr = date('h', $timestamp);
				$min = date('I', $timestamp);

				$decimalTime = (float) ($hr . '.' . (($min / 60) * 100));

				$decimalTime = rand(7, 10); // for temp purpose only

				$points[] = '[' . $list['date'] . ',' . $decimalTime . ']';
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
<!--<div id="chartdiv" style="height:400px;width:300px; "></div>-->
<div id="chart1" style="height:400px;width:600px; "></div>
<?php
$plots = '[' . implode(',', $points) . ']';
?>
<script>
	//$.jqplot('chartdiv',  [[[1, 2],[3,5.12],[5,13.1],[7,33.6],[9,85.9],[11,219.9]]]);

	$(document).ready(function(){
		//var line1=[['2008-08-12',7], ['2008-09-12',8], ['2008-10-12',8.5], ['2008-11-12',8], ['2008-12-12',9]];
		var line1 = eval(<?php echo $plots; ?>);
		var plot1 = $.jqplot('chart1', [line1], {
			title:'Check In time',
			axes:{
				xaxis:{
					renderer:$.jqplot.DateAxisRenderer
				}
			},
			series:[{lineWidth:4, markerOptions:{style:'square'}}]
		});
	});
</script>


