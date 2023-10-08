$(document).ready(function() {
    $(".result-block-user").click(function() {
        var hiddenValue = $(this).find("#hidden-data").val();
        var message = $(this).find("#mess").text();
        $("#redact-textarea").val(message);
        $("#hidden-input").val(hiddenValue);
        $(".redact-modal").css("visibility", "visible");
    });


    $(".redact-modal").click(function(event) {
        if ($(event.target).hasClass("redact-modal")) {
            $(this).css("visibility", "hidden");
        }
    });

    $("#delete-button").click(function() {
        var temp = $("#hidden-input").val();

        var url = "includes/remove_message.php?id=" + encodeURIComponent(temp);
        window.location.href = url;
    });

    $("#edit-button").click(function() {
        var temp = $("#hidden-input").val();
        var mymsg = $("#redact-textarea").val();
        var url = "includes/update_message.php?id=" + encodeURIComponent(temp) + "&mess="+encodeURIComponent(mymsg) ;
        window.location.href = url;
    });
});
