
        <h2 style="margin-top:0px">Ci_nav_menus <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post"><input type="hidden" class="form-control" name="MenuID" value="<?php echo $MenuID; ?>" /><input type="hidden" class="form-control" name="MenuID" value="<?php echo $MenuID; ?>" /><input type="hidden" class="form-control" name="MenuID" value="<?php echo $MenuID; ?>" />
	    <div class="form-group">
                            <label for="varchar">MenuName <?php echo form_error('MenuName') ?></label>
                            <input type="text" class="form-control" name="MenuName" id="MenuName" placeholder="MenuName" value="<?php echo $MenuName; ?>" />
                        </div>
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('ci_nav_menus') ?>" class="btn btn-default">Cancel</a>
	</form>
    