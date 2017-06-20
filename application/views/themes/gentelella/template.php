<?php
/**
 * Created by PhpStorm.
 * User: m418485
 * Date: 09/06/2016
 * Time: 16:23
 */

?>

<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $titre; ?>.</title>
    <link rel="icon" href="<?php echo $icon; ?>">
    <meta http-equiv="Content-Type" content="text/html; charset=<?php echo $charset; ?>" />




    <?php foreach($css as $url): ?>
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $url; ?>" />
    <?php endforeach; ?>
    <!-- Custom Theme Style -->
    <link href="<?php echo css_url('gentelella/custom.min'); ?>" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="<?php echo base_url();?>" class="site_title"><img class="" height=80%" src="<?php echo $logo; ?>"/> <span>Learn Plateform</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile">
                    <div class="profile_pic">
                        <img src="<?php echo base_url();?>assets/img/profile.jpg" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Bonjour</span>
                        <h2><?php echo $this->session->userdata('user')['firstname']." ".$this->session->userdata('user')['lastname'];?></h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                    <div class="menu_section">
                        <h3>Vidéos</h3>
                        <ul class="nav side-menu">
                            <?php if(!empty($left_navigation)) echo $left_navigation;?>

                        </ul>
                    </div>

                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Lock">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Logout">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                                <?php if(!empty($top_navigation)) echo $top_navigation;?>

                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div>
                
                
                <?php
                echo $contenu;
                ?>

            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
            <div class="pull-right">
                Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>

<!-- Custom Theme Scripts -->
<?php foreach($js as $url): ?>
    <script type="text/javascript" src="<?php echo $url; ?>"></script>
<?php endforeach; ?>

<script src="<?php echo js_url('gentelella/custom.min'); ?>"></script>


<!--search script-->
<?php if(!empty($subscript)) echo $subscript;?>
<!-- Flot -->

</body>
</html>
