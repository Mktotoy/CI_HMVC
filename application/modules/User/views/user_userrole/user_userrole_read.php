
        <h2 style="margin-top:0px">User_userrole Read</h2>
        <table class="table">
	    <tr><td>Login</td><td><?php echo $login; ?></td></tr>
	    <tr><td>Role Id</td><td><?php echo $role_id; ?></td></tr>
	    <tr><td><a href="<?php echo site_url('user_userrole/update/') ?>" class="btn btn-success">Update</a></td><td><a href="<?php echo site_url('user_userrole') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
      