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

    <!-- Page scripts -->
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>
    <script>
    var base_url = '<?php echo base_url();   ?>';
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

<!-- SLIDEBAR -->
<section id="asideMenu" class="aside-menu right">
    <form class="form-horizontal form-search">
        <div class="input-group">
            <input type="search" class="form-control" placeholder="Search..." />
            <span class="input-group-btn">
                <button id="btnHideAsideMenu" class="btn btn-close" type="button" title="Hide sidebar"><i class="fa fa-times"></i></button>
            </span>
        </div>
    </form>
    
    <h5 class="side-section-title">Optional sidebar menu</h5>
    <div class="nav">
        <ul>
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">About us</a>
            </li>
            <li>
                <a href="#">Blog</a>
            </li>
            <li>
                <a href="#">Work</a>
            </li>
            <li>
                <a href="#">Online shop</a>
            </li>
        </ul>
    </div>
    
    <h5 class="side-section-title">Social media</h5>
    <div class="social-media">
        <a href="#"><i class="fa fa-facebook facebook"></i></a>
        <a href="#"><i class="fa fa-google-plus google"></i></a>
        <a href="#"><i class="fa fa-twitter twitter"></i></a>
    </div>
    
    <h5 class="side-section-title">Contact information</h5>
    <div class="contact-info">
        <h5>Address</h5>
        <p>5th Avenue, New York - United States</p>
        
        <h5>Email</h5>
        <p>hello@webpixels.ro</p>
        
        <h5>Phone</h5>
        <p>+10 724 1234 567</p>
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
        
    </div>

    <?php echo $content; ?>
    <?php require_once('footer.php'); ?>
</body>
</html>