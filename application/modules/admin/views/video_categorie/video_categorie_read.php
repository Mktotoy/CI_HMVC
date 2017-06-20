
        <h2 style="margin-top:0px">Video_categorie Read</h2>
        <table class="table">
	    <tr><td>VideoId</td><td><?php echo $videoId; ?></td></tr>
	    <tr><td>Name</td><td><?php echo $name; ?></td></tr>
	    <tr><td><a href="<?php echo site_url('video_categorie/update/videoId') ?>" class="btn btn-success">Update</a></td><td><a href="<?php echo site_url('video_categorie') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
      