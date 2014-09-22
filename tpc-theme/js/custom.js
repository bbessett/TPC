jQuery(document).ready(function ($){
    var acs_action = 'myprefix_autocompletesearch';
    $("#s").autocomplete({
        source: function(req, response){
            $.getJSON(MyAcSearch.url+'?callback=?&action='+acs_action, req, response);
        },
        select: function(event, ui) {
            window.location.href=ui.item.link;
        },
        minLength: 2,
    });

    var acs_doctor_action = 'doctor_autocomplete_suggestions';
    $("#doctor-search #s").autocomplete({
        source: function(req, response){
            $.getJSON(MyAcSearch.url+'?callback=?&action='+acs_doctor_action, req, response);
        },
        select: function(event, ui) {
            window.location.href=ui.item.link;
        },
        minLength: 2,
    });



});

