<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <!-- Be sure to leave the brand out there if you want it shown -->
            <a class="brand" href="#">thebigrentals.com <small>admin</small></a>

            <div class="nav-collapse">
                <?php
                $isAdmin = 0;
                $role = Yii::app()->user->getState('role');
                if ($role == "admin") {
                    $isAdmin = 1;
                }
                ?>
                <?php
                $this->widget('zii.widgets.CMenu', array(
                    'htmlOptions' => array('class' => 'pull-right nav'),
                    'submenuHtmlOptions' => array('class' => 'dropdown-menu'),
                    'itemCssClass' => 'item-test',
                    'encodeLabel' => false,
                    'items' => array(
                        array('label' => 'Dashboard', 'url' => base_url() . '/admin', 'visible' => !Yii::app()->user->isGuest),
                        array('label' => 'Properties', 'url' => '#', 'visible' => (!Yii::app()->user->isGuest && $isAdmin), 'itemOptions' => array('class' => 'dropdown', 'tabindex' => "-1"), 'linkOptions' => array('class' => 'dropdown-toggle', 'data-toggle' => "dropdown"),
                            'items' => array(
                                array('label' => 'Categories', 'url' => base_url() . '/admin/category'),
                                array('label' => 'Amenities & Features', 'url' => base_url() . '/admin/amenitiesFeatures'),
                                array('label' => 'Listed IN', 'url' => base_url() . '/admin/listed'),
                                array('label' => 'Property', 'url' => base_url() . '/admin/property'),
                            )),
                        array('label' => 'Top Destination', 'url' => base_url() . '/admin/topDestination', 'visible' => (!Yii::app()->user->isGuest && $isAdmin)),
                        array('label' => 'Users', 'url' => base_url() . '/admin/users', 'visible' => (!Yii::app()->user->isGuest && $isAdmin)),
                        array('label' => 'Packages', 'url' => base_url() . '/admin/package', 'visible' => (!Yii::app()->user->isGuest && $isAdmin)),
                        array('label' => 'Menu Management', 'url' => base_url() . '/admin/menu', 'visible' => (!Yii::app()->user->isGuest && $isAdmin)),
                        array('label' => 'Email Templates', 'url' => base_url() . '/admin/emailTemplates', 'visible' => !Yii::app()->user->isGuest),
                        array('label' => 'My Account <span class="caret"></span>', 'url' => '#','visible' => !Yii::app()->user->isGuest, 'itemOptions' => array('class' => 'dropdown', 'tabindex' => "-1"), 'linkOptions' => array('class' => 'dropdown-toggle', 'data-toggle' => "dropdown"),
                            'items' => array(
                                array('label' => 'My Profile', 'url' => base_url() . '/admin/profile/update'),
                                array('label' => 'Change Password', 'url' => base_url() . '/admin/changepassword'),
                                array('label' => 'Logout', 'url' => base_url() . '/admin/logout'),
                            )),
                        array('label' => 'Login', 'url' => base_url() . '/admin/login', 'visible' => Yii::app()->user->isGuest),
                        array('label' => Yii::app()->user->name , 'url' => '#' , 'visible' => !Yii::app()->user->isGuest),
                    ),
                ));
                ?>
            </div>
        </div>
    </div>
</div>

<!--<div class="subnav navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
        
                <div class="style-switcher pull-left">
                <a href="javascript:chooseStyle('none', 60)" checked="checked"><span class="style" style="background-color:#0088CC;"></span></a>
                <a href="javascript:chooseStyle('style2', 60)"><span class="style" style="background-color:#7c5706;"></span></a>
                <a href="javascript:chooseStyle('style3', 60)"><span class="style" style="background-color:#468847;"></span></a>
                <a href="javascript:chooseStyle('style4', 60)"><span class="style" style="background-color:#4e4e4e;"></span></a>
                <a href="javascript:chooseStyle('style5', 60)"><span class="style" style="background-color:#d85515;"></span></a>
                <a href="javascript:chooseStyle('style6', 60)"><span class="style" style="background-color:#a00a69;"></span></a>
                <a href="javascript:chooseStyle('style7', 60)"><span class="style" style="background-color:#a30c22;"></span></a>
                </div>
           <form class="navbar-search pull-right" action="">
                 
           <input type="text" class="search-query span2" placeholder="Search">
           
           </form>
        </div> container 
    </div> navbar-inner 
</div> subnav -->