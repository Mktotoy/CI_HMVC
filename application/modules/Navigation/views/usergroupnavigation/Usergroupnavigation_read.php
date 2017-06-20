
        <h2 style="margin-top:0px">Usergroupnavigation Read</h2>
        <table class="table">
			<tr><td>IDUsergroupnav</td><td><?php echo $IDUsergroupnav ?></td></tr>
	<tr><td>IDUserGroup</td><td><?php echo $usergroup[$IDUserGroup] ?></td></tr>
	<tr><td>MenuID</td><td><?php echo $ci_nav_menus[$MenuID] ?></td></tr>
	    <tr><td>Position</td><td><?php echo $Position; ?></td></tr>
	    <tr><td><a href="<?php echo site_url('usergroupnavigation/update/') ?>" class="btn btn-success">Update</a></td><td><a href="<?php echo site_url('usergroupnavigation') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
      