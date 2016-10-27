

    <?php

    echo form_open('login/create_member',array("class"=>"form-signin"));
    echo "<h3>Personal Information</h3>";
    echo form_input('first_name', '',array("class"=>"form-control","placeholder"=>"First Name"));
    echo form_input('last_name', '',array("class"=>"form-control","placeholder"=>"Last Name"));
    echo form_input('email_address', '',array("class"=>"form-control","placeholder"=>"Email"));
    ?>


    <?php
    echo "<h3>Login Info</h3>";
    echo form_input('username','',array("class"=>"form-control","placeholder"=>"Matricule"));
    echo form_password('password', '',array("class"=>"form-control","placeholder"=>"Password"));
    echo form_password('password2', '',array("class"=>"form-control","placeholder"=>"Confirm Password"));
    echo form_submit('submit', 'Create Account',array("class"=>"btn btn-lg btn-success btn-block"));
    ?>

    <?php echo validation_errors('<p class="error">'); ?>

