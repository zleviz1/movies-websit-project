<?php
require ("config.php");
if(array_key_exists('submitcomment',$_POST)){
    $comment=$_POST['comment'];
    $movie_id=$_POST['movieid'];
    $username=$_SESSION['username'];
    $time= date('Y-m-d');
    $c_id=$movie_id.$username;
    $query="INSERT INTO database_project.COMMENT(C_ID,USERNAME,MOVIE_ID,\"LIKE\",TIME,COMMENT) VALUES('$c_id','$username','$movie_id',0,'$time','$comment')";
    $result=  pg_query($dbconn,$query);
    if(!$result){
        die("you already commented");
    }
}
header("location: mainpage.php");
?>

