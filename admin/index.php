<?php require('../pdo.php');

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
        <link rel="stylesheet" href="../css/master.css">
        <script type="text/javascript" src="../js/master.js"></script>

    </head>
    <body>
        <div id="blog_wrapper">
            <h1>Min Blågg</h1>
            <hr/>

            <table>
                <th><h2>Posts</h2></th>
                <th><h2>Users</h2></th>
                <tr>
                    <td>
                        <?php
                            if(isset($_GET['postact'])){
                                echo '<h3>Post '.$_GET['postact'].'</h3>';
                            }
                         ?>
                        <?php include 'posts.php'; ?>
                    </td>
                    <td>
                        <?php
                            if(isset($_GET['useract'])){
                                echo '<h3>User '.$_GET['useract'].'</h3>';
                            }
                         ?>
                        <?php include 'users.php'; ?>
                    </td>
                </tr>
            </table>
            <div id="blog_posts">
            </div>

            <div id="blog_users">
            </div>
        </div>
    </body>
</html>
