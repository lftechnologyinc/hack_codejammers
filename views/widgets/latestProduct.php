<style>
	/******** this is temp css.... move this to any other external css file********/
	.latest-product-widget {
		xbackground: linear-gradient(#CCCCCC, #FFFFFF) repeat scroll 0 0 transparent;
		background-image: linear-gradient(bottom, rgb(255,255,255) 17%, rgb(221,221,221) 100%);
		background-image: -o-linear-gradient(bottom, rgb(255,255,255) 17%, rgb(221,221,221) 100%);
		background-image: -moz-linear-gradient(bottom, rgb(255,255,255) 17%, rgb(221,221,221) 100%);
		background-image: -webkit-linear-gradient(bottom, rgb(255,255,255) 17%, rgb(221,221,221) 100%);
		background-image: -ms-linear-gradient(bottom, rgb(255,255,255) 17%, rgb(221,221,221) 100%);

		background-image: -webkit-gradient(
			linear,
			left bottom,
			left top,
			color-stop(0.17, rgb(255,255,255)),
			color-stop(1, rgb(221,221,221))
		);
		list-style: none outside none;
		margin: 0;
		padding: 0 0 0 10px;
	}

	.product-date {
		float: left;
		width:55px;
	}
	.product-desc {
		float: left;
		width: 135px;
	}
	.product-desc a{
		text-decoration:none;
		font-size:12px;
		font-weight:normal;
		color:#000;
	}
	.latest-product-widget li{
		clear:both;
		overflow: hidden;
		width: 195px;
		margin-bottom: 13px;
		-moz-border-radius: 4px;
		border-radius: 4px;
	}

	.product-date-block{
		width:45px;
		color:#fff;
		font-weight: bold;
	}
	.product-date-month {
		background: none repeat scroll 0 0 #323499;
		border-bottom: 1px solid #FFFFFF;
		border-radius: 5px 5px 0 0;
		text-align: center;
		vertical-align: middle;
		font-weight:bold;
	}
	.product-date-day {
		background: none repeat scroll 0 0 #323499;
		border-radius: 0 0 5px 5px;
		font-size: 16px;
		font-weight: bold;
		padding: 2px 0;
		text-align: center;
		vertical-align: middle;
	}

	li.header h3{
		color: #323499;
		display: block;
		font-size: 16px;
		font-weight: bold;
		margin-bottom: 12px;
		padding-top:10px;
	}
</style>
<?php
$OptionObj = new optionsModel();
$Article = new articleModel();
$latestArticle = $Article->getArticleList('type="new product"', 'publish_date ASC', $OptionObj->getOption('new_product_limit'));
?>
<ul class="latest-product-widget">
	<li class="header"><h3>2013 Product Update</h3></li>
	<?php foreach ($latestArticle as $article): ?>
		<li>
			<div class="product-date">
				<div class="product-date-block">
					<div class="product-date-month">
						<?php echo strtoupper(substr($article['month'], 0, 3)); ?>
					</div>
					<div class="product-date-day">
						<?php echo $article['day']; ?>
					</div>
				</div>
			</div>
			<div class="product-desc">
				<a href="/index.php?controller=happenings&action=description&id=<?php echo $article['id'] ?>"><?php echo $article['heading']; ?></a>
				<br>
				</li>
			<?php endforeach; ?>
			</ul>
