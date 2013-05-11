<article class="module width_full">
    <form action="index.php?controller=admin&action=savesettings" method="post">
        <header><h3>Options</h3></header>
        <div class="module_content">
            <fieldset style="width:30%; float:left; margin-right: 3%;"> <!-- to make two field float next to one another, adjust values accordingly -->
                <label>Product Limit</label>
                <select style="width:92%;" name="options[product_limit]">
                    <?php for ($i = 3;
                                  $i <= 40; $i = $i + 3): ?>
                          <option value="<?php echo $i; ?>" <?php echo ($this->product_limit == $i) ? 'selected="selected"' : '' ?>><?php echo $i ?></option>
  <?php endfor; ?>
                </select>
            </fieldset>

            <fieldset style="width:30%; float:left; margin-right: 3%;">
                <label>New Product Limit</label>
                <select style="width:92%;" name="options[new_product_limit]">
                    <?php for ($i = 1;
                                  $i <= 10; $i++):
                          ?>
                          <option value="<?php echo $i; ?>" <?php echo ($this->new_product_limit == $i) ? 'selected="selected"' : '' ?>><?php echo $i ?></option>
  <?php endfor; ?>
                </select>
            </fieldset>

            <fieldset style="width:30%; float:left;">
                <label>Event Limit</label>
                <select style="width:92%;" name="options[event_limit]">
                    <?php for ($i = 1;
                                  $i <= 10; $i++):
                          ?>
                          <option value="<?php echo $i; ?>" <?php echo ($this->event_limit == $i) ? 'selected="selected"' : '' ?>><?php echo $i ?></option>
  <?php endfor; ?>
                </select>
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