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




       //return false;
    });

    // show reply div if tex length > 0

</script>
