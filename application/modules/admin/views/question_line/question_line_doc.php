
        <h2>Question_line List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Question LineId</th>
		<th>QuestionId</th>
		<th>Question LineText</th>
		<th>Question LineTrue</th>
		
            </tr><?php
            foreach ($question_line_data as $question_line)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $question_line->question_lineId ?></td>
		      <td><?php echo $question_line->questionId ?></td>
		      <td><?php echo $question_line->question_lineText ?></td>
		      <td><?php echo $question_line->question_lineTrue ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
   