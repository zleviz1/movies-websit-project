<style> 
    body{
      background-image:url("background1.jpg");
      background-size: 100% 100%;
    }
    </style>
<?php
require ("config.php");
if(empty($_SESSION['logged_in']))
{
    header('Location: index.php');
    exit;
}
    //session_start();
    $username=$_SESSION['username'];
    $query="SELECT * FROM database_project.PROFILE WHERE USERNAME=$1";
    $stmt=  pg_prepare($dbconn,"ps",$query);
    $result=  pg_execute($dbconn,"ps",array($username));
        
    if(!$result){
    die("Error in SQL query".pg_last_error());
    }
    $row_count=pg_num_rows($result);
        
    $username = pg_fetch_result($result, 0, 0);
    $firstname= pg_fetch_result($result, 0, 1);
    $lastname= pg_fetch_result($result, 0, 2);
    $email= pg_fetch_result($result, 0, 3);
    $gender= pg_fetch_result($result, 0, 4);
    $occupation= pg_fetch_result($result, 0, 5);
    $country= pg_fetch_result($result, 0, 6);
    $province= pg_fetch_result($result, 0, 7);
    $city= pg_fetch_result($result, 0, 8);
    $month= pg_fetch_result($result, 0, 9);
    $day= pg_fetch_result($result, 0, 10);
    $year= pg_fetch_result($result, 0, 11);
    $ReDate= pg_fetch_result($result, 0, 12);
    echo"<center>";
    echo "<P> Username:             $username</p>";
    echo "<P> Firstname:            $firstname</p>";
    echo "<P> Lastname:             $lastname</p>";
    echo "<P> Email:                $email</p>";
    echo "<P> Gender:               $gender</p>";
    echo "<P> Occupation:           $occupation</p>";
    echo "<P> Country:              $country</p>";
    echo "<P> Province:             $province</p>";
    echo "<P> City:                 $city</p>";
    echo "<P> Date of Birth:</p>";
    echo "<P> Month:                $month</p>";
    echo "<P> Day:                  $day</p>";
    echo "<P> Year:                 $year</p>";
    echo "<P> Register Date:        $ReDate</p>";
    
    ?>
<form id="editprofile" name="editprofile" method="post" action="./editmyprofile.php">
    <input type="submit" name="editmyprofile" id="editmyprofile" value="Edit"/><br/>
    <a href = mainpage.php>back to main page</a>
</form>
    </center>