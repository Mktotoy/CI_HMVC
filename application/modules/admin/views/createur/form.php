
    <h2 style="margin-top:0px">Question <?php echo $button ?></h2>
    <form action="<?php echo $action; ?>" method="post">

	    <div class="form-group">
            <label for="char">VideoId <?php echo form_error('videoId') ?></label>
            <input type="text" class="form-control" name="videoId" id="videoId" placeholder="VideoId" value="<?php echo $videoId; ?>" />
        </div>
	    <div class="form-group">
            <label for="questionText">QuestionText <?php echo form_error('questionText') ?></label>
            <textarea class="form-control" rows="2" name="questionText" id="questionText" placeholder="QuestionText"><?php echo $questionText; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="enum">QuestionType <?php echo form_error('questionType') ?></label>
            <?php echo form_dropdown('questionType',array('radio'=>'Radio','checkbox'=>'Checkbox'),$questionType,array("id"=>"questionType","class"=>"form-control")); ?>
            
        </div>
        <p>
            <button type="button" value="Add" class="btn btn-success" onClick="addRow('dataTable')" ><i class="fa fa-plus"></i>  </button>
            <button type="button" value="Remove" class="btn btn-danger" onClick="removeRow('dataTable')" ><i class="fa fa-minus"></i> </button>
        </p>
        <table id="dataTable" class="form table dataTable">
            <tbody>
            <?php if(isset($question_lines)): foreach($question_lines as $question_line): ?>
                <tr>
                    <td>
                        <label for="question_lineText">Question LineText <?php echo form_error('question_lineText') ?></label>
                        <textarea class="form-control" rows="1" name="question_lineText[]" id="question_lineText" placeholder="Question LineText"><?php echo $question_line['question_lineText']; ?></textarea>
                    </td>
                    <td>
                        <label for="tinyint">Question LineTrue <?php echo form_error('question_lineTrue') ?></label>
                        <?php echo form_dropdown('question_lineTrue[]',array('0'=>'false','1'=>'true'),$question_line['question_lineTrue'],array("id"=>"question_lineTrue","class"=>"form-control")); ?>

                    </td>
                </tr>
            <?php endforeach; endif;?>
            <?php //if(!isset($facture_extras)): ?>
            <tr>
                <td>
                    <label for="question_lineText">Question LineText <?php echo form_error('question_lineText') ?></label>
                    <textarea class="form-control" rows="1" name="question_lineText[]" id="question_lineText" placeholder="Question LineText"></textarea>
                </td>
                <td>
                    <label for="tinyint">Question LineTrue <?php echo form_error('question_lineTrue') ?></label>
                    <?php echo form_dropdown('question_lineTrue[]',array('0'=>'false','1'=>'true'),null,array("id"=>"question_lineTrue","class"=>"form-control")); ?>
                </td>
            </tr>
            <?php //endif; ?>

            </tbody>
        </table>

	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('Createur') ?>" class="btn btn-default">Cancel</a>
	</form>
    