<?php

    function getTopPvp($connection) {

        $sql = "SELECT `char_name`,`pvpkills` FROM `characters`\n"
            . "ORDER BY `characters`.`pvpkills` DESC LIMIT 0, 10 ";
        $result = mysqli_query($connection, $sql) or die("Error: ".mysqli_error($connection));
        $position = 1;
        echo "<table>";
        echo "<caption>Top PVP</caption>";
        while($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>".$position++.'.'."</td>";
            echo "<td>".$row{'char_name'}."</td>";
            echo "<td>".$row{'pvpkills'}."</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    function getTopPk($connection) {
        $sql = "SELECT `char_name`,`pkkills` FROM `characters`\n"
            . "ORDER BY `characters`.`pkkills` DESC LIMIT 0, 10";
        $result = mysqli_query($connection, $sql) or die("Error: ".mysqli_error($connection));
        $position = 1;
        echo "<table>";
        echo "<caption>Top PK</caption>";
        while($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>".$position++.'.'."</td>";
            echo "<td>".$row{'char_name'}."</td>";
            echo "<td>".$row{'pkkills'}."</td>";
            echo "</tr>";
        }
        echo "</table>";

    }

    ?>

    <div class="statistic-main-block">
        <div class="statistic-inner-block">
            <div class="statistic-pvp">
                <?php getTopPvp($conn); ?>
            </div>
            <div class="statistic-pk">
                <?php getTopPk($conn); ?>
            </div>
        </div>
    </div>

    <?php mysqli_close($conn); ?>