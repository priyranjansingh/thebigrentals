var listPlaces = new Bloodhound({
  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
  queryTokenizer: Bloodhound.tokenizers.whitespace,
  prefetch: base_url+'/properties/prefetch',
  remote: {
    url: base_url+'/properties/queries?list=%QUERY',
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