<?php require('../pdo.php');



 ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Blågg - Edit Post</title>
        <link rel="stylesheet" href="../css/master.css">
        <script type="text/javascript" src="../js/master.js"></script>
    </head>
    <body>
        <?php

            if(isset($_POST['submit'])) {

                $_POST = array_map('stripslashes', $_POST);
                extract($_POST);

                if ($postID == '') {
                    $error[] = 'Invalid ID!';
                }

                if ($postTitle == '') {
                    $error[] = 'Title required.';
                }

                if ($postCont == '') {
                    $error[] = 'Content required.';
                }

                if ($postAuth == '') {
                    $error[] = 'Author required.';
                }

                if (!isset($error)) {

                try {
                    $stmt = $db->prepare('UPDATE blog_posts SET post_title = :postTitle, post_cont = :postCont, post_author = :postAuth WHERE postID = :postID');
                    $stmt->execute(array(
                        ':postTitle'   => $postTitle,
                        ':postCont'    => $postCont,
                        ':postAuth'    => $postAuth,
                        ':postID'      => $postID
                    ));

                    header('Location: index.php?postact=edited');
                    exit;

                } catch (PDOException $e) {
                    echo $e->getMessage();
                }

            }
        }

         ?>

         <?php
         if (isset($error)) {
            foreach ($error as $error) {
                    echo $error.'<br />';
            }
         }
            try {
                $stmt = $db->prepare('SELECT postID, post_title, post_cont, post_author FROM blog_posts WHERE postID = :postID');
                $stmt->execute(array(':postID' => $_GET['id']));
                $row = $stmt->fetch();

            } catch (PDOException $e) {
                echo $e->getMessage();
            }


          ?>
        <form action="" method="POST">
            <input type="hidden" name="postID" value="<?php echo $row['postID']; ?>">
            <p><label for="postTitle">Title:</label>
            <input type="text" name="postTitle" value="<?php echo $row['post_title'];?>"></p>

            <p><label for="postCont">Content:</label>
            <textarea name="postCont" rows="8" cols="20"><?php echo $row['post_cont']; ?></textarea></p>

            <p><label for="postAuth">Author:</label>
            <input type="text" name="postAuth" value="<?php echo $row['post_author'];?>"></p>

            <p><input type="submit" name="submit" value="Update"></p>
        </form>

        <!--
        <form action="" method="POST">
            <label for="postTitle"><p>Title:</p></label>
            <input type="text" name="postTitle" value="" required>

            <label for="postCont"><p>Content:</p></label>
            <textarea name="postCont" rows="8" cols="20" value="" required></textarea>

            <label for="postAuthor"><p>Author:</p></label>
            <input type="text" name="postAuthor" value="" required>

            <input type="submit" name="editpost">

        </form>-->
    </body>
</html>
