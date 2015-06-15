<section class="slice light-gray bb">
    <div class="wp-section">
        <div class="container">
            <div class="section-title-wr">
                <h3 class="section-title left"><span>Featured Property</span></h3>
            </div>

            <div class="col-md-12">
                <div class="well-none">
                    <div id="myCarousel" class="carousel slide">

                        <!-- Carousel items -->
                        <div class="carousel-inner">
                            <?php 
                            $i = 1;
                            foreach($properties as $property): ?>
                            <?php if($i == 1): ?>
                                <div class="item active">
                                    <div class="row">
                            <?php elseif($i == 5 || $i == 9 || $i == 13 || $i == 17): ?>
                                <div class="item">
                                    <div class="row">
                            <?php endif; ?>
                                <div class="col-md-3">
                                    <div class="wp-block white">
                                        <div class="figure">
                                            <a href="<?php echo base_url() . '/properties/view/?property=' . $property['slug']; ?>">
                                                <img class="img-responsive" src="<?php echo base_url(); ?>/images/property/<?php echo $property['id']; ?>/<?php echo $property['image']; ?>" alt="">
                                            </a>
                                        </div>
                                        <div class="wp-block-body">
                                            <h2 class="title"><a href="<?php echo base_url() . '/properties/view/?property=' . $property['slug']; ?>"><?php echo $property['title']; ?></a></h2>
                                            <h4 class="subtitle"><?php echo $property['city'].', '.$property['state'].', '.$property['country']; ?></h4>
                                        </div>

                                    </div>
                                </div>
                            <?php if($i == 4): ?>
                                    </div>
                                </div>
                            <?php elseif($i == 8 || $i == 12 || $i == 16): ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php $i++; endforeach; ?>
                        </div>
                        <!--/carousel-inner--> 
                        <a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="fa fa-chevron-left fa-4"></i></a>

                        <a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="fa fa-chevron-right fa-4"></i></a>
                    </div>
                    <!--/myCarousel-->
                </div>
                <!--/well-->
            </div>
        </div>
    </div>
</section>