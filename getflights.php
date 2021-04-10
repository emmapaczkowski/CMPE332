<!-- This is for the first part of the assignment and it complete -->
<?php
$result = $connection->query("SELECT flight_number, actuall_arrival FROM flight WHERE actuall_arrival = scheduled_arrival;");

echo "<table class = 'table' border='1'>
   <tr>
   <th> Flight Number </th>
   <th> Arrival Time </th>
   </tr>";

   while ($row = $result->fetch()) {
	echo "<tr>";
	echo "<td>" . $row["flight_number"] . "</td>";
    echo "<td>" . $row["actuall_arrival"] . "</td>";
    echo "</tr>"; 
}
echo "</table>";




?>



