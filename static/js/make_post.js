$(document).ready(function() {
    $("form").submit(function(e) {
        e.preventDefault();
        var message = $("#post_message_t").val();
        if(message.length > 3999){
            $("#post_message_t").css("border", "1px solid red");
            alert("Повідомлення повинне бути менше 3500 символів.");
            return;
        }

        $("#post_message_t").css("border", "none");
        $(this).unbind("submit").submit();
            
    });
});