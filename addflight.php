
<?php
   include 'connectdb.php';
?>
<?php
   $airline = $_POST["airline"];
   $deparureCode = $_POST["departure"];
   $arrivalCode = $_POST["arrival"];

   $flightNum = $_POST["flightNum"];
   $airlineType = $_POST["airplaneType"];
   $departTime = $_POST["departureTime"];
   $arrivalTime = $_POST["arrivalTime"];
   $dayOfWeek = $_POST["dayOfWeek"];

   $query = 'INSERT INTO flight VALUES("' . $flightNum. '" , "' . $airline . '" , "' . $airlineType. '" , "' . $arrivalCode. '" , "' . $deparureCode . '" , "' . $departTime. '" , "' .$departTime . '" , "' . $arrivalTime . '" , "' .$arrivalTime . '")';
   $numRows = $connection->exec($query);
//    $petName = $_POST["petname"];
//    $species =$_POST["species"];
//    $query1= 'select max(petid) as maxid from pet';
//    $result= $connection->query($query1);
//    $row=$result->fetch();
//    $newkey = intval($row["maxid"]) + 1;
//    $petid = (string)$newkey;
//    $query2 = 'INSERT INTO pet values("' . $petid . '","' . $petName . '","' . $species . '","' . $whichOwner . '")';
//    $numRows = $connection->exec($query2);
//    echo "Your pet was added!";
//    $connection = NULL;
?>
<p> Return to home page: </p>
   <button onclick="window.location.href='airline.php';">
      Return to home page!
   </button>