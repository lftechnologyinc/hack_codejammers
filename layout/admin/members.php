<?php $this->getPartialLayout('admin/header'); ?>
<header id="header">
    <hgroup>
        <h1 class="site_title"><a href="#">Employee</a></h1>
        <h2 class="section_title">Dashboard</h2><div class="btn_view_site"><a href="">View Site</a></div>
    </hgroup>
</header> <!-- end of header bar -->

<section id="secondary_bar">
    <div class="user">
        <?php if (session::check('user')) : ?>
              <p>Employee</p>
              <a class="logout_user" href="index.php?controller=user&action=logout"  title="Logout">Logout</a>
          <?php endif; ?>
    </div>

</section><!-- end of secondary bar -->
<aside id="sidebar" class="column">
    <hr/>
    <?php $this->getPartialView('widgets/admin/usermenu'); ?>
    <footer>
        <hr />
        <p><strong>Copyright &copy; 2013 The Administrator</strong></p>
    </footer>
</aside><!-- end of sidebar -->

<section id="main" class="column">
    <?php notification::getMessage(); ?>

    <article class="module width_full">
        <?php $this->getContent(); ?>
    </article><!-- end of stats article -->

    <div class="clear"></div>


</section>
<?php $this->getPartialLayout('admin/footer'); ?>