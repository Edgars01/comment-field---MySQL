<?php
session_start();
include 'db.php';

?>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
<?php


function checkIfInputIsEmpty()
{
    $required = array('name', 'comment');

    $error = false;
    foreach($required as $field)
    {
        if (empty($_POST[$field]))
        {
            $error = true;
        }
    }

    return $error;
}


if (isset($_POST['post_comment']))
{
    if (!checkIfInputIsEmpty())
    {
        $name = $_POST['name'];
        $comment = $_POST['comment'];

        $sql = "INSERT INTO comment_table (name, comment)
		VALUES ('$name', '$comment')";

        if (!$conn->query($sql))
        {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}


if (isset($_POST['reply-button']))
{
    echo "yes1";
    if (isset($_POST['reply']))
    {
        echo "yes2";

        $reply = $_POST['reply'];

        $sql = "UPDATE comment_table
        SET reply = '$reply'
        WHERE id = 2";



        if (!$conn->query($sql))
        {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}


?>

<html>

    <head>

        <link rel="stylesheet" href="style.css">
        <title>comment</title>
        <script src="https://kit.fontawesome.com/cdd8ff2915.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    </head>

    <body>
        <div class="container">
            <form action="" method="post" class="form">
                <input type="text" class="name" id="name" name="name" placeholder="Name">
                <br>
                <textarea name="comment" cols="30" rows="10" class="comment" id="comment" placeholder="Comment"></textarea>
                <br>
                <button type="submit" class="btn" id="btn" name="post_comment">Post Comment</button>
            </form>
        </div>

        <script>

            var intervalId = window.setInterval(function()
            {
                let name = document.getElementById("name").value.length;
                let comment = document.getElementById("comment").value.length;

                if (name > 0 || comment > 0)
                {
                    document.getElementById("btn").style.backgroundColor='#1f68c0';
                }
                else
                {
                    document.getElementById("btn").style.backgroundColor='#151515';
                    document.getElementById("btn").style.cursor = 'default';
                }
            }, 1000);

        </script>

        <div class="content">
            <?php

            $sql = "SELECT * FROM comment_table";
            $result = $conn->query($sql);

            if ($result->num_rows > 0)
            {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                ?>

                    <div class="comment-main-container">
                        
                        <div class="information-container">
                            <img class="profile-image" src="img_avatar.png">
                            
                            <div class="comment-container">
                                <h3 class="comment-name"><?php echo $row['name']; ?></h3>
                                <p class="comment-content"><?php echo $row['comment']; ?></p>
                            </div>
                        </div>

                        <div class="options-container">

                            <div class="options-inner-container">
                                <i class="fa-solid fa-thumbs-up"></i>
                                <i class="fa-solid fa-thumbs-down"></i>
                            </div>

                            <button type="submit" class="reply" id="reply" comment-id="<?php echo $row['id'] ?>">REPLY</button>

                            <?php echo $row['reply']; ?>

                            <form action="" method="post" class="post-style">

                                <div class="reply_<?= $row['id'] ?> reply-style">

                                   <div class="reply-inner-style">

                                        <textarea name="reply" class="reply-textarea_<?= $row['id'] ?> reply-textarea_style"></textarea>

                                        <button type="submit" class="reply-button" name="reply-button" reply-id="<?php echo $row['id'] ?>">Post reply</button>

                                   </div>

                                </div>

                            </form>


                        </div>
                        
                    </div>

                <?php } } ?>

            <?php
                include 'ajax/demo.php';
            ?>

        </div>
    </body>

</html>


