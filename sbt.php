<style>
    body{
        background-image: url("background1.jpg");
        background-size: fixed;
    }
</style>
<center>
<?php
  require ("config.php");
$search=$_POST["check_list"];
$search_string = implode("',' ", $search);
$hero="'";
$search_stringhero=$hero.$search_string.$hero;
//echo $search_stringhero;
$query="SELECT MOVIE_ID FROM database_project.MOVIE_TAG WHERE TAG_ID IN ($search_stringhero)";
$stmt=  pg_prepare($dbconn,"ps",$query);
$result=  pg_execute($dbconn,"ps",array());
$count=0;
$queryt="queryt";
$row_count=pg_num_rows($result);
if($row_count>0){
    for($i=0;$i<$row_count;$i++){
       $MOVIE_ID=  pg_fetch_result($result, $i, 0);
       $query1="SELECT POST FROM database_project.MOVIE WHERE MOVIE_ID=$1";
       $stmt1=  pg_prepare($dbconn,$i,$query1);
       $result1=  pg_execute($dbconn,$i,array($MOVIE_ID));
       $row_count1=pg_num_rows($result1);
       $MOVIE_POST=  pg_fetch_result($result1, 0, 0);
       echo "<a href= 'movie.php?movie_id=$MOVIE_ID'><img src='$MOVIE_POST'style=\"width:200px;height:250px\"></a><br />";
       echo "<br />";
    }
       echo "search by tag:$search_string<br />";
       echo"<a href = mainpage.php>back to main page</a>";
    
    }else{
       // foreach($_POST['check_list'] as $value){
       //     $querytt=$queryt.$count;
    //$querytt="SELECT MOVIE_ID FROM database_project.MOVIE_TAG WHERE TAG_ID $1";
//$stmt=  pg_prepare($dbconn,"ps",$query);
//$resultt=  pg_execute($dbconn,"ps",array($value));
        echo "nothing found by follow tag:$search_string<br />";
    echo "<a href=searchbytag.php>back to main page</a>";
  //  $count=$count+1;
   // $display="$querytt INTERSECT $";
    
   //     }
    
        }
?>
</center>
