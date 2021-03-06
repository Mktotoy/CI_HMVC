<?php
/**
 * Created by PhpStorm.
 * User: M418485
 * Date: 05/12/2016
 * Time: 18:50
 */
?>


<div class="col-md-12">
    <div class="x_panel">
        <div class="x_content">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                    <h1><?php echo $theme; ?></h1>
                </div>

                <div class="clearfix"></div>
                <?php foreach($channels as $channel): ?>
                <a href="<?php echo site_url('Plateform/channel_videos/').$channel['channelID']; ?>" class="col-md-4 col-sm-4 col-xs-12 profile_details">
                    <div class="well profile_view">
                        <div class="col-sm-12 text-center">
                                <img src="<?php echo $channel['channelThumbnail']; ?>" alt="" class="img-thumbnail img-responsive">
                        </div>
                        <div class="col-xs-12 bottom text-center">
                            <div class="col-xs-12 col-sm-12 emphasis">
                                <p class="ratings">
                                    <?php echo $channel['channelName']; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </a>

                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
