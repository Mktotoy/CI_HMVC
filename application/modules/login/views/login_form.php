    <?php
	echo form_open('login/validate_credentials',array("class"=>"form-signin"));
	echo "<h1>Sign In</h1>";
	echo "<label for=\"username\" class=\"sr-only\">Username</label>";
	echo form_input('username', '',array("class"=>"form-control","require"=>"","placeholder"=>"Login"));
	echo "<label for=\"password\" class=\"sr-only\">Password</label>";
	echo form_password('password', '',array("class"=>"form-control","require"=>"","placeholder"=>"Password"));
	echo form_submit('submit', 'Login',array("class"=>"btn btn-lg btn-primary btn-block"));
	echo anchor('login/signup', 'Create Account');
	echo form_close();
	?>
