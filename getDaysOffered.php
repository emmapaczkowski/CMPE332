<?php
    $query = "SELECT DISTINCT  day FROM days_offered";
    $result = $connection->query($query);
    echo "Days Offered? </br>";
    while ($row = $result->fetch()) {
         echo '<input type="radio" name="day" value="';
         echo $row["day"];
         echo '">' . $row["day"] . "<br>";
    }
    ?>

