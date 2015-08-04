<?php

include '../auth/lock.php';
require '../cfg/Coordinates.php';
require '../cfg/Town.php';

$towns = array(
    new Town("Gludio", new Coordinates(1, 2, 3)),
    new Town("Giran", new Coordinates(4, 6, 2)),
    new Town("Aden", new Coordinates(4, 2, 3)),
    new Town("Schuttgart", new Coordinates(1, 2, 3)),
    new Town("Rune", new Coordinates(1, 2, 3)),
    new Town("Goddard", new Coordinates(1, 2, 3)),
    new Town("Dion", new Coordinates(1, 2, 3)),
    new Town("Oren", new Coordinates(1, 2, 3))
);

if(isset($_POST['submit'])) {
    $r = '';
    if(!empty($_POST['character']) AND isset($_POST['character'])) {
        if(isset($_POST['town']) AND !empty($_POST['town'])){

            $who = $_POST['character'];
            $to = $_POST['town'];

            foreach($towns as $value) {
                if($value->getTitle() == $to) {
                    $town = new Town($to, $value->getCoordinates());
                    break;
                }
            }
            $current_coords = $town->getCoordinates();

            $sql = "UPDATE  `characters` SET  `x` =".$current_coords->getX().",
                                              `y` = ".$current_coords->getY().",
                                              `z` = ".$current_coords->getZ()."
                    WHERE  `account_name` =  '".$login_session."'
                            AND
                           `char_name` =  '".$who."'";

            $query = mysqli_query($conn, $sql);
            if($query) {
                $r = "Character ".$who." has been teleported to ".$to;
            } else {
                $r = "Error occurred!";
            }
        }
    }
}

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
            <a href="index.php">Main</a>
        </td>
    </tr>
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

    <form method="post" action="relocate.php">
        <select id="character" name="character" title="Character">
            <?php

            $sql = "SELECT char_name FROM characters WHERE account_name='".$login_session."'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) == 0) {
                echo "<option value='null'>You have no characters</option>";
            }

            while($row = mysqli_fetch_assoc($result)) {
                echo "<option value='".$row['char_name']."'>".$row['char_name']."</option>";
            }

            ?>
        </select>
        <select id="town" name="town" title="Town">
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
        <input type="submit" id="submit" name="submit" value="Submit relocation">
        <p><?php echo $r ?></p>
    </form>
</div>

</body>
</html>
