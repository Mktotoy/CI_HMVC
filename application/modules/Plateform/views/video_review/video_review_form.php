
        <h2 style="margin-top:0px">Video_review <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="bigint">Video ReviewId <?php echo form_error('video_reviewId') ?></label>
            <input type="text" class="form-control" name="video_reviewId" id="video_reviewId" placeholder="Video ReviewId" value="<?php echo $video_reviewId; ?>" />
        </div>
	    <div class="form-group">
            <label for="char">VideoId <?php echo form_error('videoId') ?></label>
            <input type="text" class="form-control" name="videoId" id="videoId" placeholder="VideoId" value="<?php echo $videoId; ?>" />
        </div>
	    <div class="form-group">
            <label for="char">Login <?php echo form_error('login') ?></label>
            <input type="text" class="form-control" name="login" id="login" placeholder="Login" value="<?php echo $login; ?>" />
        </div>
	    <div class="form-group">
            <label for="video_reviewText">Video ReviewText <?php echo form_error('video_reviewText') ?></label>
            <textarea class="form-control" rows="3" name="video_reviewText" id="video_reviewText" placeholder="Video ReviewText"><?php echo $video_reviewText; ?></textarea>
        </div>
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('video_review') ?>" class="btn btn-default">Cancel</a>
	</form>
    