
        <h2 style="margin-top:0px">Channel <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="char">ChannelID <?php echo form_error('channelID') ?></label>
            <input type="text" class="form-control" name="channelID" id="channelID" placeholder="ChannelID" value="<?php echo $channelID; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">ChannelName <?php echo form_error('channelName') ?></label>
            <input type="text" class="form-control" name="channelName" id="channelName" placeholder="ChannelName" value="<?php echo $channelName; ?>" />
        </div>
	    <div class="form-group">
            <label for="channelKeywords">ChannelKeywords <?php echo form_error('channelKeywords') ?></label>
            <textarea class="form-control" rows="3" name="channelKeywords" id="channelKeywords" placeholder="ChannelKeywords"><?php echo $channelKeywords; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="bigint">ChannelLastUpdate <?php echo form_error('channelLastUpdate') ?></label>
            <input type="text" class="form-control" name="channelLastUpdate" id="channelLastUpdate" placeholder="ChannelLastUpdate" value="<?php echo $channelLastUpdate; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">ChannelType <?php echo form_error('channelType') ?></label>
            <input type="text" class="form-control" name="channelType" id="channelType" placeholder="ChannelType" value="<?php echo $channelType; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">ChannelThumbnail <?php echo form_error('channelThumbnail') ?></label>
            <input type="text" class="form-control" name="channelThumbnail" id="channelThumbnail" placeholder="ChannelThumbnail" value="<?php echo $channelThumbnail; ?>" />
        </div>
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('channel') ?>" class="btn btn-default">Cancel</a>
	</form>
    