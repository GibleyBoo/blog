<?php require_once('../pdo.php');

    if (isset($_GET['deluser'])) {
        $stmt = $db->prepare('DELETE FROM blog_users WHERE userID = :userID') ;
        $stmt->execute(array(':userID' => $_GET['deluser']));

        header('Location: index.php?useract=deleted');
        exit;
    }
 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Min Blågg - Users</title>
        <link rel="stylesheet" href="../css/master.css">
        <script type="text/javascript" src="../js/master.js"></script>
    </head>
    <body>
        <div class="wrapper">

            <table>
                <tr>
                    <th>User</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                <?php
                    try {
                        $stmt = $db->query('SELECT userID, user_name, user_mail FROM blog_users ORDER BY userID DESC');
                        while ($row = $stmt->fetch()) {

                            echo '<tr>';
                            echo '<td><a href="../view_user.php?id='.$row['userID'].'">'.$row['user_name'].'</a></td>';
                            echo '<td>'.$row['user_mail'].'</td>';

                            ?>
                            <td>
                                <a href="javascript:deluser('<?php echo $row['userID'];?>','<?php echo $row['user_name'];?>')">Delete</a>
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
        <p><a href="add_user.php">Add User</a></p>

    </body>
</html>
