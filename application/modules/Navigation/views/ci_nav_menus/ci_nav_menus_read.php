
        <h2 style="margin-top:0px">Ci_nav_menus Read</h2>
        <table class="table">
	    <tr><td>MenuID</td><td><?php echo $MenuID; ?></td></tr>
	    <tr><td>MenuName</td><td><?php echo $MenuName; ?></td></tr>
	    <tr><td><a href="<?php echo site_url('ci_nav_menus/update/MenuID') ?>" class="btn btn-success">Update</a></td><td><a href="<?php echo site_url('ci_nav_menus') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
      