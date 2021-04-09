<?php
   $whichAirline= $_POST["petowners"];
   $query = 'SELECT * FROM owner, pet WHERE pet.ownerid=owner.ownerid AND pet.ownerid="' . $whichOwner . '"';
   $result=$connection->query($query);
    
    while ($row=$result->fetch()) {
	echo "<tr><td>".$row["petname"]."</td><td>".$row["species"]."</td></tr>";
    }
?>
<?php
   $query = "SELECT * FROM owner";
   $result = $connection->query($query);
   echo "Who are you looking up? </br>";
   while ($row = $result->fetch()) {
        echo '<input type="radio" name="petowners" value="';
        echo $row["ownerid"];
        echo '">' . $row["fname"] . " " . $row["lname"] . "<br>";
   }
?>