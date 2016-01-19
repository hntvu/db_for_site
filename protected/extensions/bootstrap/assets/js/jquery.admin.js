$(function () {
    $('.navbar-toggle').click(function () {
        $('.navbar-nav').toggleClass('slide-in');
        $('.side-body').toggleClass('body-slide-in');
    });
});

$(document).ready(function () {
    $("#accordian .admin-bar").click(function () {
        //slide up all the link lists
        $("#accordian ul ul").slideUp();
        if (!$(this).next().is(":visible"))
        {
            $(this).next().slideDown();
        }
    });

});