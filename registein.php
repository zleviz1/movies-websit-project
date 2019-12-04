<?php
error_reporting(E_ERROR);
require ("config.php");
if(array_key_exists('registein',$_POST)){
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    $email=$_POST['Email'];
    $firstname=$_POST['First_name'];
    $lastname=$_POST['Last_name'];
    $gender=$_POST['Gender'];
    $occupation=$_POST['Occupation'];
    $country=$_POST['Country'];
    $province=$_POST['Province'];
    $city=$_POST['City'];
    $month=$_POST['Month'];
    $day=$_POST['Day'];
    $year=$_POST['Year'];
    $redate=date('Y-m-d');
  
    $query2="INSERT INTO database_project.profile(USERNAME,FIRSTNAME,LASTNAME,EMAIL,GENDER,OCCPATION,COUNTRY,
            PROVINCE,CITY,MONTH,DAY,YEAR,ReDATE) VALUES('$username','$firstname','$lastname','$email','$gender','$occupation',
            '$country','$province','$city','$month','$day','$year','$redate')";
    $result2=  pg_query($dbconn,$query2);
      $query1="INSERT INTO database_project.\"USER\"(USERNAME,PASSWORD) VALUES('$username','$password')";
    if(!$result2){
        echo"Error, information not complete or username has been taken<br />";
        echo "<a href=index.php>back to login</a><br />";
        die("");
    }
    $result1=  pg_query($dbconn,$query1);
    if(!$result1){
        echo"username has been taken<br />";
        echo "<a href=index.php>back to login</a><hr />";
        die("");
    }
    
    
    $_SESSION['username']=$username;
    $_SESSION['logged_in']=true;
    header("location: set up your file.php");
    pg_free_result($result1);
    pg_free_result($result2);
    pg_close($dbconn);
}
?>