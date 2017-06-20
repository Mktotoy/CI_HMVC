
        <h2 style="margin-top:0px">Question <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="bigint">QuestionId <?php echo form_error('questionId') ?></label>
            <input type="text" class="form-control" name="questionId" id="questionId" placeholder="QuestionId" value="<?php echo $questionId; ?>" />
        </div>
	    <div class="form-group">
            <label for="char">VideoId <?php echo form_error('videoId') ?></label>
            <input type="text" class="form-control" name="videoId" id="videoId" placeholder="VideoId" value="<?php echo $videoId; ?>" />
        </div>
	    <div class="form-group">
            <label for="questionText">QuestionText <?php echo form_error('questionText') ?></label>
            <textarea class="form-control" rows="3" name="questionText" id="questionText" placeholder="QuestionText"><?php echo $questionText; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="enum">QuestionType <?php echo form_error('questionType') ?></label>
            <input type="text" class="form-control" name="questionType" id="questionType" placeholder="QuestionType" value="<?php echo $questionType; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Validate <?php echo form_error('validate') ?></label>
            <input type="text" class="form-control" name="validate" id="validate" placeholder="Validate" value="<?php echo $validate; ?>" />
        </div>
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('question') ?>" class="btn btn-default">Cancel</a>
	</form>
    