<?php require_once('../pdo.php');

    if (isset($_GET['delpost'])) {
        $stmt  = $db->prepare('DELETE FROM blog_posts WHERE postID = :postID');
        $stmt->execute(array(':postID' => $_GET['delpost']));

        header('Location: index.php?postact=deleted');
        #header('Location: index.php');

        exit;
    }
    if (isset($_GET['action'])) {
        header('Location: index.php?postact=added');
        exit;
    }

 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Min Blågg - Posts</title>
        <link rel="stylesheet" href="../css/master.css">
        <script type="text/javascript" src="../js/master.js"></script>
    </head>
    <body>
        <div class="wrapper">

            <table>
                <tr>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
                <?php
                    try {
                        $stmt = $db->query('SELECT postID, post_title, post_date, post_author FROM blog_posts ORDER BY postID DESC');
                        while ($row = $stmt->fetch()) {
                            
                            echo '<tr>';
                            echo '<td><a href="../view_post.php?id='.$row['postID'].'">'.$row['post_title'].'</a></td>';
                            echo '<td>'.$row['post_date'].'</td>';

                            ?>
                            <td>
                                <a href="edit_post.php?id=<?php echo $row['postID'];?>">Edit</a>
                                <a href="javascript:delpost('<?php echo $row['postID'];?>','<?php echo $row['post_title'];?>')">Delete</a>
                            </td>

                            <?php
                            echo '</tr>';
                        }

            } catch (PDOxception $e) {
                echo $e->getMessage();
            }
            ?>
            </table>
        </div>
        <p><a href="add_post.php">Add Post</a></p>


    </body>
</html>
