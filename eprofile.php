<?php
require ("config.php");
$USERNAME=$_SESSION['username'];
 if(isset($_POST['Email'])){
     $Email=$_POST['Email'];
$query="UPDATE database_project.PROFILE SET Email='$Email' WHERE USERNAME ='$USERNAME'";
$result=  pg_query($dbconn,$query);
 } 
 if(isset($_POST['First_name'])){
     $firstname=$_POST['First_name'];
$query="UPDATE database_project.PROFILE SET firstname='$firstname'WHERE USERNAME ='$USERNAME'";
$result=  pg_query($dbconn,$query);
 } 
 if(isset($_POST['Last_name'])){
     $lastname=$_POST['Last_name'];
$query="UPDATE database_project.PROFILE SET lastname='$lastname'WHERE USERNAME ='$USERNAME'";
$result=  pg_query($dbconn,$query);
 } 
 if(isset($_POST['Gender'])){
     $gender=$_POST['Gender'];
$query="UPDATE database_project.PROFILE SET GENDER='$gender'WHERE USERNAME ='$USERNAME'";
$result=  pg_query($dbconn,$query);
 } 
 if(isset($_POST['Occupation'])){
     $Occupation=$_POST['Occupation'];
$query="UPDATE database_project.PROFILE SET OCCPATION='$Occupation'WHERE USERNAME ='$USERNAME'";
$result=  pg_query($dbconn,$query);
 } 
  if(isset($_POST['Country'])){
     $Country=$_POST['Country'];
$query="UPDATE database_project.PROFILE SET COUNTRY='$Country'WHERE USERNAME ='$USERNAME'";
$result=  pg_query($dbconn,$query);
 } 
  if(isset($_POST['Province'])){
     $Province=$_POST['Province'];
$query="UPDATE database_project.PROFILE SET Province='$Province'WHERE USERNAME ='$USERNAME'";
$result=  pg_query($dbconn,$query);
 } 
   if(isset($_POST['City'])){
     $city=$_POST['City'];
$query="UPDATE database_project.PROFILE SET CITY='$city'WHERE USERNAME ='$USERNAME'";
$result=  pg_query($dbconn,$query);
 } 
   if(isset($_POST['Month'])){
     $month=$_POST['Month'];
$query="UPDATE database_project.PROFILE SET MONTH='$month'WHERE USERNAME ='$USERNAME'";
$result=  pg_query($dbconn,$query);
 } 
   if(isset($_POST['Day'])){
     $day=$_POST['Day'];
$query="UPDATE database_project.PROFILE SET DAY='$day'WHERE USERNAME ='$USERNAME'";
$result=  pg_query($dbconn,$query);
 } 
   if(isset($_POST['Year'])){
     $year=$_POST['Year'];
$query="UPDATE database_project.PROFILE SET YEAR='$year'WHERE USERNAME ='$USERNAME'";
$result=  pg_query($dbconn,$query);
 } 
 echo"profile sucess !<a href= mainpage.php>back to main page</a>";


