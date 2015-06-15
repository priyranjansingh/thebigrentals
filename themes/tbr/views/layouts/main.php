<!DOCTYPE html>
<html>  
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <title>The Big Rentals</title>

    <?php
      $baseUrl = Yii::app()->theme->baseUrl; 
      $cs = Yii::app()->getClientScript();
      Yii::app()->clientScript->registerCoreScript('jquery');
    ?>

    <!-- Essential styles -->
    <?php
        $cs->registerCssFile($baseUrl.'/assets/bootstrap/css/bootstrap.min.css');
        $cs->registerCssFile($baseUrl.'/font-awesome/css/font-awesome.min.css');
        $cs->registerCssFile($baseUrl.'/assets/fancybox/jquery.fancybox8cbb.css?v=2.1.5');
        $cs->registerCssFile($baseUrl.'/css/global-style.css');
        $cs->registerCssFile($baseUrl.'/css/hcarousel.css');
    ?>
    <!-- <link rel="stylesheet" href="<?php echo $baseUrl;?>/assets/bootstrap/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $baseUrl;?>/font-awesome/css/font-awesome.min.css" type="text/css"> 
    <link rel="stylesheet" href="<?php echo $baseUrl;?>/assets/fancybox/jquery.fancybox8cbb.css?v=2.1.5" media="screen"> --> 
     
    <!-- Boomerang styles -->
        <!-- <link id="wpStylesheet" type="text/css" href="<?php echo $baseUrl;?>/css/global-style.css" rel="stylesheet" media="screen"> -->
        

    <!-- Favicon -->
    <link href="<?php echo $baseUrl;?>/images/favicon.png" rel="icon" type="image/png">

    <!-- Assets -->
    <link rel="stylesheet" href="<?php echo $baseUrl;?>/assets/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo $baseUrl;?>/assets/owl-carousel/owl.theme.css">
    <link rel="stylesheet" href="<?php echo $baseUrl;?>/assets/sky-forms/css/sky-forms.css">    
    <!--[if lt IE 9]>
        <link rel="stylesheet" href="assets/sky-forms/css/sky-forms-ie8.css">
    <![endif]-->

    <!-- Required JS -->
    <script src="<?php echo $baseUrl;?>/js/jquery.js"></script>
    <script src="<?php echo $baseUrl;?>/js/jquery-ui.min.js"></script>
    <script src="<?php echo $baseUrl;?>/js/control.js"></script>

    <!-- Page scripts -->
    
</head>
<body>
<!-- MAIN WRAPPER -->
<div class="body-wrap">
    <!-- HEADER -->
    <div id="divHeaderWrapper">
        <?php require_once('navigation.php'); ?>
    </div>

    
    <!-- MAIN CONTENT -->
    <section class="slice no-padding bb">
        <div class="wp-section">
            <div class="container-fluid no-padding">
                <div class="row">
                    <div class="col-md-12 pos-relative">
                        <!-- JumboTron -->
                        <?php require_once('banner.php'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include('top_destination.php'); ?>

    <?php echo $content; ?>
    <?php require_once('footer.php'); ?>
</body>
</html>