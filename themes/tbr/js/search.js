var placeSearch, autocomplete;
var componentForm = {
  street_number: 'short_name',
  route: 'long_name',
  locality: 'long_name',
  administrative_area_level_1: 'short_name',
  country: 'long_name',
  postal_code: 'short_name'
};

function initialize() {
  // Create the autocomplete object, restricting the search
  // to geographical location types.
  autocomplete = new google.maps.places.Autocomplete(
      /** @type {HTMLInputElement} */(document.getElementById('search-location')),
      { types: ['geocode'] });
  // When the user selects an address from the dropdown,
  // populate the address fields in the form.
  google.maps.event.addListener(autocomplete, 'place_changed', function() {
    fillInAddress();
  });
}



// [START region_geolocation]
// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var geolocation = new google.maps.LatLng(
          position.coords.latitude, position.coords.longitude);
      var circle = new google.maps.Circle({
        center: geolocation,
        radius: position.coords.accuracy
      });
      autocomplete.setBounds(circle.getBounds());
    });
  }
}

$(document).ready(function(){
    initialize();
});

// var listPlaces = new Bloodhound({
//     datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
//     queryTokenizer: Bloodhound.tokenizers.whitespace,
//     prefetch: base_url + '/properties/prefetch',
//     remote: {
//         url: base_url + '/properties/queries?list=%QUERY',
//         wildcard: '%QUERY'
//     }
// });

// $('.typeahead').typeahead(null, {
//     name: 'where-to-go',
//     display: 'value',
//     source: listPlaces
// });

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