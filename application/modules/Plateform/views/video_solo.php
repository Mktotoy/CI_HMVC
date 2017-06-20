<?php
/**
 * Created by PhpStorm.
 * User: M418485
 * Date: 05/12/2016
 * Time: 16:21
 */
?>

<div class="page-title">
    <div class="title_left">
        <h3><?php echo $channel->channelType ?></h3>
    </div>

    <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#avis">
                Laissez un avis sur la vidéo
            </button>
        </div>
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
            <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#question">
                Proposer une question
            </button>
        </div>
    </div>
</div>
<script>
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').focus()
    })
</script>
<div class="modal fade" id="avis" tabindex="-1" role="dialog" aria-labelledby="avisLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="avisLabel">Laissez un avis</h4>
            </div>
            <form action="<?php echo site_url('Plateform/set_review'); ?>" method="post">
                <div class="modal-body">
                    <h2 style="margin-top:0px">Quels compétences avez vous aquises dans cette vidéo? etc..</h2>


                    <div class="form-group">
                        <input type="hidden" class="form-control" name="videoId" id="videoId" placeholder="VideoId" value="<?php echo $video->videoId; ?>" />
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="login" id="login" placeholder="Login" value="<?php echo $this->session->userdata('login'); ?>" />
                    </div>
                    <div class="form-group">
                        <label for="video_reviewText">Video ReviewText <?php echo form_error('video_reviewText') ?></label>
                        <textarea class="form-control" rows="3" name="video_reviewText" id="video_reviewText" placeholder="Video ReviewText"></textarea>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="question" tabindex="-1" role="dialog" aria-labelledby="questionLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="questionLabel">Proposer une Question</h4>
            </div>
            <form name="newQuestionForm" id="newQuestionForm" action="#">
                <div class="modal-body">
                    <span id="erreur"></span>
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="videoId" id="videoId" placeholder="VideoId" value="<?php echo $video->videoId; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="questionText">Question? <?php echo form_error('questionText') ?></label>
                        <textarea class="form-control" rows="2" name="questionText" id="questionText" placeholder="Question?"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="enum">Type de question <?php echo form_error('questionType') ?></label>
                        <?php echo form_dropdown('questionType',array('radio'=>'Une seule réponse','checkbox'=>'Plusieurs réponses'),null,array("id"=>"questionType","class"=>"form-control")); ?>

                    </div>
                    <p>
                        <button type="button" value="Add" class="btn btn-success" onClick="addRow('dataTable')" ><i class="fa fa-plus"></i>  </button>
                        <button type="button" value="Remove" class="btn btn-danger" onClick="removeRow('dataTable')" ><i class="fa fa-minus"></i> </button>
                    </p>
                    <table id="dataTable" class="form table dataTable">
                        <tbody>
                        <tr>
                            <td>
                                <label for="question_lineText">Réponse <?php echo form_error('question_lineText') ?></label>
                                <textarea class="form-control question_lineText" rows="1" name="question_lineText[]" id="question_lineText" placeholder="Réponse"></textarea>
                            </td>
                            <td>
                                <label for="tinyint">Bonne réponse? <?php echo form_error('question_lineTrue') ?></label>
                                <?php echo form_dropdown('question_lineTrue[]',array('0'=>'Non','1'=>'Oui'),null,array("id"=>"question_lineTrue","class"=>"form-control question_lineTrue")); ?>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2><i class="fa fa-bars"></i> <?php echo $video->videoTitle ?><small><?php echo $channel->channelName ?></small></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                    </ul>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="vid">
                <iframe width="100%" src="//www.youtube.com/embed/<?php echo $video->videoRessourceId ?>" allowfullscreen=""></iframe>
            </div><!--./vid -->
            
        </div>
    </div>
</div>

<!-- Start to do list -->
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Control Survey <small>Quizz</small></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                    </ul>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <?php foreach($questions as $question):?>
            <h2><?php echo $question['questionText'];?></h2>
            <div class="">
                <ul class="to_do">
                    <?php foreach($question['question_lines'] as $question_line):?>
                        <?php if($question['questionType'] == 'radio'):?>
                            <li>
                                <p>
                                    <input type="<?php echo $question['questionType'] ?>" name="<?php echo $question['questionId'] ?>" value="<?php echo $question_line['question_lineId'] ?>" class="flat"> <?php echo $question_line['question_lineText'] ?></p>
                            </li>
                        <?php endif;?>
                        <?php if($question['questionType'] == 'checkbox'):?>
                            <li>
                                <p>
                                    <input type="<?php echo $question['questionType'] ?>" name="<?php echo $question_line['question_lineId'] ?>" value="1" class="flat"> <?php echo $question_line['question_lineText'] ?></p>
                            </li>
                        <?php endif;?>


                    <?php endforeach;?>
                </ul>
            </div>
            <hr>
            <?php endforeach;?>
        </div>
    </div>
</div>
<!-- End to do list -->

