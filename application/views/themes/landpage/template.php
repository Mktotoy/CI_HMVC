<?php
/**
 * Created by PhpStorm.
 * User: M418485
 * Date: 04/12/2016
 * Time: 10:03
 */


?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $titre; ?>.</title>
    <link rel="icon" href="<?php echo $icon; ?>">
    <meta http-equiv="Content-Type" content="text/html; charset=<?php echo $charset; ?>" />



    <?php foreach($css as $url): ?>
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $url; ?>" />
    <?php endforeach; ?>

    <!-- Custom Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="<?php echo css_url('startbootstrap/magnific-popup'); ?>" rel="stylesheet">
    <!-- Theme CSS -->
    <link href="<?php echo css_url('startbootstrap/creative'); ?>" rel="stylesheet">



</head>

<body id="page-top">


<header>
    <div class="header-content">
        <div class="header-content-inner">
          <?php echo $contenu;?>
        </div>
    </div>
</header>


<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <h2 class="section-heading">Let's Get In Touch!</h2>
                <hr class="primary">
                <p>Ready to start your next project with us? That's great! Give us a call or send us an email and we will get back to you as soon as possible!</p>
            </div>
            <div class="col-lg-4 col-lg-offset-2 text-center">
                <i class="fa fa-phone fa-3x sr-contact"></i>
                <p>123-456-6789</p>
            </div>
            <div class="col-lg-4 text-center">
                <i class="fa fa-envelope-o fa-3x sr-contact"></i>
                <p><a href="mailto:your-email@your-domain.com">feedback@startbootstrap.com</a></p>
            </div>
        </div>
    </div>
</section>

<?php foreach($js as $url): ?>
    <script type="text/javascript" src="<?php echo $url; ?>"></script>
<?php endforeach; ?>

<script src="<?php echo js_url('startbootstrap/magnific-popup'); ?>"></script>
<script src="<?php echo css_url('startbootstrap/creative'); ?>"></script>


</body>

</html>
