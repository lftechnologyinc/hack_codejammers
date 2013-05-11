<header><h3><?php echo $this->page; ?></h3></header>
<div class="module_content">
	<table cellspacing="0" class="tablesorter">
		<thead>
			<tr>
				<th>SN</th>
				<th>Heading</th>
				<!--<th>Introduction</th>-->
				<th>Image</th>
				<th>Category</th>
				<th>Action</th>
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
					<td><?php echo $article['heading'] ?></td>
					<!--<td><?php // echo $article['introduction']  ?></td>-->
					<td>
						<img src="<?php echo getImage($article['image']); ?>" alt="img" />
					</td>
					<td><i><?php echo ucfirst($article['type']); ?></i></td>

					<td>
						<a href="index.php?controller=admin&action=edit&id=<?php echo $article['id'] ?>" title="Edit">
							<img src="system/images/icn_edit.png"/></a>&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="index.php?controller=admin&action=delete&id=<?php echo $article['id'] ?>" title="Delete">
							<img src="system/images/icn_trash.png"/></a>
					</td>
				</tr>
			<?php endforeach; ?>


		</tbody>
	</table>
</div>
