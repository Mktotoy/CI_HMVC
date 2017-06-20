
        <h2 style="margin-top:0px">Usergroup <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="tinyint">IDUserGroup <?php echo form_error('IDUserGroup') ?></label>
            <input type="text" class="form-control" name="IDUserGroup" id="IDUserGroup" placeholder="IDUserGroup" value="<?php echo $IDUserGroup; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Libelle <?php echo form_error('Libelle') ?></label>
            <input type="text" class="form-control" name="Libelle" id="Libelle" placeholder="Libelle" value="<?php echo $Libelle; ?>" />
        </div>
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('usergroup') ?>" class="btn btn-default">Cancel</a>
	</form>
    