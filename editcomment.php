<?php
require ("config.php");
if(array_key_exists('editcomment',$_POST)){
    $comment=$_POST['comment'];
    $movie_id=$_POST['movieid'];
    $username=$_SESSION['username'];
    $time= date('Y-m-d');
    $c_id=$movie_id.$username;
    $query="UPDATE database_project.COMMENT SET TIME='$time', COMMENT='$comment' WHERE C_ID ='$c_id';";
    $result=  pg_query($dbconn,$query);
    if(!$result){
        die("your comment is not exsits");
    }
}
header("location: mainpage.php");
?>


