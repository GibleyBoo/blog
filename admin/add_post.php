<?php require('../pdo.php');


 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Min Blågg - Add Post</title>
        <link rel="stylesheet" href="../css/master.css">
        <script type="text/javascript" src="../js/master.js"></script>
    </head>
    <body>
        <div class="wrapper">

            <?php
                try {

                    if (isset($_POST['submit'])) {
                        $_POST = array_map( 'stripslashes', $_POST );
                        extract($_POST);
                        $stmt = $db->prepare('INSERT INTO blog_posts(post_title, post_cont, post_author) VALUES (:postTitle, :postCont, :postAuthor)');
                        $stmt->execute(array(
                            ':postTitle'  => $postTitle,
                            ':postCont'   => $postCont,
                            ':postAuthor' => $postAuth
                        ));
                        header('Location: posts.php?action=added');
                        exit;
                    }

                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            ?>

            <form action="" method="POST">
                <label for="postTitle"><p>Title:</p></label>
                <input type="text" name="postTitle" required>

                <label for="postCont"><p>Content:</p></label>
                <textarea name="postCont" rows="8" cols="20" required></textarea>

                <label for="postAuthor"><p>Author:</p></label>
                <input type="text" name="postAuthor" required>

                <input type="submit" name="submit">
            </form>

        </div>
    </body>
</html>
