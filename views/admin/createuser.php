<form action="index.php?controller=admin&action=createuser" method="post">
    <article class="module width_full">
        <header><h3>Add New User</h3></header>
        <div class="module_content">
            <fieldset style="width:46%; float:left; margin-right: 3%;">
                <label>Full Name</label>
                <input type="text" name="fullname" value="<?php //echo $data['fullname']     ?>" style="width:92%;"/>
            </fieldset>
            <fieldset style="width:47%; float:right; margin-right: 3%;">
                <label>Email</label>
                <input type="text" name="email" value="<?php //echo $data['email']     ?>" style="width:92%;"/>
            </fieldset>
            <div class="clear"></div>
            <fieldset style="width:46%; float:left; margin-right: 3%;">
                <label>Address</label>
				<textarea name="address"></textarea>
            </fieldset>
            <fieldset style="width:47%; float:right; margin-right: 3%;">
                <label>Phone</label>
                <input type="text" name="phone_no" value="<?php //echo $data['email']     ?>" style="width:92%;"/>
            </fieldset>


			<fieldset style="width:47%; float:right; margin-right: 3%;">
                <label>Username</label>
                <input type="text" name="username" value="<?php //echo $data['email']     ?>" style="width:92%;"/>
            </fieldset>



			<fieldset style="width:47%; float:right; margin-right: 3%;">
                <label>password</label>
                <input type="password" name="password" value="<?php //echo $data['email']     ?>" style="width:92%;"/>
            </fieldset>


			<fieldset style="width:47%; float:right; margin-right: 3%;">
                <label>Employee Id</label>
                <input type="text" name="employee_id" value="<?php //echo $data['email']     ?>" style="width:92%;"/>
            </fieldset>

            <div class="clear"></div>



        </div>
        <input type="hidden" name="id" value=""/>


        <footer>
            <div class="submit_link">
                <input type="submit" value="save" class="alt_btn"/>
                <input type="button" value="Cancel" onclick="document.location='index.php?controller=admin&action=attendencelist'"/>
            </div>
        </footer>

<div style="height: 200px; overflow: hidden"></div>
</article>

    </form>