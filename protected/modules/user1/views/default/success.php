<?php $baseUrl = Yii::app()->theme->baseUrl; ?>
<section class="slice slice-lg bg-image" style="background-image:url(<?php echo $baseUrl; ?>/images/backgrounds/full-bg-1.jpg);">
    <div class="wp-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                    <?php
                        if (!empty($mail_sent_message)) {
                            ?>           
                            <div class="success_msg">
                                <?php
                                echo $mail_sent_message;
                                ?>
                            </div>
                            <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>