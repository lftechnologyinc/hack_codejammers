
<form action="index.php?controller=admin&action=createuser" method="post" enctype="multipart/form-data">
  <article class="module width_full">
  <header>
    <h3>Add New User</h3>
  </header>
  <div class="module_content">
    <fieldset class="fieldset-width margin-rgt20 float-lft">
      <label>Full Name</label>
      <input type="text" name="fullname" value="<?php //echo $data['fullname'] ?>" placeholder="Full Name"/>
    </fieldset>
    <fieldset  class="fieldset-width margin-rgt20 float-lft">
      <label>Email</label>
      <input type="text" name="email" value="<?php //echo $data['email'] ?>" placeholder="Email" />
    </fieldset>
    <div class="clear"></div>
    <fieldset  class="fieldset-width margin-rgt20 float-lft">
      <label>Address</label>
      <input type="text" name="Address" value="<?php //echo $data['address'] ?>" placeholder="Address"/>
    </fieldset>
    <fieldset class="fieldset-width margin-rgt20 float-lft">
      <label>Contact ID</label>
      <input type="text" name="phone_no" value="<?php //echo $data['email']     ?>" placeholder="Contact ID"/>
    </fieldset>
    <div class="clear"></div>
    <fieldset class="fieldset-width margin-rgt20 float-lft">
      <label>Username</label>
      <input type="text" name="username" value="<?php //echo $data['email']     ?>" placeholder="User Name" />
    </fieldset>
    <fieldset class="fieldset-width margin-rgt20 float-lft">
      <label>Password</label>
      <input type="password" name="password" value="<?php //echo $data['email']     ?>" placeholder="Password" />
    </fieldset>
    <fieldset class="fieldset-width margin-rgt20 float-lft">
      <label>Employee Id</label>
      <input type="text" name="employee_id" value="<?php //echo $data['email']     ?>" placeholder="Employee ID" />
    </fieldset>
    <div class="clear"></div>
  </div>
  <footer class="form-footer">
    <div class="submit_link">
      <input type="submit" value="Save" name="submit" class="btn-small btn-green"/>
      <input class="btn-default btn-small" type="button" value="Cancel" onclick="document.location='index.php?controller=admin&action=attendencelist'"/>
    </div>
  </footer>
</form>
</div>
</footer>
</article>
</form>
