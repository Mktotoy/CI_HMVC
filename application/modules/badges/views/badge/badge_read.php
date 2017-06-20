
        <h2 style="margin-top:0px">Badge Read</h2>
        <table class="table">
	    <tr><td>BadgeId</td><td><?php echo $badgeId; ?></td></tr>
	    <tr><td>BadgeTitle</td><td><?php echo $badgeTitle; ?></td></tr>
	    <tr><td>BadgeText</td><td><?php echo $badgeText; ?></td></tr>
	    <tr><td>BadgeThumbnail</td><td><?php echo $badgeThumbnail; ?></td></tr>
	    <tr><td><a href="<?php echo site_url('badge/update/badgeId') ?>" class="btn btn-success">Update</a></td><td><a href="<?php echo site_url('badge') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
      