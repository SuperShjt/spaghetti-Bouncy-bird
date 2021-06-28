<?php

 $x=0;
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db = "Bouncy_dataBase";
 $conn =  mysqli_connect($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
 $query = 'SELECT * FROM users';
 $results=mysqli_query($conn,$query);

function CloseCon($conn)
 {
 $conn -> close();
 }
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $name = $_POST["username"];
     //echo $name;
     $pass = $_POST["password"];
     while($row = mysqli_fetch_assoc($results)) {
      if($row["username"]==$name && $row["password"]==$pass)
      {
        $x=$row["id"];
        break;
      }
      else{
      }
     }
  }
echo json_encode($x);

CloseCon($conn);
?>























