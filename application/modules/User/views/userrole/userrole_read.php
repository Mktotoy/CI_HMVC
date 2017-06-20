
        <h2 style="margin-top:0px">Userrole Read</h2>
        <table class="table">
	    <tr><td>Id</td><td><?php echo $id; ?></td></tr>
	    <tr><td>Name</td><td><?php echo $name; ?></td></tr>
	    <tr><td><a href="<?php echo site_url('userrole/update/id') ?>" class="btn btn-success">Update</a></td><td><a href="<?php echo site_url('userrole') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
      