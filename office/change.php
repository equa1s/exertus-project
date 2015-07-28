<?php

include '../auth/lock.php';

if(isset($_POST['submit'])) {
    if(isset($_POST['password']) AND !empty($_POST['password'])) {
        if(isset($_POST['confirm_password']) AND !empty($_POST['confirm_password'])) {
            $new_password = base64_encode($_POST['password']);
            $query = "UPDATE accounts SET password = '".$new_password."' WHERE login = '".$login_session."'";
            $result = mysqli_query($conn, $query);
            if(!$result) {
                header("Location: failure.php");
            }
        }
    }
}

?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Private Office / <?php echo $login_session; ?> / Change password </title>
    <script src="../js/jquery-1.11.3.min.js" type="text/javascript"></script>
</head>
<body>
<p>Welcome, <?php echo $login_session; ?> | <a href="../auth/logout.php">Sign out</a></p>
<br>
<div class="change_password">

    <style>#response {display: none;}</style>

    <table>
        <caption>Office functions</caption>
        <tr>
            <td>
                <a href="change.php">Change password</a>
            </td>
        </tr>
        <tr>
            <td>
                <a href="relocate.php">Relocate character</a>
            </td>
        </tr>
    </table>

    <br>

    <form id="change_password" class="change_password" method="post" action="change.php">
        <table>
            <caption>Change password</caption>
            <tr>
                <td>New password: </td>
                <td><input type="text" id="password" name="password" required></td>
            </tr>
            <tr>
                <td>Confirm password: </td>
                <td><input type="password" id="confirm_password" name="confirm_password" required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" id="submit" name="submit" value="Change password"></td>
            </tr>
        </table>
    </form>
    <p id="response">Password has changed successful!</p>
    <script type="text/javascript">
        $(document).ready(function() {
           $('#submit').on('click', function () {
               $("#response").fadeIn('slow').delay(5000).fadeOut('slow');
           });
        });
    </script>
</div>
</body>
</html>