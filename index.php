<?php require('pdo.php');

    /*if (isset($_GET['delpost'])) {
        $stmt  = $db->prepare('DELETE FROM blog_posts WHERE postID = :postID') ;
        $stmt->execute(array(':postID' => $_GET['delpost']));

        header('Location: posts.php?action=deleted');
        exit;
    }*/
 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Jonas blågg</title>
        <link rel="stylesheet" href="css/master.css">
        <script type="text/javascript" src="js/master.js"></script>

    </head>
    <body>
        <div id="blog_wrapper">
            <h1>Min Blågg</h1>
            <hr/>

            <?php
                try {

                    $stmt = $db->query('SELECT postID, post_date FROM blog_posts ORDER BY post_date DESC');
                    while ($row = $stmt->fetch()) {
                        echo '<iframe src="view_post.php?id='.$row['postID'].'" style="width:500px;height:200px;display:flex;">';
                        echo '</iframe>';
                    }

                } catch (PDOException $e) {
                    echo $e->getMessage();
                }

             ?>

        </div>
    </body>
</html>
