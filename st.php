<?php
require ("config.php");
//session_start();
if(empty($_SESSION['logged_in']))
{
    header('Location: index.php');
    exit;
}
if (isset($_POST['Set_up'])) 
{    $username=$_SESSION['username'];
     foreach($_POST['check_box'] as $value){
     echo "$value";
     
     
         $LIKE_ID=$username.$value;
         $query=" INSERT INTO database_project.\"LIKE\"(USERNAME,LIKE_ID,TAG_ID) VALUES('$username','$LIKE_ID','$value')";
         $result=  pg_query($dbconn,$query);
         if(!$result){
        die("Error in SQL query".pg_last_error());
         }
    }
    $_SESSION['username']=$username;
    $_SESSION['logged_in']=true;
    header("location: mainpage.php");
    pg_free_result($result);
    pg_close($dbconn);
     }
     
?>
