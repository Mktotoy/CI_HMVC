
        <h2 style="margin-top:0px">Ci_nav_items <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post"><input type="hidden" class="form-control" name="ItemID" value="<?php echo $ItemID; ?>" /><input type="hidden" class="form-control" name="ItemID" value="<?php echo $ItemID; ?>" /><input type="hidden" class="form-control" name="ItemID" value="<?php echo $ItemID; ?>" />
	    <div class="form-group">
                            <label for="varchar">ItemName <?php echo form_error('ItemName') ?></label>
                            <input type="text" class="form-control" name="ItemName" id="ItemName" placeholder="ItemName" value="<?php echo $ItemName; ?>" />
                        </div>
	    <div class="form-group">
                            <label for="varchar">ItemHumanName <?php echo form_error('ItemHumanName') ?></label>
                            <input type="text" class="form-control" name="ItemHumanName" id="ItemHumanName" placeholder="ItemHumanName" value="<?php echo $ItemHumanName; ?>" />
                        </div>
	    <div class="form-group">
                            <label for="varchar">ItemLink <?php echo form_error('ItemLink') ?></label>
                            <input type="text" class="form-control" name="ItemLink" id="ItemLink" placeholder="ItemLink" value="<?php echo $ItemLink; ?>" />
                        </div>
	    <div class="form-group">
                <label for="ParentItem">ParentItem <?php echo form_error('ParentItem') ?></label>
               <?php echo form_dropdown('ParentItem',$ci_nav_items,$ParentItem,array("id"=>"ParentItem","class"=>"form-control","require"=>0)); ?>
            </div>
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('ci_nav_items') ?>" class="btn btn-default">Cancel</a>
	</form>
    