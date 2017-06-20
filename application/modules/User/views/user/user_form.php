
        <h2 style="margin-top:0px">User <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="char">Login <?php echo form_error('login') ?></label>
            <input type="text" class="form-control" name="login" id="login" placeholder="Login" value="<?php echo $login; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Lastname <?php echo form_error('lastname') ?></label>
            <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Lastname" value="<?php echo $lastname; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Firstname <?php echo form_error('firstname') ?></label>
            <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Firstname" value="<?php echo $firstname; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Mail <?php echo form_error('mail') ?></label>
            <input type="text" class="form-control" name="mail" id="mail" placeholder="Mail" value="<?php echo $mail; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">MailConfirmed <?php echo form_error('mailConfirmed') ?></label>
            <input type="text" class="form-control" name="mailConfirmed" id="mailConfirmed" placeholder="MailConfirmed" value="<?php echo $mailConfirmed; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Password <?php echo form_error('password') ?></label>
            <input type="text" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Role <?php echo form_error('role') ?></label>
            <input type="text" class="form-control" name="role" id="role" placeholder="Role" value="<?php echo $role; ?>" />
        </div>
	    <div class="form-group">
            <label for="timestamp">Createdat <?php echo form_error('createdat') ?></label>
            <input type="text" class="form-control" name="createdat" id="createdat" placeholder="Createdat" value="<?php echo $createdat; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Thumbnail <?php echo form_error('thumbnail') ?></label>
            <input type="text" class="form-control" name="thumbnail" id="thumbnail" placeholder="Thumbnail" value="<?php echo $thumbnail; ?>" />
        </div>
	    <div class="form-group">
            <label for="char">Lastip <?php echo form_error('lastip') ?></label>
            <input type="text" class="form-control" name="lastip" id="lastip" placeholder="Lastip" value="<?php echo $lastip; ?>" />
        </div>
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('user') ?>" class="btn btn-default">Cancel</a>
	</form>
    