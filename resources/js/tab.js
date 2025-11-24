import $ from "jquery";

$(document).ready(function() {

    // Табы v3
    $(".tab-label .tab-item").click(function(event) {
        console.log('click1');
        $(this)
            .addClass('active')
            .siblings()
            .removeClass('active');
        $(this)
            .closest('.tab-area')
            .find('.tab-page .tab-item').eq($(this).index())
            .addClass('active')
            .siblings()
            .removeClass('active');
    });

});
