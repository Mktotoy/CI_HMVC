
        <h2 style="margin-top:0px">Video_review Read</h2>
        <table class="table">
	    <tr><td>Video ReviewId</td><td><?php echo $video_reviewId; ?></td></tr>
	    <tr><td>VideoId</td><td><?php echo $videoId; ?></td></tr>
	    <tr><td>Login</td><td><?php echo $login; ?></td></tr>
	    <tr><td>Video ReviewText</td><td><?php echo $video_reviewText; ?></td></tr>
	    <tr><td><a href="<?php echo site_url('video_review/update/video_reviewId') ?>" class="btn btn-success">Update</a></td><td><a href="<?php echo site_url('video_review') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
      