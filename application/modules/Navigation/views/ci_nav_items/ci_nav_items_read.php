
        <h2 style="margin-top:0px">Ci_nav_items Read</h2>
        <table class="table">
	    <tr><td>ItemID</td><td><?php echo $ItemID; ?></td></tr>
	    <tr><td>ItemName</td><td><?php echo $ItemName; ?></td></tr>
	    <tr><td>ItemHumanName</td><td><?php echo $ItemHumanName; ?></td></tr>
	    <tr><td>ItemLink</td><td><?php echo $ItemLink; ?></td></tr>
	<tr><td>ParentItem</td><td><?php echo isset($ci_nav_items[$ParentItem])?$ci_nav_items[$ParentItem]:"" ?></td></tr>
	    <tr><td><a href="<?php echo site_url('ci_nav_items/update/ItemID') ?>" class="btn btn-success">Update</a></td><td><a href="<?php echo site_url('ci_nav_items') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
      