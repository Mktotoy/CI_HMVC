<?php
/**
 * Created by PhpStorm.
 * User: M418485
 * Date: 09/12/2016
 * Time: 14:07
 */

?>


<div class="col-md-12">
    <div class="x_panel">
        <div class="x_content">
            <form action="<?php echo site_url('admin/Moderation/moderate_action')?>" method="post" class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                    <h1><?php echo "Modération des questions - ".($validate==1?"Valider":"Refuser")." les vidéos"; ?></h1>
                    <input class="form-control" type="hidden" name="validate" value="<?php echo $validate ?>"/>
                    <div class="col-md-6 col-sm-6 col-xs-6 text-center">
                        <button class="form-control btn btn-primary" value="Moderate" type="submit">Moderate</button>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3 text-center">
                        <button class="form-control btn btn-default" value="SelectAll" onClick="selectall()" type="button">Select all</button>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3 text-center">
                        <button class="form-control btn btn-warning" value="DeselectAll" onClick="deselectall()" type="button">Deselect all</button>
                    </div>

                </div>

                <div class="clearfix"></div>



                        <?php foreach($questions as $question):?>
                        <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                            <h2><?php echo $question['questionText']."- ".$question['questionType'] ;?></h2>
                            <div class="">
                                <ul class="to_do">
                                    <?php foreach($question['question_lines'] as $question_line):?>
                                        <?php if($question['questionType'] == 'radio'):?>
                                            <li>
                                                <p>
                                                    <p><?php echo $question_line['question_lineText']."-".$question_line['question_lineTrue'] ?></p>
                                            </li>
                                        <?php endif;?>
                                        <?php if($question['questionType'] == 'checkbox'):?>
                                            <li>
                                                <p>
                                                <p><?php echo $question_line['question_lineText']."-".$question_line['question_lineTrue'] ?></p>                                            </li>
                                        <?php endif;?>


                                    <?php endforeach;?>
                                </ul>
                            </div>
                            <hr>

                    </div>
                <?php endforeach; ?>

            </form>
        </div>
    </div>
</div>
