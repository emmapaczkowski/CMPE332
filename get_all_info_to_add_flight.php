<?php
   $query = "SELECT * FROM airline";
   $result = $connection->query($query);
   echo "Which arline? </br>";
   while ($row = $result->fetch()) {
        echo '<input type="radio" name="airline" value="';
        echo $row["code"];
        echo '">' . $row["name"] . " | " . $row["code"] . "<br>";
   }
   echo "<br>";
   $query = "SELECT * FROM airport";
   $result = $connection->query($query);
   echo "Departure Airport? </br>";
   while ($row = $result->fetch()) {
        echo '<input type="radio" name="departure" value="';
        echo $row["name"];
        echo '">' . $row["code"] .  "<br>";
   }
   echo "<br>";
   $query = "SELECT * FROM airport";
   $result = $connection->query($query);
   echo "Arival Airport? </br>";
   while ($row = $result->fetch()) {
        echo '<input type="radio" name="arrival" value="';
        echo $row["name"];
        echo '">' . $row["code"] . "<br>";
   }

?>