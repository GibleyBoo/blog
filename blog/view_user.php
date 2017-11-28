<?php require('pdo.php');

        $stmt = $db->prepare('SELECT userID, user_name, user_mail FROM blog_users WHERE userID = :userID');
        $stmt->execute(array(':userID' => $_GET['id']));
        $row = $stmt->fetch();

        if ($row['userID'] == '') {
            header('Location: ./');
            exit;
        }
 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Min Blågg - User: <?php echo $row['user_name'] ?></title>
        <link rel="stylesheet" href="css/master.css">
        <script type="text/javascript" src="js/master.js"></script>
    </head>
    <body>
        <div class="wrapper">
            <h1>Min Blågg</h1>
            <hr />
            <p><a href="./">Home</a></p>

            <?php
                try {
                    echo '<div class="auser">';
                        echo '<span id="username">'.$row["user_name"].'</span><br>';
                        echo '<span id="email">'.$row["user_mail"].'</span><br>';
                        echo '<span id="userid">'.$row["userID"].'</span>';
                    echo '</div>';

                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            ?>

        </div>
    </body>
</html>
