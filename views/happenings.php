
			<?php foreach ($this->articles as $article) : ?>
	  			<div class="boxWrapper">
	  				<h3 class="boxHeading"><a target="_blank" href="index.php?controller=happenings&action=description&id=<?php echo $article['id'] ?>"><?php echo $article['heading'] ?></a></h3>
                    <p class="readmore"><a target="_blank" href="index.php?controller=happenings&action=description&id=<?php echo $article['id'] ?>">Read More</a></p>
	  				<?php /*?><div class="boxDesc">
						  <?php

						  if (strlen($article['introduction']) > 90) {
							  echo substr($article['introduction'], 0, 90).'...';
						  } else {
							  echo $article['introduction'];
						  }
						  ?>
	  				</div><?php */?>
	  				<div class="boxImg">
	  					<a target="_blank" href="index.php?controller=happenings&action=description&id=<?php echo $article['id'] ?>"><img src="userdata/image.php/image-name.png?width=160&amp;image=<?php echo BASE_PATH ?>userdata/images/<?php echo $article['image']; ?>" alt="img" /></a>
	  				</div>
	  			</div>
			  <?php endforeach; ?>


