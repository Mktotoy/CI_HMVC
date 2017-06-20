
        <h2 style="margin-top:0px">User Read</h2>
        <table class="table">
	    <tr><td>Login</td><td><?php echo $login; ?></td></tr>
	    <tr><td>Lastname</td><td><?php echo $lastname; ?></td></tr>
	    <tr><td>Firstname</td><td><?php echo $firstname; ?></td></tr>
	    <tr><td>Mail</td><td><?php echo $mail; ?></td></tr>
	    <tr><td>MailConfirmed</td><td><?php echo $mailConfirmed; ?></td></tr>
	    <tr><td>Password</td><td><?php echo $password; ?></td></tr>
	    <tr><td>Role</td><td><?php echo $role; ?></td></tr>
	    <tr><td>Createdat</td><td><?php echo $createdat; ?></td></tr>
	    <tr><td>Thumbnail</td><td><?php echo $thumbnail; ?></td></tr>
	    <tr><td>Lastip</td><td><?php echo $lastip; ?></td></tr>
	    <tr><td><a href="<?php echo site_url('user/update?login='.$login) ?>" class="btn btn-success">Update</a></td><td><a href="<?php echo site_url('user') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
      