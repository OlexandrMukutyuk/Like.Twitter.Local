$(document).ready(function() {
    $("form").submit(function(e) {
        e.preventDefault();
        var password = $("#password").val();
        var confirm_password = $("#confirm_password").val();
        
        if(password !== confirm_password){
            $("#password").css("border", "1px solid red");
            $("#confirm_password").css("border", "1px solid red");
            alert("Паролі не співпадають. Будь ласка, перевірте введені паролі.");
            return;
        }
        if(password.length <=5){
            $("#password").css("border", "1px solid red");
            $("#confirm_password").css("border", "1px solid red");
            alert("Паролі занадто короткі. Будь ласка, введіть пароль довше 5 знаків.");
            return
        }
        $("#password").css("border", "none");
        $("#confirm_password").css("border", "none");
        $(this).unbind("submit").submit();
            
    });
});

