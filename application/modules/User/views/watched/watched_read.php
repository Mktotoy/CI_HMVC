
        <h2 style="margin-top:0px">Watched Read</h2>
        <table class="table">
	    <tr><td>WatchedId</td><td><?php echo $watchedId; ?></td></tr>
	    <tr><td>VideoId</td><td><?php echo $videoId; ?></td></tr>
	    <tr><td>Login</td><td><?php echo $login; ?></td></tr>
	    <tr><td>Watched Timestamp</td><td><?php echo $watched_timestamp; ?></td></tr>
	    <tr><td><a href="<?php echo site_url('watched/update?watchedId='.$watchedId) ?>" class="btn btn-success">Update</a></td><td><a href="<?php echo site_url('watched') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
      