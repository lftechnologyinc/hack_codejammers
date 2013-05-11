<?php $this->getPartialLayout('admin/header'); ?>

<header id="header">
  <hgroup>
    <h1 class="site_title"><a href="#">Attendance Management</a></h1>
    <h2 class="section_title"></h2>
   <!-- <div class="btn_view_site"><a href="">View Site</a></div>-->
  </hgroup>
</header>
<!-- end of header bar -->

<section id="secondary_bar">
   <div class="breadcrumbs_container">
    <article class="breadcrumbs"><a href="">Admin</a>
      <div class="breadcrumb_divider"></div>
      <a class="current">Login</a></article>
  </div>
</section>
<!-- end of secondary bar --> 
<aside id="sidebar" style="visibility:hidden;">
</aside>
<section id="main" class="column">
  <?php notification::getMessage(); ?>
  <?php $this->getContent(); ?>
</section>
<?php $this->getPartialLayout('admin/footer'); ?>
