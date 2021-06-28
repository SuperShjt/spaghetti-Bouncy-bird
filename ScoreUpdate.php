<?php

 $x=0;
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db = "Bouncy_dataBase";
 $conn =  mysqli_connect($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
//  $id = 1;
//  $score = 4;
 
 $id = $_POST["id"];
 $score = $_POST["score"];
 $query = "SELECT * FROM users where id='".$id."'";
 $results=mysqli_query($conn,$query);

function CloseCon($conn)
 {
 $conn -> close();
 }
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
     if(mysqli_num_rows($results) > 0) {
        while($row = mysqli_fetch_assoc($results)) {
            if($score > $row["BestScore"]){
                $query2= "update users set BestScore='".$score."' where id='".$id."'";
                if(mysqli_query($conn,$query2)){
                    // echo "success";
                }else{
                    // echo "failed ".mysqli_error($conn);
                }
                
            }
        }
     }
  }
  $users_query = "SELECT id, username, BestScore FROM users";
  $users_results=mysqli_query($conn,$users_query);
  $users= [];
  while($row= mysqli_fetch_assoc($users_results)){
      $users[]= $row;
  }
echo json_encode($users);

CloseCon($conn);
?>