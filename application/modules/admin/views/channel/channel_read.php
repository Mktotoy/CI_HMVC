
        <h2 style="margin-top:0px">Channel Read</h2>
        <table class="table">
	    <tr><td>ChannelID</td><td><?php echo $channelID; ?></td></tr>
	    <tr><td>ChannelName</td><td><?php echo $channelName; ?></td></tr>
	    <tr><td>ChannelKeywords</td><td><?php echo $channelKeywords; ?></td></tr>
	    <tr><td>ChannelLastUpdate</td><td><?php echo $channelLastUpdate; ?></td></tr>
	    <tr><td>ChannelType</td><td><?php echo $channelType; ?></td></tr>
	    <tr><td>ChannelThumbnail</td><td><?php echo $channelThumbnail; ?></td></tr>
	    <tr><td><a href="<?php echo site_url('channel/update/channelID') ?>" class="btn btn-success">Update</a></td><td><a href="<?php echo site_url('channel') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
      