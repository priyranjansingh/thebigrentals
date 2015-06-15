<section class="slice bg-white bb">
    <div class="wp-section">
        <div class="container">
            <div class="section-title-wr">
                <h3 class="section-title left"><span>Latest listed properties</span></h3>
                <div class="aux-nav">
                    <!-- Auxiliary content comes here -->
                </div>
            </div>

            <?php
            $i = 0;
            foreach ($properties as $property):
                ?>
                <?php if ($i % 2 == 0): ?>
                    <div class="row">
                    <?php endif; ?>

                    <div class="col-md-6">
                        <div class="wp-block property list">
                            <div class="wp-block-title">
                                <h3><a href="<?php echo base_url() . '/properties/view/?property=' . $property['slug']; ?>"><?php echo $property['title']; ?></a></h3>
                            </div>
                            <div class="wp-block-body">
                                <div class="wp-block-img">
                                    <a href="<?php echo base_url() . '/properties/view/?property=' . $property['slug']; ?>">
                                        <img src="images/property/<?php echo $property['id']; ?>/<?php echo $property['image']; ?>" alt="<?php echo $property['title']; ?>">
                                    </a>
                                </div>
                                <div class="wp-block-content">
                                    <h4 class="content-title">Description</h4>
                                    <p class="description"><?php echo trimString($property['description']); ?></p>
                                    <span class="pull-left">
                                        <span class="price">$<?php echo $property['month_price']; ?></span> 
                                        <span class="period">per month</span>
                                    </span>
                                    <span class="pull-right">
                                        <span class="capacity">
                                            <i class="fa fa-user"></i>
                                        </span>
                                </div>
                            </div>
                            <div class="wp-block-footer">
                                <ul class="aux-info">
                                    <li><i class="fa fa-user"></i> <?php echo $property['bedrooms']; ?> Bedrooms</li>
                                    <li><i class="fa fa-tint"></i> <?php echo $property['bathrooms']; ?> Bathrooms</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <?php if ($i % 2 != 0): ?>
                    </div>
                <?php endif; ?>

                <?php
                $i++;
            endforeach;
            ?>
        </div>
    </div>
</section>

<?php $this->widget('application.components.HomeFeaturedListing'); ?>
