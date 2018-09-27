<?php require('../pdo.php');

 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Min Blågg - Add User</title>
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
                    /*
                    if ($password_confirm != $password) {
                        throw new Exception("Passwords do not match.", 1);

                    }
                    */
                    $stmt = $db->prepare('INSERT INTO blog_users(user_name, user_pass, user_mail) VALUES (:username, :userpass, :usermail)');
                    $stmt->execute(array(
                        ':username' => $username,
                        ':userpass' => $password,
                        ':usermail' => $email
                    ));
                    header('Location: index.php?useract=added');
                    exit;
                }

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
            ?>
            <form action="" method="POST">

                <label for="username"><p>Username:</p></label>
                <input type="text" name="username" required>

                <label for="password"><p>Password:</p></label>
                <input type="password" name="password" required>

                <!--
                <label for="password_confirm"><p>Confirm Password:</p></label>
                <input type="password" name="password_confirm" required>
                -->

                <label for="email"><p>Email:</p></label>
                <input type="email" name="email" required>

                <input type="submit" name="submit">
            </form>
        </div>
    </body>
</html>
