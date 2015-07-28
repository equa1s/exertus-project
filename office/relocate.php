<?php

include '../auth/lock.php';

?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Private Office / <?php echo $login_session; ?> / Teleport character</title>
</head>
<body>
<p>Welcome, <?php echo $login_session; ?> | <a href="../auth/logout.php">Sign out</a></p>
<br>
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
<div class="teleport">
    <p>Teleport to another town</p>
    <?php

    $sql = "SELECT char_name FROM characters WHERE account_name='".$login_session."'";
    $result = mysqli_query($conn, $sql);

    ?>

    <form>
        <select id="character" name="character">
            <?php

            if(mysqli_num_rows($result) == 0) {
                echo "<option value='null'>You have no characters</option>";
            }

            while($row = mysqli_fetch_assoc($result)) {
                echo "<option value='".$row['char_name']."'>".$row['char_name']."</option>";
            }

            ?>
        </select>
        <select id="town" name="town">
            <option value="Gludio">Town of Gludio</option>
            <option value="Dion">Town of Dion</option>
            <option value="Heine">Heine</option>
            <option value="Oren">Town of Oren</option>
            <option value="Giran">Town of Giran</option>
            <option value="Aden">Town of Aden</option>
            <option value="Goddard">Town of Goddard</option>
            <option value="Rune">Rune Township</option>
            <option value="Schuttgart">Town of Schuttgart</option>
        </select>
        <input type="button" value="Submit relocation">
    </form>
</div>

</body>
</html>
