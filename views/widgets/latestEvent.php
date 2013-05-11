<?php
$Article = new articleModel();
$OptionObj = new optionsModel();
$latestArticle = $Article->getArticleList('type="event"', 'publish_date ASC', $OptionObj->getOption('event_limit'));
?>
<ul class="latest-product-widget">
	<li class="header"><h3>2013 Events</h3></li>
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
