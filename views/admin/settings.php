<article class="module width_full">
    <form action="index.php?controller=admin&action=savesettings" method="post">
        <header><h3>Options</h3></header>
        <div class="module_content">
            <fieldset  class="fieldset-width margin-rgt20 float-lft"> <!-- to make two field float next to one another, adjust values accordingly -->
                <div class="control-group">
		<label>List Limit</label>
                <select style="width:92%;" name="options[product_limit]">
                    <?php for ($i = 3;
                                  $i <= 40; $i = $i + 3): ?>
                          <option value="<?php echo $i; ?>" <?php echo ($this->product_limit == $i) ? 'selected="selected"' : '' ?>><?php echo $i ?></option>
  <?php endfor; ?>
                </select>
		</div>
            </fieldset>

            <fieldset class="fieldset-width margin-rgt20 float-lft">
                <div class="control-group">
		<label>Office IP</label>
		<input type ="text" value="<?php echo $this->office_ip ?>" name="options[office_ip]">
		</div>
            </fieldset>

           

            <div class="clear"></div>
        </div>
        <footer>
            <div class="submit_link">
                <input type="submit" class="alt_btn" value="Save">
            </div>
        </footer>
    </form>
</article>
<div class="clear" style="padding: 10px;"></div>