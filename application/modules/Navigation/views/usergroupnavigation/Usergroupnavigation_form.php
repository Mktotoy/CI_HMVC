
        <h2 style="margin-top:0px">Usergroupnavigation <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
            <input type="hidden" name="IDUsergroupnav" value="<?php echo $IDUsergroupnav;?>"/>
	    <div class="form-group">
                <label for="IDUserGroup">IDUserGroup <?php echo form_error('IDUserGroup') ?></label>
               <?php echo form_dropdown('IDUserGroup',$usergroup,$IDUserGroup,array("id"=>"IDUserGroup","class"=>"form-control","require"=>0)); ?>
            </div>
	    <div class="form-group">
                <label for="MenuID">MenuID <?php echo form_error('MenuID') ?></label>
               <?php echo form_dropdown('MenuID',$ci_nav_menus,$MenuID,array("id"=>"MenuID","class"=>"form-control","require"=>0)); ?>
            </div>
	    <div class="form-group">
                            <label for="varchar">Position <?php echo form_error('Position') ?></label>
                            <input type="text" class="form-control" name="Position" id="Position" placeholder="Position" value="<?php echo $Position; ?>" />
                        </div>
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('usergroupnavigation') ?>" class="btn btn-default">Cancel</a>
	</form>
    