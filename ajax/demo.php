<?php

?>

<script type="text/javascript">

    $(".reply").on("click", function (event)
    {
        let comment_id = $(this).attr('comment-id');
        $(".reply_" + comment_id).show();

        return false;
    });

    $(".reply-button").on("click", function (event)
    {
        let reply_id = $(this).attr('reply-id');


        $(".reply_" + reply_id).hide();

        createCookie("reply-id", reply_id, "10");


       //return false;
    });





    function createCookie(name, value, days) {
        var expires;
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toGMTString();
        }
        else {
            expires = "";
        }
        document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";
    }





    // show reply div if tex length > 0

</script>
