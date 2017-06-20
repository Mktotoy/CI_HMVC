<?php
/**
 * Created by PhpStorm.
 * User: m418485
 * Date: 09/06/2016
 * Time: 16:23
 */

?>

<html>
<head>

    <title><?php echo $titre; ?>.</title>
    <link rel="icon" href="<?php echo $icon; ?>">
    <meta name="description" content="">
    <meta name="author" content="<?php echo ""; ?>">
    <meta http-equiv="Content-Type" content="text/html; charset=<?php echo $charset; ?>" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo css_url('css/template/metisMenu.min'); ?>" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo css_url('css/template/sbadmin2'); ?>" />

    <?php foreach($css as $url): ?>
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $url; ?>" />
    <?php endforeach; ?>

</head>
<body style="overflow-y:hidden">
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-orange navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="" href="<?php echo base_url()?>"><img src="<?php echo $logo?>" width="100"/></a>
        </div>
        <!-- /.navbar-header -->


        <?php if(!empty($top_navigation)): ?>
            <ul class="nav navbar-top-links navbar-right">
                <?php echo $top_navigation;?>
            </ul>
        <?php endif; ?>
    </nav>

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <?php if(!empty($left_navigation)) echo $left_navigation;?>
            <ul class="nav" id="side-menu">
                
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
    <div id="page-wrapper">
        <?php
        echo $contenu;
        ?>

    </div>
    <!-- /#page-wrapper -->

</div>
<footer></footer>

<script src="<?php echo js_url('js/metisMenu.min'); ?>"></script>
<script src="<?php echo js_url('js/sb-admin-2'); ?>"></script>

<?php foreach($js as $url): ?>
    <script type="text/javascript" src="<?php echo $url; ?>"></script>
<?php endforeach; ?>
<!--search script-->
<?php if(!empty($subscript)) echo $subscript;?>
</body>
</html>
