
        <h2 style="margin-top:0px">Watched <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="bigint">WatchedId <?php echo form_error('watchedId') ?></label>
            <input type="text" class="form-control" name="watchedId" id="watchedId" placeholder="WatchedId" value="<?php echo $watchedId; ?>" />
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
            <label for="timestamp">Watched Timestamp <?php echo form_error('watched_timestamp') ?></label>
            <input type="text" class="form-control" name="watched_timestamp" id="watched_timestamp" placeholder="Watched Timestamp" value="<?php echo $watched_timestamp; ?>" />
        </div>
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('watched') ?>" class="btn btn-default">Cancel</a>
	</form>
    