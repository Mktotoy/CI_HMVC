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
    <?php foreach($css as $url): ?>
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $url; ?>" />
    <?php endforeach; ?>

</head>
<body style="overflow-y:hidden">
<div id="wrapper">


        <?php
        echo $contenu;
        ?>


    <!-- /#page-wrapper -->

</div>


<?php foreach($js as $url): ?>
    <script type="text/javascript" src="<?php echo $url; ?>"></script>
<?php endforeach; ?>
<!--search script-->
</body>
</html>
