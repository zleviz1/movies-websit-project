<?php
require ("config.php");
//session_start();
$c_id=$_POST['likecomment'];
$username=$_SESSION['username'];
$like_id=$c_id.$username;
$query="SELECT * FROM database_project.COMMENT WHERE C_ID=$1";
$stmt=  pg_prepare($dbconn,"ps",$query);
        $result=  pg_execute($dbconn,"ps",array($c_id));
        if(!$result){
            die("Error in SQL query".pg_last_error());
        }
        $row_count=pg_num_rows($result);
        if($row_count>0){
            $query1="SELECT * FROM database_project.GOOD WHERE GOOD_ID=$1";
        $stmt1=  pg_prepare($dbconn,"ps1",$query1);
        $result1=  pg_execute($dbconn,"ps1",array($like_id));
            $row_count1=pg_num_rows($result1);
            if(!$result1){
            die("Error in SQL query".pg_last_error());
            }
            if($row_count1>0){
                die("you already liked this comment.");
            }
             $query2="SELECT \"LIKE\" FROM database_project.COMMENT WHERE C_ID=$1";
             $stmt2=  pg_prepare($dbconn,"ps2",$query2);
             $result2=  pg_execute($dbconn,"ps2",array($c_id));
             $like=pg_fetch_result($result2, 0, 0);
             $like = $like+1;
             $query3="UPDATE database_project.COMMENT SET \"LIKE\"='$like' WHERE C_ID='$c_id'";
             $query4="INSERT INTO database_project.GOOD(GOOD_ID,USERNAME,C_ID) VALUES('$like_id','$username','$c_id')";
             $result3=  pg_query($dbconn,$query3);
             $result4=  pg_query($dbconn,$query4);
             echo "like comment sucess!";
             echo "<a href = mainpage.php>back</a>";
        }else{
            die( "no such comment exsits");
        }
?>

