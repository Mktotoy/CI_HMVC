    <?php
	echo "<h1>Learn Platform</h1>";
	echo form_open('User/validate_credentials',array("class"=>"form-signin"));
	echo "<h2>Sign In</h2>";
	echo "<label for=\"username\" class=\"sr-only\">Username</label>";
	echo form_input('username', '',array("class"=>"form-control","require"=>"","placeholder"=>"Login"));
	echo "<label for=\"password\" class=\"sr-only\">Password</label>";
	echo form_password('password', '',array("class"=>"form-control","require"=>"","placeholder"=>"Password"));
	echo form_submit('submit', 'Login',array("class"=>"btn btn-lg btn-primary btn-block"));
	echo anchor('User/signup', 'Create Account',array("class"=>"btn btn-sm btn-info btn-block"));
	echo form_close();
	?>
