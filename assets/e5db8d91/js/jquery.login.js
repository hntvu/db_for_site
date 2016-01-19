$(document).ready(function () {
    // SHOW PASS
    $("#LoginForm_password").on("keyup", function () {
        if ($(this).val())
            $(".glyphicon-eye-open").show();
        else
            $(".glyphicon-eye-open").hide();
    });
    $(".glyphicon-eye-open").mousedown(function () {
        $("#LoginForm_password").attr('type', 'text');
    }).mouseup(function () {
        $("#LoginForm_password").attr('type', 'password');
    }).mouseout(function () {
        $("#LoginForm_password").attr('type', 'password');
    });
});