
        <h2 style="margin-top:0px">Usergroup Read</h2>
        <table class="table">
	    <tr><td>IDUserGroup</td><td><?php echo $IDUserGroup; ?></td></tr>
	    <tr><td>Libelle</td><td><?php echo $Libelle; ?></td></tr>
	    <tr><td><a href="<?php echo site_url('usergroup/update/IDUserGroup') ?>" class="btn btn-success">Update</a></td><td><a href="<?php echo site_url('usergroup') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
      