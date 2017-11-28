<?php require('pdo.php');

        $stmt = $db->prepare('SELECT postID, post_title, post_cont, post_date, post_author FROM blog_posts WHERE postID = :postID');
        $stmt->execute(array(':postID' => $_GET['id']));
        $row = $stmt->fetch();

        if ($row['postID'] == '') {
            header('Location: ./');
            exit;
        }
 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Min Blågg - <?php echo $row['post_title']; ?></title>
        <link rel="stylesheet" href="css/master.css">
        <script type="text/javascript" src="js/master.js"></script>
    </head>
    <body>
        <div class="wrapper">
            <?php
                try {

                    echo '<div class="apost">';
                        echo '<h1 class="postTitle">'.$row['post_title'].'</h1>';
                        echo '<p class="postContent">'.$row['post_cont'].'</p>';
                        echo '<sub class="postDate">'.$row['post_date'].'</sub>';
                        echo '<sub class="postAuthor">'.$row['post_author'].'</sub>';
                    echo '</div>';

                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            ?>
        </div>
    </body>
</html>
