<section class="slice bg-white bb">
        <div class="wp-section">
            <div class="container">
                <div class="benefits hidden-phone">
                <ul class="inline benefits-list text-center">
                    <li>
                        <h3>Over 1 million listings</h3>
                        <div class="benefit-blurb visible-desktop">Bigrentals, Inc., the world leader in vacation rentals</div>
                    </li>
                    <li class="traveler-fees">
                        <h3>No traveler fees</h3>
                        <div class="benefit-blurb visible-desktop">Free to book with no hidden costs</div>
                    </li>
                    <li>
                        <h3>Book with confidence</h3>
                        <div class="benefit-blurb visible-desktop">One of Forbes' "Most Trustworthy Companies"</div>
                    </li>
                </ul>
        </div>
                
                <div class="container-marketing js-containerBelowHero" style="margin-top: 120px;">
                            <hr class="social-links-hr">
                            <div class="social-links-container">
                                <div class="social-links">
	<iframe class="queLoad" src="http://www.facebook.com/plugins/like.php?href=https://www.facebook.com/thebigrentals&amp;layout=button_count&amp;show_faces=false&amp;width=92&amp;action=like&amp;colorscheme=light&amp;locale=en_US" rel="http://www.facebook.com/plugins/like.php?href=https://www.facebook.com/thebigrentals&amp;layout=button_count&amp;show_faces=false&amp;width=92&amp;action=like&amp;colorscheme=light&amp;locale=en_US" scrolling="no" frameborder="0" allowtransparency="true" hspace="0" id="facebook-iframe"></iframe>
                                        <div id="___plusone_0" style="text-indent: 0px; margin: 0px; padding: 0px; border-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseline; display: inline-block; width: 90px; height: 20px; background: transparent;"><iframe frameborder="0" hspace="0" marginheight="0" marginwidth="0" scrolling="no" style="position: static; top: 0px; width: 90px; margin: 0px; border-style: none; left: 0px; visibility: visible; height: 20px;" tabindex="0" vspace="0" width="100%" id="I0_1439294350598" name="I0_1439294350598" src="https://apis.google.com/se/0/_/+1/fastbutton?usegapi=1&amp;size=medium&amp;origin=http%3A%2F%2Fwww.thebigrentals.com&amp;url=https%3A%2F%2Fplus.google.com%2F%2Bhomeawaycom&amp;gsrc=3p&amp;ic=1&amp;jsh=m%3B%2F_%2Fscs%2Fapps-static%2F_%2Fjs%2Fk%3Doz.gapi.en_US.uMC9h9GYIK4.O%2Fm%3D__features__%2Fam%3DAQ%2Frt%3Dj%2Fd%3D1%2Ft%3Dzcms%2Frs%3DAGLTcCPwkFCgN_XKpTkRjvOUXMxZxl0DFA#_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart%2Concircled%2Cdrefresh%2Cerefresh%2Conload&amp;id=I0_1439294350598&amp;parent=http%3A%2F%2Fwww.bigrentals.com&amp;pfname=&amp;rpctoken=37562679" data-gapiattached="true" title="+1"></iframe></div>
                                        <a href="http://www.pinterest.com/thebigrentals" class="pinterest-btn" target="_blank"><i class="icon-gt sprites-pinterest"></i>TheBigrentals</a>
                                </div>
                            </div>
                </div>
                
                <div class="section-title-wr">
                    <h3 class="section-title left"><span>Top Destination</span></h3>
                </div>
                <div id="destinations" class="row width-limit">
                    <ul class="list-unstyled">
                        <?php
                           $tds = TopDestination::model()->findAll();
                           $i = 1;
                           foreach($tds as $td):
                            if($i == 4 || $i == 5):
                        ?>
                            <li class="col-xs-6">
                        <?php else: ?>
                            <li class="col-xs-6 col-sm-4">
                        <?php endif; ?>
                                <a href="<?php echo $td->url; ?>" style="background-image: url('http://tbrs3.s3.amazonaws.com/<?php echo $td->image; ?>')">
                                    <p><?php echo $td->place; ?></p>
                                </a>
                            </li>

                        <?php $i++;
                        endforeach;
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>