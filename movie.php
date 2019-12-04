<style>
    body{
        background-image: url("background4.jpg");
        background-size: fixed;
    }
</style>
<?php
require ("config.php");
if(empty($_SESSION['logged_in']))
{
    header('Location: index.php');
    exit;
}
$movie_id=$_GET['movie_id'];
$query="SELECT NAME,RDATE,LANGUAGE,COUNTRY,RANK,DESCRIPTION,POST,DEVICE_USE,TRAILER FROM database_project.MOVIE WHERE MOVIE_ID=$1";
$stmt=  pg_prepare($dbconn,"ps",$query);
$result=  pg_execute($dbconn,"ps",array($movie_id));
$name = pg_fetch_result($result, 0, 0);
$date = pg_fetch_result($result, 0, 1);
$language = pg_fetch_result($result, 0, 2);
$country = pg_fetch_result($result, 0, 3);
$rank = pg_fetch_result($result, 0, 4);
$description = pg_fetch_result($result, 0, 5);
$post = pg_fetch_result($result, 0, 6);       
$device_use = pg_fetch_result($result, 0, 7);
$trailer= pg_fetch_result($result, 0, 8);
$actor='actor';
$director='director';
?>
<center>
<body>
    <img src="<?php echo $post;?>"><br />
    <?php echo $trailer?><br />
    <p>Name: <?php echo $name;?><br />
       Release Date: <?php echo $date;?><br />
       Language: <?php echo $language;?><br />
       Country: <?php echo $country;?><br />
       Rate: <?php echo $rank;?><br />
       Description: <?php echo $description;?><br />
       Device Use:<?php echo $device_use?><br/>
    </p>
<P>Actor:
    <?php
$querya="SELECT ACTOR_ID FROM database_project.PLAY WHERE MOVIE_ID=$1";
$stmta=  pg_prepare($dbconn,"ps1",$querya);
$actor_id = pg_execute($dbconn,"ps1",array($movie_id));
$row_counta=pg_num_rows($actor_id);
for($i=0;$i<$row_counta;$i++){
    $p=$actor.$i;
    $r='r';
     $p1=$p.$r;
    $actor_idholder= pg_fetch_result($actor_id, $i , 0);
    $qureyactnamefinder="SELECT ACTOR_NAME FROM database_project.ACTOR WHERE ACTOR_ID = $1";
    $stmtactornamefinder= pg_prepare($dbconn,$p,$qureyactnamefinder);
    $actorname=  pg_execute($dbconn, $p,array($actor_idholder));
    $displayactorname=pg_fetch_result($actorname, 0 , 0);
    echo $displayactorname;
    echo " (name)";
    $qureyactnamerfinder="SELECT ROLE FROM database_project.PLAY WHERE ACTOR_ID = $1";
    $stmtactornamerfinder= pg_prepare($dbconn,$p1,$qureyactnamerfinder);
    $actornamer=  pg_execute($dbconn, $p1,array($actor_idholder));
    $displayactornamer=pg_fetch_result($actornamer, 0 , 0);
    echo "$displayactornamer (role)   ";
    }?>
</p>

<p>Director:
<?php
$queryd="SELECT DIRECTOR_ID FROM database_project.DIRECT WHERE MOVIE_ID=$1";
        $stmtd=  pg_prepare($dbconn,"ps9",$queryd);
        $director_id = pg_execute($dbconn,"ps9",array($movie_id));
        $row_countd=pg_num_rows($director_id);
        for($i=0;$i<$row_countd;$i++){
            $p=$director.$i;
            $director_idholder= pg_fetch_result($director_id, $i , 0);
            $qureydircnamefinder="SELECT DIRECTOR_NAME FROM database_project.DIRECTOR WHERE DIRECTOR_ID = $1";
            $stmtdircnamefinder= pg_prepare($dbconn,$p,$qureydircnamefinder);
            $directorname=  pg_execute($dbconn, $p,array($director_idholder));
            $displaydircname=pg_fetch_result($directorname, 0 , 0);
            echo $displaydircname;
        echo " ";
        }
    /*$query8="SELECT ORDER  BY LIKE DESC LIMIT 3";
        $stmt8= pg_prepare($dbconn,"ps10",$query8);
        $commentholder=  pg_execute($dbconn,"ps10" ,array($movie_id));*/
?>
</p>

<table border="1">
        <thead>
                <tr><td>
                   Comment ID
                </td>
                <td>
                    Comment
                </td>
                <td>
                    User
                </td>
                <td>
                    Like
                </td>
                <td>
                    Time
                </td>
            </tr>  
<?php $queryc="SELECT C_ID,COMMENT, USERNAME, \"LIKE\", TIME FROM database_project.COMMENT C WHERE MOVIE_ID=$1";
$stmtc=  pg_prepare($dbconn,"psc",$queryc);
$resultc = pg_execute($dbconn,"psc",array($movie_id));
$row_countc=pg_num_rows($resultc);
for($i=0;$i<$row_countc;$i++){
    $comment_id= pg_fetch_result($resultc, $i, 0);
    $comment=  pg_fetch_result($resultc, $i, 1);
    $username= pg_fetch_result($resultc, $i, 2);
    $like= pg_fetch_result($resultc, $i, 3);
    $time= pg_fetch_result($resultc, $i, 4);
    echo"<tr>
                <td>
                $comment_id
                </td>
                <td>
                     $comment
                </td>
                <td>
                     $username
                </td>
                <td>
                     $like
                </td>
                <td>
                    $time
                </td>
            </tr>";
}
?>
        </thead>
    </table>
<p>Support the Comment that you like:</p>
<form id="likecomment" name="likecomment" method="post" action="./likecomment.php" >
    <input name="likecomment" type="text" id="likecomment" value="Comment ID"/>
    <input type="submit" name="submitcommentlike" id="submitecommentlike" value="submite"/><br/>
</form>
Write Your Comment:
<form id="commentform" name="commentform" method="post" action="./insertcomment.php" >
               <p><input name="comment" type="text" id="comment" size="50"/><br />
                   <input type="hidden" typr = "text" name="movieid" id="movieid" value="<?php echo $movie_id; ?>">
              
            <input type="submit" name="submitcomment" id="submitcomment" value="submite"/><br/>
        </p>
        </form>
<form id="ecommentform" name="ecommentform" method="post" action="./editcomment.php" >
                    <p><input name="comment" type="text" id="comment" size="50"/><br />
                   <input type="hidden" typr = "text" name="movieid" id="movieid" value="<?php echo $movie_id; ?>">
            <input type="submit" name="editcomment" id="editcomment" value="edit your comment"/><br/>
        </form>
<a href ="mainpage.php">back to main page</a><br />


</body>
</center>