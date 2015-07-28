<?php

include '../configurations/config.php';

if(isset($_POST['submit'])) {
    $error = '';
    if(isset($_POST['login']) AND !empty($_POST['login'])) {

        if(isset($_POST['password']) AND !empty($_POST['password'])) {

            $login = mysqli_real_escape_string($conn, $_POST['login']);
            $password = mysqli_real_escape_string($conn, base64_encode($_POST['password']));

            $sql = "SELECT * FROM accounts WHERE login='".$login."' AND password='".$password."'";

            $result = mysqli_query($conn, $sql);
            $assoc = mysqli_fetch_assoc($result);

            if(mysqli_num_rows($result) == 1) {

                if($assoc['email_activated'] == 0) {

                    $error = 'Please activate your email';

                } else {
                    session_start();
                    $_SESSION['login_user'] = $login;
                    header("Location: ../office/index.php");
                    exit();
                }

            } else {
                $error = 'Wrong login/password!';
            }
        }

    }

}

?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Sign in</title>
    <link href="../css/login.css" rel="stylesheet" type="text/css">
</head>
<body>

<div class="sign-in-window">
    <div class="sign-in-form">
        <form id="sign-in" action="login.php" method="post" class="sign-in">
            <p>
                <input id="login" name="login" type="text" placeholder="Login" required>
            </p>
            <p>
                <input id="password" name="password" type="password" placeholder="Password" required>
            </p>
            <p>
                <input type="submit" id="submit" name="submit" value="Sign in">
            </p>
            <p><?php echo $error; ?></p>
        </form>

    </div>
</div>

</body>
</html>
