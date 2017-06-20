
        <h2 style="margin-top:0px">Ci_nav_inmenu <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post"><input type="hidden" class="form-control" name="KeyID" value="<?php echo $KeyID; ?>" /><input type="hidden" class="form-control" name="KeyID" value="<?php echo $KeyID; ?>" /><input type="hidden" class="form-control" name="KeyID" value="<?php echo $KeyID; ?>" />
	    <div class="form-group">
                            <label for="int">MenuID <?php echo form_error('MenuID') ?></label>
                            <?php echo form_dropdown('MenuID',$ci_nav_menus,$MenuID,array("id"=>"MenuID","class"=>"form-control","require"=>0)); ?>
                        </div>
	    <div class="form-group">
                            <label for="int">ItemID <?php echo form_error('ItemID') ?></label>
                            <?php echo form_dropdown('ItemID',$ci_nav_items,$ItemID,array("id"=>"ItemID","class"=>"form-control","require"=>0)); ?>
                        </div>
	    <div class="form-group">
                            <label for="int">LinkWeight <?php echo form_error('LinkWeight') ?></label>
                            <input type="number" min=0 max=100 class="form-control" name="LinkWeight" id="LinkWeight" placeholder="LinkWeight" value="<?php echo $LinkWeight; ?>" />
                        </div>
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('ci_nav_inmenu') ?>" class="btn btn-default">Cancel</a>
	</form>
    