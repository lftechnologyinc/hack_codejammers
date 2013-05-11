<header><h3><?php echo $this->page; ?></h3></header>
<div class="module_content">
	<table cellspacing="0" class="tablesorter">
		<thead>
			<tr>
				<th>SN</th>
				<th>Name</th>
				<th>Username</th>
				<th>Email</th>
				<th>Contact No</th>
				<th>Card No</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$counter = 1;
			foreach ($this->users as $user) :
				$class = ($counter % 2 == 0) ? 'even-row' : 'odd-row';
				?>
				<tr class="<?php echo $class; ?>">
					<td><?php echo $counter++; ?></td>
					<td><?php echo $user['fullname'] ?></td>
					<td><?php  echo $user['username']  ?></td>
					<td>
					<?php echo $user['email']?>
					</td>
					<td><?php echo $user['phone_no']; ?></td>
					<td><?php echo $user['employee_id']; ?></td>
					<td>
					    <?php echo ($user['state'])?'Active':'Inactive/Resign'; ?>
						<!--<a href="index.php?controller=admin&action=edit&id=<?php echo $article['id'] ?>" title="Edit">
							<img src="system/images/icn_edit.png"/></a>&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="index.php?controller=admin&action=delete&id=<?php echo $article['id'] ?>" title="Delete">
							<img src="system/images/icn_trash.png"/></a>-->
					</td>
				</tr>
			<?php endforeach; ?>


		</tbody>
	</table>
</div>
