<section class="slice bg-white bb">
        <div class="wp-section">
            <div class="container">
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