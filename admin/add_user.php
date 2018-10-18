<?php require('../pdo.php');
      require('../HMAC_KEY.php');

 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>My Blog - Add User</title>
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
                        ':userpass' => hash_hmac(hash_hmac_algos()[5], $password, SHARED_KEY,False),//password_hash($password,PASSWORD_DEFAULT),
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

                <p>
                    <label for="username"><p>Username:</p></label>
                    <input type="text" name="username" required>
                </p>

                <p>
                    <label for="password"><p>Password:</p></label>
                    <input type="password" name="password" required>
                </p>

                <!--
                <label for="password_confirm"><p>Confirm Password:</p></label>
                <input type="password" name="password_confirm" required>
                -->
                <p>
                    <label for="email"><p>Email:</p></label>
                    <input type="email" name="email" required>
                </p>

                <input type="submit" name="submit">
            </form>
        </div>
    </body>
</html>
