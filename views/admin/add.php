<script type="text/javascript" src="system/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
    tinyMCE.init({
        mode : "exact",
        elements : "introduction",
        theme : "simple"
    });

    tinyMCE.init({
        // General options
        mode : "exact",
        elements : "description",
        theme : "advanced",
        skin : "o2k7",
        plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups,autosave",

        // Theme options
        theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
        theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
        theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
        theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_resizing : true,

        // Example word content CSS (should be your site CSS) this one removes paragraph margins
        content_css : "css/word.css",

        // Drop lists for link/image/media/template dialogs
        template_external_list_url : "lists/template_list.js",
        external_link_list_url : "lists/link_list.js",
        external_image_list_url : "lists/image_list.js",
        media_external_list_url : "lists/media_list.js",

        // Replace values for the template plugin
        template_replace_values : {
            username : "Some User",
            staffid : "991234"
        }
    });

    $('document').ready(function(){
        $("#datepicker").datepicker({
            changeMonth:true,changeYear:true,dateFormat: 'yy-mm-dd'
        });
    });

</script>
<!-- /TinyMCE -->
<?php

  $data = array('heading' => '', 'introduction' => '', 'description' => '', 'publish_date' => '', 'image' => '', 'id' => '0');
  if (isset($this->data) && is_array($this->data)) {
      $data = $this->data;
  }
?>
<form action="index.php?controller=admin&action=save" method="post" enctype="multipart/form-data">
    <article class="module width_full">
        <header><h3>Post New Article</h3></header>
        <div class="module_content">
            <fieldset style="width:46%; float:left; margin-right: 3%;">
                <label>Title</label>
                <input type="text" name="heading" value="<?php echo $data['heading'] ?>" style="width:92%;"/>
            </fieldset>
            <fieldset style="width:47%; float:right; margin-right: 3%;">
                <label>Publish Date</label>
                <input type="text" name="publish_date" value="<?php echo $data['publish_date'] ?>" id="datepicker" style="width:92%;"/>
            </fieldset>
            <div class="clear"></div>
            <fieldset style="width:46%; float:left; margin-right: 3%;">
                <label>Category</label>
                <select name="type" >
                    <?php

                      $type = $data['type'];
                    ?>
                    <option value="product" <?php echo ($type == 'product') ? 'selected="selected"' : ''; ?>>Product</option>
                    <option value="event" <?php echo ($type == 'event')
                                ? 'selected="selected"' : '';
                    ?>>Event</option>
                    <option value="new product"  <?php echo ($type == 'new product') ? 'selected="selected"' : ''; ?>>New Product</option>
                </select>
            </fieldset>
            <fieldset style="width:47%; float:right; margin-right: 3%;">
                <label>Image</label>
                <div class="clear"></div>
                <div style="padding:5px;">
                <?php if ($data['image']): ?>
                      <img src="userdata/images/<?php echo $data['image']; ?>" width="200"/>
  <?php endif; ?>
                </div>
                <div class="clear"></div>
                <input type="file" name="file" style="width:92%;"/>
            </fieldset>

            <div class="clear"></div>
            <fieldset>
                <label>Introduction</label>
                <div class="clear"></div>
                <textarea id="introduction" name="introduction" style="width:100%;"><?php echo $data['introduction']; ?></textarea>
            </fieldset>
            <div class="clear"></div>
            <fieldset>
                <label>Description</label>
                <div class="clear"></div>
                <textarea id="description" name="description" rows="30" style="width: 100%"><?php echo $data['description'] ?></textarea>
            </fieldset>


        </div>
        <input type="hidden" name="id" value="<?php echo $data['id'] ?>"/>
        <input type="hidden" name="filename" value="<?php echo $data['image'] ?>"/>

        <footer>
            <div class="submit_link">
                <input type="submit" value="save" class="alt_btn"/>
                <input type="button" value="Cancel" onclick="document.location='index.php?controller=admin&action=index'"/>
            </div>
        </footer>
</form>
<div style="height: 200px; overflow: hidden"></div>
</article>

