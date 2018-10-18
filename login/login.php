<?php include '../pdo.php';
session_start();
require_once '../HMAC_KEY.php';

function verify_pass( $algo, $password, $hash_a ) {
    $hash_b = hash_hmac($algo, $password, SHARED_KEY, 0);
    echo hash_equals($hash_a, $hash_b);
    return;
}


/**
 * Created by PhpStorm.
 * User: jonas
 * Date: 2018-10-11
 * Time: 08:23
 */



if (isset($_POST['submit'])) {

    if (isset($_POST['username']) && isset($_POST['password'])) {

        $stmt = $db->prepare('SELECT user_name, user_pass FROM blog_users WHERE user_name = :user_name');
        $stmt->execute(array(':user_name' => $_POST['username']));
        $row = $stmt->fetch();

        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
        $password = hash_hmac(hash_hmac_algos()[5], $_POST['password'], SHARED_KEY,False);//password_hash($_POST['password'],PASSWORD_DEFAULT);

        debug_print($username);
        debug_print($password);

        debug_print($row['user_name']);
        debug_print($row['user_pass']);

        debug_print((verify_pass("sha256", $password, $row['user_pass'])));

        if ($username == $row['user_name']){
            if (verify_pass("sha256",$password,$row['user_pass'])) {


                echo "<h1>Logged in</h1>";

                echo "<pre>" . print_r($_POST, 1) . "</pre>";
            }
        }
        elseif ($username != $row['user_name'] ) {
            debug_print("There is no user named " . $username . ", are you sure you entered your username correctly?");
            echo "<h1><a href=\"http://localhost:63342/webbutveckling/blog/\">Go back</a></h1>";
        }
        elseif (!verify_pass(hash_hmac_algos()[5],$password,$row['user_pass'])) {
            debug_print("You have entered the wrong password.");
            echo "<h1><a href=\"http://localhost:63342/webbutveckling/blog/\">Go back</a></h1>";
        }

    }



} else {
    header("Location: http://localhost:63342/webbutveckling/blog/");
    die();
}

?>