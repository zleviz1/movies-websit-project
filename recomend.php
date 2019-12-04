<style>
    body{
        background-image: url("background1.jpg");
        background-size: fixed;
    }
</style>
<center>
<?php
 require ("config.php");
 $username=$_SESSION['username'];
 $query="SELECT TAG_ID FROM database_project.\"LIKE\" WHERE USERNAME=$1";
 $stmt=  pg_prepare($dbconn,"ps",$query);
 $result=  pg_execute($dbconn,"ps",array($username));
 $herostring= "'";
 $anotherhero="' OR TAG_ID='";
 $badass="T10000'";
 $row_count=  pg_num_rows($result);
 for($i=0;$i<$row_count;$i++){
     $TAG_ID=  pg_fetch_result($result, $i, 0);
     $herostring=$herostring.$TAG_ID.$anotherhero;
 }
 $herostring=$herostring.$badass;
$query10="SELECT DISTINCT MOVIE_ID FROM database_project.MOVIE_TAG WHERE TAG_ID=$herostring";
 $stmt10=  pg_prepare($dbconn,"ps10",$query10);
 $result10=  pg_execute($dbconn,"ps10",array());
 $row = pg_num_rows($result10);
 for($j=0;$j<$row;$j++){
     $MOVIE_ID=  pg_fetch_result($result10, $j, 0);
       $query1="SELECT POST FROM database_project.MOVIE WHERE MOVIE_ID=$1";
       $stmt1=  pg_prepare($dbconn,$j,$query1);
       $result1=  pg_execute($dbconn,$j,array($MOVIE_ID));
       $row_count1=pg_num_rows($result1);
       $MOVIE_POST=  pg_fetch_result($result1, 0, 0);
       echo "<a href= 'movie.php?movie_id=$MOVIE_ID'><img src='$MOVIE_POST'style=\"width:200px;height:250px\"></a><br />";
       echo "<br />"; 
 }
        echo "<a href= mainpage.php>back to main page</a>";
?>
        </center>