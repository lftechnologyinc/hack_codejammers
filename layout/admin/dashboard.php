<?php $this->getPartialLayout('admin/header'); ?>
<header id="header">
    <hgroup>
        <h1 class="site_title"><a href="#">Administrator</a></h1><!--<div class="btn_view_site"><a href=""></a>--></div>
    </hgroup>
</header> <!-- end of header bar -->
<div>
	<section id="secondary_bar">
		<div class="user">
			<?php if (session::check('user')) : ?>
				<p>Admin</p>
				<a class="logout_user" href="index.php?controller=user&action=logout"  title="Logout">Logout</a>
			<?php endif; ?>
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs"><a href="index.php?controller=admin&action=index">Website Admin</a> <div class="breadcrumb_divider"></div>
				<a class="current"><?php echo $this->page; ?></a></article>
		</div>
	</section><!-- end of secondary bar -->
	<section id="main" class="column">
		<?php notification::getMessage(); ?>

		<article class="module width_full">
			<?php $this->getContent(); ?>
		</article><!-- end of stats article -->

		<div class="clear"></div>


	</section>
	<aside id="sidebar" class="column">
		<form class="quick_search">
			<input type="text" value="Quick Search" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
		</form>
		<hr/>
		<?php $this->getPartialView('widgets/admin/menu'); ?>
		<footer>
			<hr />
			<p><strong>Copyright &copy; 2013 The Administrator</strong></p>
		</footer>
	</aside><!-- end of sidebar -->


	<?php $this->getPartialLayout('admin/footer'); ?>
