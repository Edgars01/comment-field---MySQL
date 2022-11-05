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

    $(".reply").on("click", function (event)
    {
        let comment_id = $(this).attr('comment-id');
        $(".reply_" + comment_id).show();

        return false;
    });

    $(".reply-button").on("click", function (event)
    {
        let reply_id = $(this).attr('reply-id');

        $(".reply-inner-container_" + reply_id).show();
        $(".reply_" + reply_id).hide();

        let text = $('textarea.reply-textarea_'+ reply_id).val();
        $('.reply-text_'+ reply_id).text(text);

        return false;
    });

</script>
