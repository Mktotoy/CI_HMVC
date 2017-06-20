
        <h2>Question List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>QuestionId</th>
		<th>VideoId</th>
		<th>QuestionText</th>
		<th>QuestionType</th>
		<th>Validate</th>
		
            </tr><?php
            foreach ($question_data as $question)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $question->questionId ?></td>
		      <td><?php echo $question->videoId ?></td>
		      <td><?php echo $question->questionText ?></td>
		      <td><?php echo $question->questionType ?></td>
		      <td><?php echo $question->validate ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
   