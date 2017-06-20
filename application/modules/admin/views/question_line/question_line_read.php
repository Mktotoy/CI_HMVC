
        <h2 style="margin-top:0px">Question_line Read</h2>
        <table class="table">
	    <tr><td>Question LineId</td><td><?php echo $question_lineId; ?></td></tr>
	    <tr><td>QuestionId</td><td><?php echo $questionId; ?></td></tr>
	    <tr><td>Question LineText</td><td><?php echo $question_lineText; ?></td></tr>
	    <tr><td>Question LineTrue</td><td><?php echo $question_lineTrue; ?></td></tr>
	    <tr><td><a href="<?php echo site_url('question_line/update/question_lineId') ?>" class="btn btn-success">Update</a></td><td><a href="<?php echo site_url('question_line') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
      