
        <h2 style="margin-top:0px">User_userrole <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="char">Login <?php echo form_error('login') ?></label>
            <input type="text" class="form-control" name="login" id="login" placeholder="Login" value="<?php echo $login; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Role Id <?php echo form_error('role_id') ?></label>
            <input type="text" class="form-control" name="role_id" id="role_id" placeholder="Role Id" value="<?php echo $role_id; ?>" />
        </div>
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('user_userrole') ?>" class="btn btn-default">Cancel</a>
	</form>
    