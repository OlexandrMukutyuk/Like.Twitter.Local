$(document).ready(function () {
    $("#home").click(function () {
        window.location.href = "main.php";
    });
    $("#home_img").click(function () {
        window.location.href = "main.php";
    });
    $("#profile").click(function () {
        window.location.href = "profile.php";
    });

    $("#make-post").click(function () {
        window.location.href = "make_post.php";
    });

    $(document).ready(function () {
        $("#user-info").click(function (e) {
            if ($("#popup").is(":visible")) {
                $("#popup").hide();  } else {
                $("#popup").show(); 
            }
            e.stopPropagation();
        });

        $(document).click(function (e) {
            if (!$("#popup").is(e.target) && $("#popup").has(e.target).length === 0) {
                $("#popup").hide();
            }
        });
    
       
        $("#logout-button").click(function () {
           
            window.location.href = "includes/singout.php";
        });
    });
});