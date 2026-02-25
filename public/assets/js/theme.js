var _host = window.location.host;
var _base_path = (_host == 'localhost') ? '/resumemates/' : '';

$(document).ready(function(){

    $('#postForm .order-btn').on('click', function(){
        $(this).hide();
        $(this).siblings('.details-wrapper').slideDown('slow');
    });

});