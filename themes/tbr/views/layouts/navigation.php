<?php $baseUrl = Yii::app()->baseUrl; ?>
<?php
$cats = new Menus();
$menus = $cats->getMenu();
?>
<header class="header-standard-2">     
    <!-- MAIN NAV -->
    <div class="navbar navbar-wp navbar-arrow mega-nav" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle navbar-toggle-aside-menu">
                    <i class="fa fa-outdent icon-custom"></i>
                </button>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <i class="fa fa-bars icon-custom"></i>
                </button>

                <a class="navbar-brand" href="<?php echo $baseUrl; ?>" title="The Big Rentals">
                    <img src="<?php echo $baseUrl; ?>/images/logo.png" alt="The Big Rentals">
                </a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden-md hidden-lg">
                        <div class="bg-light-gray">
                            <form class="form-horizontal form-light p-15" role="form">
                                <div class="input-group input-group-lg">
                                    <input type="text" class="form-control" placeholder="I want to find ...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-white" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </li>

                    <?php
                    foreach ($menus as $key => $val) {
                        ?>      
                        <li class="dropdown">
                            <a href="<?php echo (!empty($val['url'])) ? $val['url'] : "#"; ?>" class="dropdown-toggle" ><?php echo $val['name']; ?></a>
                            <?php
                            if (!empty($val['children'])) {
                                ?>
                                <ul class="dropdown-menu">
                                <?php
                                foreach ($val['children'] as $k => $v) {
                                    ?>  
                                        <li class="<?php echo (!empty($v['children'])) ? "dropdown-submenu" : ''; ?>">
                                            <a tabindex="-1" href="<?php echo (!empty($v['url'])) ? $v['url'] : "#"; ?>"><?php echo $v['name'] ?></a>
                                        <?php
                                        if (!empty($v['children'])) {
                                            ?>
                                                <ul class="dropdown-menu">
                                                <?php
                                                foreach ($v['children'] as $k1 => $v1) {
                                                    ?>     
                                                        <li><a tabindex="-1" href="<?php echo (!empty($v1['url'])) ? $v1['url'] : "#"; ?>"><?php echo $v1['name']; ?></a></li>
                                                        <?php
                                                    }
                                                    ?>
                                                </ul>
                                                    <?php
                                                }
                                                ?>
                                        </li>   
                                            <?php
                                        }
                                        ?>
                                </ul>
                                    <?php
                                }
                                ?>
                        </li>   
                            <?php
                        }
                        ?>


                    <?php if (!isFrontUserLoggedIn()) { ?>
                        <li class="dropdown">
                            <a href="http//www.google.com" class="dropdown-toggle" >Login</a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url() . "/user/login"; ?>">Login</a></li>   
                                <li><a href="<?php echo base_url() . "/user/register"; ?>">Sign Up</a></li>  
                            </ul>
                        </li>
<?php } else { ?>
                        <li class="dropdown">
                            
                            <a href="" class="dropdown-toggle" data-toggle="dropdown">
                                <img src ="<?php echo Yii::app()->params['s3_base_url'].Yii::app()->session['user_image']; ?>" height="20" width="20" >
                                <?php echo Yii::app()->session['first_name']; ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url() . "/user/myaccount"; ?>">My Account</a></li>                            
                                <li><a href="<?php echo base_url() . "/user/logout"; ?>">Logout</a></li>                            
                            </ul>
                        </li>
<?php } ?>



                    <li class="dropdown dropdown-aux animate-click" data-animate-in="animated bounceInUp" data-animate-out="animated fadeOutDown" style="z-index:500;">
                        <a href="#" class="dropdown-form-toggle" data-toggle="dropdown"><i class="fa fa-search"></i></a>
                        <ul class="dropdown-menu dropdown-menu-user animate-wr">
                            <li id="dropdownForm">
                                <div class="dropdown-form">
                                    <form class="form-horizontal form-light p-15" role="form">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="I want to find ...">
                                            <span class="input-group-btn">
                                                <button class="btn btn-base" type="button">Go</button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>

            </div><!--/.nav-collapse -->
        </div>
    </div>
</header>