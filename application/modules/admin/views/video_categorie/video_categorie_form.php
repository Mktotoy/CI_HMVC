
        <h2 style="margin-top:0px">Video_categorie <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="char">VideoId <?php echo form_error('videoId') ?></label>
            <input type="text" class="form-control" name="videoId" id="videoId" placeholder="VideoId" value="<?php echo $videoId; ?>" />
        </div>
	    <div class="form-group">
            <label for="char">Name <?php echo form_error('name') ?></label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
        </div>
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('video_categorie') ?>" class="btn btn-default">Cancel</a>
	</form>
    