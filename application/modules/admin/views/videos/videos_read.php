
        <h2 style="margin-top:0px">Videos Read</h2>
        <table class="table">
	    <tr><td>VideoId</td><td><?php echo $videoId; ?></td></tr>
	    <tr><td>VideoDate</td><td><?php echo $videoDate; ?></td></tr>
	    <tr><td>VideoTitle</td><td><?php echo $videoTitle; ?></td></tr>
	    <tr><td>VideoDescription</td><td><?php echo $videoDescription; ?></td></tr>
	    <tr><td>VideoRessourceId</td><td><?php echo $videoRessourceId; ?></td></tr>
	    <tr><td>VideoState</td><td><?php echo $videoState; ?></td></tr>
	    <tr><td>ChannelID</td><td><?php echo $channelID; ?></td></tr>
	    <tr><td>VideoThumbnail</td><td><?php echo $videoThumbnail; ?></td></tr>
	    <tr><td>Pertinent</td><td><?php echo $pertinent; ?></td></tr>
	    <tr><td><a href="<?php echo site_url('videos/update/videoId') ?>" class="btn btn-success">Update</a></td><td><a href="<?php echo site_url('videos') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
      