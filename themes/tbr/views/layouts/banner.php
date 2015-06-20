<?php $baseUrl = Yii::app()->theme->baseUrl; ?>
<div id="homepageCarousel" class="carousel carousel-1 carousel-fixed-height slide" data-ride="carousel">
    <div class="carousel-inner">

        <div class="item item-dark active" style="background-image:url(<?php echo $baseUrl; ?>/images/prv/estate/estate-slider-bg-1.jpg);">
            <div class="mask mask-1"></div>  
            <div class="container">
                <div class="description-left">
                    <span class="title c-white text-uppercase strong-700">The Big Rentals</span>
                    <span class="subtitle-sm">We want to offer you the best platform so you could expand you business and ideas to the next level in the online world.</span>
                    <ul class="list-carousel mb-20">
                        <li><i class="fa fa-check-square"></i> Lorem Ipsum is simply dummy</li>
                        <li><i class="fa fa-check-square"></i> Printer took a galley</li>
                        <li><i class="fa fa-check-square"></i> It has survived not only</li>
                        <li><i class="fa fa-check-square"></i> Electronic typesetting</li>
                    </ul>
                    <a href="#" class="btn btn-lg btn-white btn-icon fa-eye">
                        <span>Seen enough</span>
                    </a>
                </div>
            </div>
        </div> 

        <div class="item item-light" style="background-image:url(<?php echo $baseUrl; ?>/images/prv/estate/estate-slider-bg-3.jpg);">
            <div class="mask mask-1"></div>  
            <div class="container">
                <div class="description-left">
                    <span class="title c-white text-uppercase strong-700">The Big Rentals</span>
                    <span class="subtitle-sm">We want to offer you the best platform so you could expand you business and ideas to the next level in the online world.</span>

                </div>
            </div>
        </div>       
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#homepageCarousel" data-slide="prev">
        <i class="fa fa-angle-left"></i>
    </a>
    <a class="right carousel-control" href="#homepageCarousel" data-slide="next">
        <i class="fa fa-angle-right"></i>
    </a>


    <div id="hero" class="row">
  
  
    <div id="hero-search">
        <div id="search" class="width-limit">
            <form id="search_form" accept-charset="UTF-8" action="<?php echo base_url(); ?>/properties/search" method="POST">
                <div class="col-sm-12 col-md-4">
                    <div>
                        <input name="query" id="search-location" class="form-control input-lg form-control-icon icon-location typeahead" type="text" placeholder="Where are you going?" value="" autocomplete="off">
                    </div>
                </div>
                <div class="errorMessage" id="search-location_em" style="display:none;">Destination cannot be blank.</div>  
                <div class="col-xs-6 col-sm-3 col-md-2">
                  <div>
                    <input name="ch_in" id="search-checkin" class="form-control input-lg form-control-icon icon-calendar" type="text" placeholder="Check In" autocomplete="off">
                  </div>
                </div>
                <div class="errorMessage" id="search-checkin_em" style="display:none;">Check In time cannot be blank.</div>  
                <div class="col-xs-6 col-sm-3 col-md-2">
                  <div>
                    <input name="ch_out" id="search-checkout" class="form-control input-lg form-control-icon icon-calendar" type="text" placeholder="Check Out" autocomplete="off">
                  </div>
                </div>
                 <div class="errorMessage" id="search-checkout_em" style="display:none;">Check Out time cannot be blank.</div>  
                 <div class="errorMessage" id="compare_em" style="display:none;">Checkin time can not be greater than checkout time .</div>  
                <div class="col-xs-6 col-sm-3 col-md-2">
                    <div class="form-group form-group-lg field_select">
                        <select class="form-control select_styled base no-padding" id="guest" name="guest">
                            <option value="">Guests</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>      
                    </div>
                </div>
                 <div class="errorMessage" id="guest_em" style="display:none;">Number of guest cannot be blank.</div>  
                <div class="col-xs-6 col-sm-3 col-md-2">
                    <button id="search-button" class="btn btn-primary btn-lg btn-block tclick" data-tkey="Search" data-tloc="Search">Search</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
