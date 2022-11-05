<?php
if(isset($_POST["ajaxReturn"]))
{
    echo "The post you posted is: " .$_POST["ajaxReturn"];

    ?>
    <script>
        console.log("it works!");
    </script>



    <?php

}
?>


<script type="text/javascript">

    let comment_id_2;

    $(".reply").on("click", function (event)
    {
        let comment_id = $(this).attr('comment-id');
        $(".reply_" + comment_id).show();
        comment_id_2 = comment_id;
        return false;
    });

    $(".reply-button").on("click", function (event)
    {
        $(".reply-inner-container_" + comment_id_2).show();
        $(".reply_" + comment_id_2).hide();
        return false;
    });



</script>

