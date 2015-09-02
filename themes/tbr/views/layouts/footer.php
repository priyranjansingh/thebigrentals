<?php $baseUrl = Yii::app()->theme->baseUrl; ?>
<!-- FOOTER -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="col">
                    <h4>Contact us</h4>
                    <h5>Europe</h5>
                    <ul>
                        <li>380 Wellington Street, Tower B, 6th Floor, London, Ontario, N6A 5B5</li>
                        <li>Phone: +44 2071930407 </li>
                        <li>Email: <a href="mailto:support@thebigrentals.com" title="Email Us">support@thebigrentals.com</a></li>
                        <li>Skype: <a href="skype:thebigrentals?call" title="Skype us">thebigrentals</a></li>
                    </ul>
                </div>
                <div class="col">
                    <h5>Asia</h5>
                    <ul>
                        <li>E 14 - B, Sector 8, Noida, U.P. | PIN Code: 201301 | India</li>
                        <li>Phone: +911204150334 | Fax: +911204150334 </li>
                        <li>Email: <a href="mailto:support.india@thebigrentals.com" title="Email Us">support.india@thebigrentals.com</a></li>
                        <li>Skype: <a href="skype:thebigrentals1?call" title="Skype us">thebigrentals1</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-3">
                <div class="col">
                    <h4>Mailing list</h4>
                    <p>Sign up if you would like to receive occasional treats from us.</p>
                    <form class="form-horizontal form-light">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Your email address...">
                            <span class="input-group-btn">
                                <button class="btn btn-base" type="button">Go!</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-3">
                <div class="col col-social-icons">
                    <h4>Follow us on Facebook</h4>
                    <iframe id="facebook_wid" src="http://www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fthebigrentals&amp;width=220&amp;height=260&amp;colorscheme=&amp;show_faces=true&amp;stream=false&amp;header=false&amp;" style="border:none; overflow:hidden; width:220px; height:260px;background-color:white;"></iframe>
                </div>
            </div>

            <div class="col-md-3">
                <div class="col">
                    <h4>About us</h4>
                    <p class="no-margin">
                        Lorem Ipsum is a dummy text.Lorem Ipsum is a dummy text.Lorem Ipsum is a dummy text.Lorem Ipsum is a dummy text.Lorem Ipsum is a dummy text.
                    </p>
                </div>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-lg-9 copyright">
                <?php echo date('Y'); ?> © The Big Rentals. All rights reserved.
                <a href="#">Terms and conditions</a>
            </div>
            <div class="col-lg-3">
                <a href="<?php echo base_url(); ?>" title="The Big Rentals" target="_blank" class="">
                    <img src="<?php echo base_url(); ?>/images/logo.png" alt="The Big Rentals | Logo" class="pull-right">
                </a>
            </div>
        </div>
    </div>
</footer>
</div>
<script>
var base_url = "<?php echo base_url(); ?>";
</script>
<!-- Essentials -->
<script src="<?php echo $baseUrl; ?>/js/modernizr.custom.js"></script>
<script src="<?php echo $baseUrl; ?>/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo $baseUrl; ?>/js/jquery.mousewheel-3.0.6.pack.js"></script>
<script src="<?php echo $baseUrl; ?>/js/jquery.easing.js"></script>
<script src="<?php echo $baseUrl; ?>/js/jquery.metadata.js"></script>
<script src="<?php echo $baseUrl; ?>/js/jquery.hoverup.js"></script>
<script src="<?php echo $baseUrl; ?>/js/jquery.hoverdir.js"></script>
<script src="<?php echo $baseUrl; ?>/js/jquery.stellar.js"></script>
<!--<script src="<?php echo $baseUrl; ?>/js/gmaps/google-maps-default.js"></script>-->

<!-- Boomerang mobile nav - Optional  -->
<script src="<?php echo $baseUrl; ?>/assets/responsive-mobile-nav/js/jquery.dlmenu.js"></script>
<script src="<?php echo $baseUrl; ?>/assets/responsive-mobile-nav/js/jquery.dlmenu.autofill.js"></script>

<!-- Forms -->
<script src="<?php echo $baseUrl; ?>/assets/ui-kit/js/jquery.powerful-placeholder.min.js"></script> 
<script src="<?php echo $baseUrl; ?>/assets/ui-kit/js/cusel.min.js"></script>
<script src="<?php echo $baseUrl; ?>/assets/sky-forms/js/jquery.form.min.js"></script>
<script src="<?php echo $baseUrl; ?>/assets/sky-forms/js/jquery.validate.min.js"></script>
<script src="<?php echo $baseUrl; ?>/assets/sky-forms/js/jquery.maskedinput.min.js"></script>
<script src="<?php echo $baseUrl; ?>/assets/sky-forms/js/jquery.modal.js"></script>

<!-- Assets -->
<script src="<?php echo $baseUrl; ?>/assets/hover-dropdown/bootstrap-hover-dropdown.min.js"></script>
<script src="<?php echo $baseUrl; ?>/assets/page-scroller/jquery.ui.totop.min.js"></script>
<script src="<?php echo $baseUrl; ?>/assets/mixitup/jquery.mixitup.js"></script>
<script src="<?php echo $baseUrl; ?>/assets/mixitup/jquery.mixitup.init.js"></script>
<script src="<?php echo $baseUrl; ?>/assets/fancybox/jquery.fancybox.pack8cbb.js?v=2.1.5"></script>
<script src="<?php echo $baseUrl; ?>/assets/waypoints/waypoints.min.js"></script>
<script src="<?php echo $baseUrl; ?>/assets/milestone-counter/jquery.countTo.js"></script>
<script src="<?php echo $baseUrl; ?>/assets/easy-pie-chart/js/jquery.easypiechart.js"></script>
<script src="<?php echo $baseUrl; ?>/assets/social-buttons/js/rrssb.min.js"></script>
<script src="<?php echo $baseUrl; ?>/assets/nouislider/js/jquery.nouislider.min.js"></script>
<script src="<?php echo $baseUrl; ?>/assets/owl-carousel/owl.carousel.js"></script>
<script src="<?php echo $baseUrl; ?>/assets/bootstrap/js/tooltip.js"></script>
<script src="<?php echo $baseUrl; ?>/assets/bootstrap/js/popover.js"></script>
<?php if (Yii::app()->controller->action->id == "checkout"): ?>
    <script src="<?php echo $baseUrl; ?>/js/tbr2c4sbc8pckg.js"></script>
<?php endif; ?>
<!-- Sripts for individual pages, depending on what plug-ins are used -->

<!-- Boomerang App JS -->
<script src="<?php echo $baseUrl; ?>/js/wp.app.js"></script>
<script src="<?php echo $baseUrl; ?>/js/hcarousel.js"></script>
<!--[if lt IE 9]>
    <script src="<?php echo $baseUrl; ?>/js/html5shiv.js"></script>
    <script src="<?php echo $baseUrl; ?>/js/respond.min.js"></script>
<![endif]-->

<!-- Temp -- You can remove this once you started to work on your project -->
<!--<script src="<?php echo $baseUrl; ?>/js/jquery.cookie.js"></script>
<script src="<?php echo $baseUrl; ?>/js/wp.switcher.js"></script>
<script type="text/javascript" src="<?php echo $baseUrl; ?>/js/wp.ga.js"></script>-->
<script src="<?php echo $baseUrl; ?>/js/typeahead.bundle.js"></script>
<script src="<?php echo $baseUrl; ?>/js/zebra_datepicker.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>
<script src="<?php echo $baseUrl; ?>/js/search.js"></script>