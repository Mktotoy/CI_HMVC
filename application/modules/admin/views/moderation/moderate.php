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
                    <h1><?php echo "Modération des vidéos - ".($validate==1?"Valider":"Refuser")." les vidéos"; ?></h1>
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

                <?php foreach($videos as $video): ?>
                    <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                        <div class="well profile_view">
                            <div class="col-sm-12 text-center">
                                <img src="<?php echo $video->videoThumbnail; ?>" alt="" class="img-thumbnail img-responsive">
                            </div>
                            <div class="col-xs-12 bottom text-center">
                                <div class="col-xs-12 col-sm-12 emphasis">
                                    <p class="ratings">
                                        <?php echo $video->videoTitle; ?>
                                        <input class="form-control checkbox" type="checkbox" name="moderate[]" value="<?php echo $video->videoId ?>"/>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </form>
        </div>
    </div>
</div>
