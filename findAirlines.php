<?php
   $query = "SELECT * FROM airline";
   $result = $connection->query($query);
   echo "Which arline? </br>";
   while ($row = $result->fetch()) {
        echo '<input type="radio" name="name" value="';
        echo $row["code"];
        echo '">' . $row["name"] . " | " . $row["code"] . "<br>";
   }
   $query = "SELECT * FROM days_offered";
   $result = $connection->query($query);
   echo "Days Offered? </br>";
   while ($row = $result->fetch()) {
        echo '<input type="radio" name="name" value="';
        echo $row["day"];
        echo '">' . $row["day"] . "<br>";
   }
?>

