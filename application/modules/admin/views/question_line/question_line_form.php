
        <h2 style="margin-top:0px">Question_line <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="bigint">Question LineId <?php echo form_error('question_lineId') ?></label>
            <input type="text" class="form-control" name="question_lineId" id="question_lineId" placeholder="Question LineId" value="<?php echo $question_lineId; ?>" />
        </div>
	    <div class="form-group">
            <label for="bigint">QuestionId <?php echo form_error('questionId') ?></label>
            <input type="text" class="form-control" name="questionId" id="questionId" placeholder="QuestionId" value="<?php echo $questionId; ?>" />
        </div>
	    <div class="form-group">
            <label for="question_lineText">Question LineText <?php echo form_error('question_lineText') ?></label>
            <textarea class="form-control" rows="3" name="question_lineText" id="question_lineText" placeholder="Question LineText"><?php echo $question_lineText; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="tinyint">Question LineTrue <?php echo form_error('question_lineTrue') ?></label>
            <input type="text" class="form-control" name="question_lineTrue" id="question_lineTrue" placeholder="Question LineTrue" value="<?php echo $question_lineTrue; ?>" />
        </div>
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('question_line') ?>" class="btn btn-default">Cancel</a>
	</form>
    