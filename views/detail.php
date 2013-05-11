<?php
$data = array('heading' => '', 'introduction' => '', 'description' => '', 'image' => '', 'id' => '0');
if (isset($this->data) && is_array($this->data)) {
	$data = $this->data;
}
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0" id="productDetail">
	<tr>
		<td valign="top">
			<div style="padding-right: 10px;">
				<h2><?php echo $data['heading'] ?></h2>
				<p>
					<img src="<?php echo BASE_URL; ?>/userdata/image.php/image-name.png?width=400&amp;image=<?php echo BASE_PATH ?>userdata/images/<?php echo $data['image']; ?>" alt="img" />
				</p>
				<?php echo $data['description']; ?>
			</div>

		</td>
	</tr>
</table>



