
        <h2 style="margin-top:0px">Question Read</h2>
        <table class="table">
	    <tr><td>QuestionId</td><td><?php echo $questionId; ?></td></tr>
	    <tr><td>VideoId</td><td><?php echo $videoId; ?></td></tr>
	    <tr><td>QuestionText</td><td><?php echo $questionText; ?></td></tr>
	    <tr><td>QuestionType</td><td><?php echo $questionType; ?></td></tr>
	    <tr><td>Validate</td><td><?php echo $validate; ?></td></tr>
	    <tr><td><a href="<?php echo site_url('question/update/questionId') ?>" class="btn btn-success">Update</a></td><td><a href="<?php echo site_url('question') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
      