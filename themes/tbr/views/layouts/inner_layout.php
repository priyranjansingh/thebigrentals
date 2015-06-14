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
    <script src="<?php echo $baseUrl;?>/js/jquery-ui.min.js"></script>
    <?php if(Yii::app()->controller->action->id == "checkout"):  ?>
    <script src="https://www.2checkout.com/checkout/api/2co.min.js"></script>
    <?php endif; ?>
     
    <!-- Page scripts -->
    <script>
            var base_url = "<?php echo base_url();  ?>";
    </script>    
</head>
<body>
    <span class="loader"></span>
<!-- MODALS -->

<!-- MOBILE MENU - Option 2 -->
<section id="navMobile" class="aside-menu left">
    <form class="form-horizontal form-search">
        <div class="input-group">
            <input type="search" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
                <button id="btnHideMobileNav" class="btn btn-close" type="button" title="Hide sidebar"><i class="fa fa-times"></i></button>
            </span>
        </div>
    </form>
    <div id="dl-menu" class="dl-menuwrapper">
        <ul class="dl-menu"></ul>
    </div>
</section> 

<!-- MAIN WRAPPER -->
<div class="body-wrap">
    <!-- HEADER -->
    <div id="divHeaderWrapper">
        <?php require_once('navigation.php'); ?>
    </div>

<!-- Optional header components (ex: slider) -->
         
    
    <!-- MAIN CONTENT -->
    <div class="pg-opt">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>User account</h2>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Pages</a></li>
                        <li class="active">User account</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <?php echo $content; ?>
    <?php require_once('footer.php'); ?>
</body>
</html>