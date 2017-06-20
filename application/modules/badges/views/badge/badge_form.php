
        <h2 style="margin-top:0px">Badge <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="bigint">BadgeId <?php echo form_error('badgeId') ?></label>
            <input type="text" class="form-control" name="badgeId" id="badgeId" placeholder="BadgeId" value="<?php echo $badgeId; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">BadgeTitle <?php echo form_error('badgeTitle') ?></label>
            <input type="text" class="form-control" name="badgeTitle" id="badgeTitle" placeholder="BadgeTitle" value="<?php echo $badgeTitle; ?>" />
        </div>
	    <div class="form-group">
            <label for="badgeText">BadgeText <?php echo form_error('badgeText') ?></label>
            <textarea class="form-control" rows="3" name="badgeText" id="badgeText" placeholder="BadgeText"><?php echo $badgeText; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">BadgeThumbnail <?php echo form_error('badgeThumbnail') ?></label>
            <input type="text" class="form-control" name="badgeThumbnail" id="badgeThumbnail" placeholder="BadgeThumbnail" value="<?php echo $badgeThumbnail; ?>" />
        </div>
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('badge') ?>" class="btn btn-default">Cancel</a>
	</form>
    