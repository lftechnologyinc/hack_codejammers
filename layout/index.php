<?php $this->getPartialLayout('header') ?>
<br>
 <?php notification::getMessage(); ?>
<hr>
<?php $this->getContent(); ?>
<bR>
<?php $this->getPartialView('widgets/menu'); ?>
<hr>
footer
