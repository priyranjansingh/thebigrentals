$(document).ready(function() {
	$("form#property-form").on('submit', function(e){
		//e.preventDefault();
        var property_title = $("#Property_title").val(),
        	property_description = $("#Property_description").val(),
        	property_category = $("#Property_category_id").val(),
        	property_availability_from = $("#Property_date_availability_from").val(),
        	property_availability_to = $("#Property_date_availability_to").val(),
        	address_line_1 = $("#Property_address_line_1").val(),
        	city = $("#Property_city").val(),
        	state = $("#Property_state").val(),
        	country = $("#Property_country").val(),
        	zip = $("#Property_zip").val(),
        	rooms = $("#Property_rooms").val(),
        	bedrooms = $("#Property_bedrooms").val(),
        	bathrooms = $("#Property_bathrooms").val(),
        	price_season_obj = $('select[name="Property[Price][season][]"]'),
        	price_currency_obj = $('select[name="Property[Price][currency][]"]'),
        	price_start_date_obj = $('input[name="Property[Price][start_date][]"]'),
        	price_end_date_obj = $('input[name="Property[Price][end_date][]"]'),
        	price_night_obj = $('input[name="Property[Price][night_price][]"]'),
        	price_week_obj = $('input[name="Property[Price][week_price][]"]'),
        	price_month_obj = $('input[name="Property[Price][month_price][]"]'),
        	error = {},
        	// title_flag,description_flag,category_flag,availability_from_flag,availability_to_flag,address_line_1_flag,city_flag,
        	// state_flag,country_flag,zip_flag,rooms_flag,bedrooms_flag,bathrooms_flag,amenities_flag,season_flag,currency_flag,start_date_flag,
        	// end_date_flag,night_flag,week_flag,month_flag,
        	final_check = true;



        if (property_title == '')
        {
            $("#Property_title_em").show();
           // title_flag = false;
            error['title_flag'] = false;
        }
        else
        {
            $("#Property_title_em").hide();
             error['title_flag'] = true;
        }
        if (property_description == '')
        {
            $("#Property_description_em").show();
            // description_flag = false;
            error['description_flag'] = false;
        }
        else
        {
            $("#Property_description_em").hide();
             // description_flag = true;
             error['description_flag'] = true;
        }
        
        if (property_category == '')
        {
            $("#Property_category_id_em").show();
            // category_flag = false;
            error['category_flag'] = false;
        }
        else
        {
            $("#Property_category_id_em").hide();
             // category_flag = true;
             error['category_flag'] = true;
        }

        if (property_availability_from == '')
        {
            $("#Property_date_availability_from_em").show();
             // availability_from_flag = false;
             error['availability_from_flag'] = false;
        }
        else
        {
            $("#Property_date_availability_from_em").hide();
            // availability_from_flag = true;
            error['availability_from_flag'] = true;
        }

        if (property_availability_to == '')
        {
            $("#Property_date_availability_to_em").show();
            // availability_to_flag = false;
            error['availability_to_flag'] = false;
        }
        else
        {
            $("#Property_date_availability_to_em").hide();
             // availability_to_flag = true;
             error['availability_to_flag'] = true;
        }
       
        if (address_line_1 == '')
        {
            $("#Property_address_line_1_em").show();
            // address_line_1_flag = false;
            error['address_line_1_flag'] = false;
        }
        else
        {
            $("#Property_address_line_1_em").hide();
            // address_line_1_flag = true;
            error['address_line_1_flag'] = true;
        }
        if (city == '')
        {
            $("#Property_city_em").show();
            // city_flag = false;
            error['city_flag'] = false;
        }
        else
        {
            $("#Property_city_em").hide();
             // city_flag = true;
             error['city_flag'] = true;
        }
        if (state == '')
        {
            $("#Property_state_em").show();
             // state_flag = false;
             error['state_flag'] = false;
        }
        else
        {
            $("#Property_state_em").hide();
            // state_flag = true;
            error['state_flag'] = true;
        }
        if (country == '')
        {
            $("#Property_country_em").show();
            // country_flag = false;
            error['country_flag'] = false;
        }
        else
        {
            $("#Property_country_em").hide();
             // country_flag = true;
             error['country_flag'] = true;
        }
        if (zip == '')
        {
            $("#Property_zip_em").show();
            // zip_flag = false;
            error['zip_flag'] = false;
        }
        else
        {
            $("#Property_zip_em").hide();
            // zip_flag = true;
            error['zip_flag'] = true;
        }
        if (rooms == '')
        {
            $("#Property_rooms_em").show();
             // rooms_flag = false;
             error['rooms_flag'] = false;
        }
        else
        {
            $("#Property_rooms_em").hide();
            // rooms_flag = true;
            error['rooms_flag'] = true;
        }
        if (bedrooms == '')
        {
            $("#Property_bedrooms_em").show();
            // bedrooms_flag = false;
            error['bedrooms_flag'] = false;
        }
        else
        {
            $("#Property_bedrooms_em").hide();
            error['bedrooms_flag'] = true;
        }
        if (bathrooms == '')
        {
            $("#Property_bathrooms_em").show();
             error['bathrooms_flag'] = false;
        }
        else
        {
            $("#Property_bathrooms_em").hide();
             error['bathrooms_flag'] = true;
        }
        if ($("input[type=checkbox]:checked").length === 0) {
            $("#amenities_em").show();
            error['amenities_flag'] = false;
        }
        else
        {
            $("#amenities_em").hide();
             error['amenities_flag'] = true;
        }

        season_flag = true;
        price_season_obj.each(function() {
            
            if ($(this).val() == '')
            {
                $(this).next("div").show();
                error['season_flag'] = false;
            }
            else
            {
                $(this).next("div").hide();
            }
        });
        currency_flag = true;
        price_currency_obj.each(function() {
            if ($(this).val() == '')
            {
                $(this).next("div").show();
                error['currency_flag'] = false;
            }
            else
            {
                $(this).next("div").hide();
            }
        });
        start_date_flag = true;
        price_start_date_obj.each(function() {
            if ($(this).val() == '')
            {
                $(this).closest("td").children("div").show();
                error['start_date_flag'] = false;
            }
            else
            {
                 $(this).closest("td").children("div").hide();
            }
        });
        end_date_flag = true;
        price_end_date_obj.each(function() {
            if ($(this).val() == '')
            {
                $(this).closest("td").children("div").show();
                error['end_date_flag'] = false;
            }
            else
            {
                $(this).closest("td").children("div").hide();
            }
        });
        night_flag = true;
        price_night_obj.each(function() {
            if ($(this).val() == '')
            {
                $(this).next("div").show();
                error['night_flag'] = false;
            }
            else
            {
                $(this).next("div").hide();
            }
        });
        week_flag = true;
        price_week_obj.each(function() {
            if ($(this).val() == '')
            {
                $(this).next("div").show();
                error['week_flag'] = false;
            }
            else
            {
                $(this).next("div").hide();
            }
        });
        month_flag = true;
        price_month_obj.each(function() {
            if ($(this).val() == '')
            {
                $(this).next("div").show();
                error['month_flag'] = false;
            }
            else
            {
                $(this).next("div").hide();
            }
        });
        var i = 0,
        	len = error.length;
        $.each(error, function(k,v){
			if(v === false){
				final_check = false;
				return false;
			}
		});
		alert(final_check);
		if(final_check){
			return true;
		} else {
			e.preventDefault();
		}
	});
});