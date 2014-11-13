$(document).ready(function() {
    $('#faq h3').click(function() {

        $(this).next('.answer').slideToggle(100);
        $(this).toggleClass('close');

    });
});