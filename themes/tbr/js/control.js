$(document).ready(function() {
    $('#adv-search-header-1').click(function() {
        $(this).parent().toggleClass('adv-search-1-close');
        $('#search_wrapper').toggleClass('fullscreen_search_open');
    });
});