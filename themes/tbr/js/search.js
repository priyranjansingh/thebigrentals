var listPlaces = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    prefetch: base_url + '/properties/prefetch',
    remote: {
        url: base_url + '/properties/queries?list=%QUERY',
        wildcard: '%QUERY'
    }
});

$('.typeahead').typeahead(null, {
    name: 'where-to-go',
    display: 'value',
    source: listPlaces
});

$('#search-checkin').Zebra_DatePicker();

$('#search-checkout').Zebra_DatePicker({
    direction: 1    // boolean true would've made the date picker future only
});


$('#search_form').submit(function(e) {
    var search_location = $.trim($("#search-location").val()),
            search_checkin = $.trim($("#search-checkin").val()),
            search_checkout = $.trim($("#search-checkout").val()),
            guest = $("#guest").val(),
            error = {},
            final_check = true;

    if (search_location == '')
    {
        $("#search-location_em").show();
        error['location_flag'] = false;
    }
    else
    {
        $("#search-location_em").hide();
        error['location_flag'] = true;
    }

    if (search_checkin == '')
    {
        $("#search-checkin_em").show();
        error['checkin_flag'] = false;
    }
    else
    {
        $("#search-checkin_em").hide();
        error['checkin_flag'] = true;
    }
    if (search_checkout == '')
    {
        $("#search-checkout_em").show();
        error['checkout_flag'] = false;
    }
    else
    {
        $("#search-checkout_em").hide();
        error['checkout_flag'] = true;
    }
    if (guest == '')
    {
        $("#guest_em").show();
        error['guest_flag'] = false;
    }
    else
    {
        $("#guest_em").hide();
        error['guest_flag'] = true;
    }
    if (search_checkin !== '' && search_checkout !== '')
    {
        if (new Date(search_checkout) <= new Date(search_checkin))
        {
            $("#compare_em").show();
            error['compare_flag'] = false;
        }
        else
        {
            $("#compare_em").hide();
            error['compare_flag'] = true;
        }
    }

    $.each(error, function(k, v) {
        if (v === false) {
            final_check = false;
            //return false;
        }
    });
    if (final_check) {
        return true;
    } else {
        e.preventDefault();
    }



});