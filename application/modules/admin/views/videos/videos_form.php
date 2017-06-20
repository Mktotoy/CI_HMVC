
        <h2 style="margin-top:0px">Videos <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="char">VideoId <?php echo form_error('videoId') ?></label>
            <input type="text" class="form-control" name="videoId" id="videoId" placeholder="VideoId" value="<?php echo $videoId; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">VideoDate <?php echo form_error('videoDate') ?></label>
            <input type="text" class="form-control" name="videoDate" id="videoDate" placeholder="VideoDate" value="<?php echo $videoDate; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">VideoTitle <?php echo form_error('videoTitle') ?></label>
            <input type="text" class="form-control" name="videoTitle" id="videoTitle" placeholder="VideoTitle" value="<?php echo $videoTitle; ?>" />
        </div>
	    <div class="form-group">
            <label for="videoDescription">VideoDescription <?php echo form_error('videoDescription') ?></label>
            <textarea class="form-control" rows="3" name="videoDescription" id="videoDescription" placeholder="VideoDescription"><?php echo $videoDescription; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="char">VideoRessourceId <?php echo form_error('videoRessourceId') ?></label>
            <input type="text" class="form-control" name="videoRessourceId" id="videoRessourceId" placeholder="VideoRessourceId" value="<?php echo $videoRessourceId; ?>" />
        </div>
	    <div class="form-group">
            <label for="char">VideoState <?php echo form_error('videoState') ?></label>
            <input type="text" class="form-control" name="videoState" id="videoState" placeholder="VideoState" value="<?php echo $videoState; ?>" />
        </div>
	    <div class="form-group">
            <label for="char">ChannelID <?php echo form_error('channelID') ?></label>
            <input type="text" class="form-control" name="channelID" id="channelID" placeholder="ChannelID" value="<?php echo $channelID; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">VideoThumbnail <?php echo form_error('videoThumbnail') ?></label>
            <input type="text" class="form-control" name="videoThumbnail" id="videoThumbnail" placeholder="VideoThumbnail" value="<?php echo $videoThumbnail; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Pertinent <?php echo form_error('pertinent') ?></label>
            <input type="text" class="form-control" name="pertinent" id="pertinent" placeholder="Pertinent" value="<?php echo $pertinent; ?>" />
        </div>
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('videos') ?>" class="btn btn-default">Cancel</a>
	</form>
    