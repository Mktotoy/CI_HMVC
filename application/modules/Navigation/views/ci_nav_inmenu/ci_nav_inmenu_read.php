
        <h2 style="margin-top:0px">Ci_nav_inmenu Read</h2>
        <table class="table">
	    <tr><td>KeyID</td><td><?php echo $KeyID; ?></td></tr>
	    <tr><td>MenuID</td><td><?php echo $ci_nav_menus[$MenuID]; ?></td></tr>
	    <tr><td>ItemID</td><td><?php echo $ci_nav_items[$ItemID]; ?></td></tr>
	    <tr><td>LinkWeight</td><td><?php echo $LinkWeight; ?></td></tr>
	    <tr><td><a href="<?php echo site_url('ci_nav_inmenu/update/KeyID') ?>" class="btn btn-success">Update</a></td><td><a href="<?php echo site_url('ci_nav_inmenu') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
      