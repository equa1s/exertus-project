<?php

include '../auth/lock.php';

?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Private Office / <?php echo $login_session; ?></title>
</head>
<body>
<p>Welcome, <?php echo $login_session; ?></p>
<p><a href="../auth/logout.php">Logout</a></p>
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
</body>
</html>
