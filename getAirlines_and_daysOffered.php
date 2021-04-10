<!-- Part 2: To querry all airlines and days offered from database. Complete -->
<?php
   $query = "SELECT * FROM airline";
   $result = $connection->query($query);
   echo "Which arline? </br>";
   echo "<br>";
   while ($row = $result->fetch()) {
        echo '<input type="radio" name="airline" value="';
        echo $row["code"];
        echo '">' . $row["name"] . " | " . $row["code"] . "<br>";
   }
   $query = "SELECT * FROM days_offered";
   $result = $connection->query($query);
   echo "<br>";
   echo "<br>";
   echo "Days Offered? </br>";
   echo "<br>";
   while ($row = $result->fetch()) {
        echo '<input type="radio" name="day" value="';
        echo $row["day"];
        echo '">' . $row["day"] . "<br>";
   }
   echo "<br>";
?>

