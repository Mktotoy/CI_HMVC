<?php
/**
 * Created by PhpStorm.
 * User: M418485
 * Date: 05/12/2016
 * Time: 18:44
 */

?>

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Mon Profil <small><?php echo $this->session->userdata('user')['firstname']." ".$this->session->userdata('user')['lastname'];?></small></h2>
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
            <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                <div class="profile_img">
                    <div id="crop-avatar">
                        <!-- Current avatar -->
                        <img class="img-responsive avatar-view" src="<?php echo base_url();?>/assets/img/profile.jpg" alt="Avatar" title="Change the avatar">
                    </div>
                </div>
                <h3><?php echo $this->session->userdata('user')['firstname']." ".$this->session->userdata('user')['lastname'];?></h3>

                <ul class="list-unstyled user_data">
                    <li><i class="fa fa-map-marker user-profile-icon"></i> San Francisco, California, USA
                    </li>

                    <li>
                        <i class="fa fa-briefcase user-profile-icon"></i> Software Engineer
                    </li>

                    <li class="m-top-xs">
                        <i class="fa fa-external-link user-profile-icon"></i>
                        <a href="http://www.kimlabs.com/profile/" target="_blank">www.kimlabs.com</a>
                    </li>
                </ul>

                <a href="<?php echo site_url('User/edit_profile'); ?>" class="btn btn-success"><i class="fa fa-edit m-right-xs"></i> Modifier le profil</a>
                <br />

                <!-- start skills -->
                <h4>Compétences</h4>
                <ul class="list-unstyled user_data">
                    <li>
                        <p>Web Applications</p>
                        <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                        </div>
                    </li>
                    <li>
                        <p>Website Design</p>
                        <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="70"></div>
                        </div>
                    </li>
                    <li>
                        <p>Automation & Testing</p>
                        <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="30"></div>
                        </div>
                    </li>
                    <li>
                        <p>UI / UX</p>
                        <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                        </div>
                    </li>
                </ul>
                <!-- end of skills -->

            </div>
            <div class="col-md-9 col-sm-9 col-xs-12">

                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#recentactivity" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Activité Récente</a>
                        </li>
                        <li role="presentation" class=""><a href="#badges" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Mes badges</a>
                        </li>
                        <li role="presentation" class=""><a href="#autre" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Autre</a>
                        </li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="recentactivity" aria-labelledby="home-tab">

                            <!-- start recent activity -->
                            <ul class="messages">
                                <?php foreach($watched as $watched_line):?>
                                <li>
                                    <a href="<?php echo site_url('Plateform/video_solo/').$watched_line['videoId']; ?>">
                                       <img src="<?php echo $watched_line['videoDetails'][0]['videoThumbnail']?>" class="avatar" alt="Avatar">
                                        <div class="message_date">
                                            <h3 class="date text-info"><?php echo date("d",strtotime($watched_line['watched_timestamp']))?></h3>
                                            <p class="month"><?php echo date("M",strtotime($watched_line['watched_timestamp']))?></p>
                                        </div>
                                        <div class="message_wrapper">
                                            <h4 class="heading"><?php echo $watched_line['videoDetails'][0]['videoTitle']?></h4>
                                            <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                                            <br />
                                        </div>
                                    </a>
                                </li>
                                <?php endforeach;?>
                            </ul>
                            <!-- end recent activity -->

                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="badges" aria-labelledby="profile-tab">

                            <!-- start user projects -->
                            <table class="data table table-striped no-margin">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Project Name</th>
                                    <th>Client Company</th>
                                    <th class="hidden-phone">Hours Spent</th>
                                    <th>Contribution</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>New Company Takeover Review</td>
                                    <td>Deveint Inc</td>
                                    <td class="hidden-phone">18</td>
                                    <td class="vertical-align-mid">
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-success" data-transitiongoal="35"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>New Partner Contracts Consultanci</td>
                                    <td>Deveint Inc</td>
                                    <td class="hidden-phone">13</td>
                                    <td class="vertical-align-mid">
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-danger" data-transitiongoal="15"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Partners and Inverstors report</td>
                                    <td>Deveint Inc</td>
                                    <td class="hidden-phone">30</td>
                                    <td class="vertical-align-mid">
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-success" data-transitiongoal="45"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>New Company Takeover Review</td>
                                    <td>Deveint Inc</td>
                                    <td class="hidden-phone">28</td>
                                    <td class="vertical-align-mid">
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-success" data-transitiongoal="75"></div>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <!-- end user projects -->

                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="autre" aria-labelledby="profile-tab">
                            <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui
                                photo booth letterpress, commodo enim craft beer mlkshk </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

