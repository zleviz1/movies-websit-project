<?php
 require ("config.php");
 if(empty($_SESSION['logged_in']))
{
    header('Location: index.php');
    exit;
}
    //session_start();
    $username=$_SESSION['username'];
    $query="SELECT TAG_ID FROM database_project.\"LIKE\" WHERE USERNAME=$1";
    $stmt=  pg_prepare($dbconn,"ps0",$query);
        $result=  pg_execute($dbconn,"ps0",array($username));
        
        if(!$result){
            die("Error in SQL query".pg_last_error());
        }
        $row_count=pg_num_rows($result);
        
        $query1="SELECT MOVIE_ID FROM database_project.MOVIE M ORDER BY M.RANK DESC LIMIT 3";
        $stmt1=  pg_prepare($dbconn,"ps1",$query1);
        $result1=  pg_execute($dbconn,"ps1",array());
        $firstmatch = pg_fetch_result($result1, 0, 0);
        $secondmatch=pg_fetch_result($result1, 1, 0);
        $thirdmatch=pg_fetch_result($result1, 2, 0);
        $query2="SELECT POST FROM database_project.MOVIE WHERE MOVIE_ID=$1";
        $stmt2=  pg_prepare($dbconn,"ps2",$query2);
        $postresult01=  pg_execute($dbconn,"ps2",array($firstmatch));
        $match01 = pg_fetch_result($postresult01, 0, 0);
        
        $query3="SELECT POST FROM database_project.MOVIE WHERE MOVIE_ID=$1";
        $stmt3=  pg_prepare($dbconn,"ps3",$query3);
        $postresult02=  pg_execute($dbconn,"ps3",array($secondmatch));
        $match02 = pg_fetch_result($postresult02, 0, 0);
        
        $query4="SELECT POST FROM database_project.MOVIE WHERE MOVIE_ID=$1";
        $stmt4=  pg_prepare($dbconn,"ps4",$query4);
        $postresult03=  pg_execute($dbconn,"ps4",array($thirdmatch));
        $match03 = pg_fetch_result($postresult03, 0, 0);
        
        $query5="SELECT NAME FROM database_project.MOVIE WHERE MOVIE_ID=$1";
        $stmt5=  pg_prepare($dbconn,"ps5",$query5);
        $resultmatch1= pg_execute($dbconn,"ps5",array($firstmatch));
        $moviename=  pg_fetch_result($resultmatch1,0,0);
        
        $query7="SELECT RANK FROM database_project.MOVIE WHERE MOVIE_ID=$1";
        $stmt7=  pg_prepare($dbconn,"ps7",$query7);
        $rankresult=  pg_execute($dbconn,"ps7",array($firstmatch));
        $rank=  pg_fetch_result($rankresult,0,0);
        
        $query6="SELECT RDATE FROM database_project.MOVIE WHERE MOVIE_ID=$1";
        $stmt6=  pg_prepare($dbconn,"ps6",$query6);
        $timeresult=  pg_execute($dbconn,"ps6",array($firstmatch));
        $Total_Time=  pg_fetch_result($timeresult, 0, 0);
        
        $query8="SELECT COMMENT, \"username\",\"LIKE\",TIME FROM database_project.COMMENT  WHERE MOVIE_ID =$1 ORDER  BY \"LIKE\" DESC LIMIT 3";
        $stmt8= pg_prepare($dbconn,"ps10",$query8);
        $commentholder=  pg_execute($dbconn,"ps10" ,array($firstmatch));
        $acountrowforcomment=  pg_num_rows($commentholder);
        if($acountrowforcomment>3){
        $comment1=pg_fetch_result($commentholder,0,0);
        $comment2=pg_fetch_result($commentholder,1,0);
        $comment3=pg_fetch_result($commentholder,2,0);
        $user1=pg_fetch_result($commentholder,0,1);
        $user2=pg_fetch_result($commentholder,1,1);
        $user3=pg_fetch_result($commentholder,2,1);
        $like1=pg_fetch_result($commentholder,0,2);
        $like2=pg_fetch_result($commentholder,1,2);
        $like3=pg_fetch_result($commentholder,2,2);
        $time1=pg_fetch_result($commentholder,0,3);
        $time2=pg_fetch_result($commentholder,1,3);
        $time3=pg_fetch_result($commentholder,2,3);
        
        }elseif($acountrowforcomment==2){
        $comment1=pg_fetch_result($commentholder,0,0);
        $comment2=pg_fetch_result($commentholder,1,0);
        $comment3="no comment yet";
        $user1=pg_fetch_result($commentholder,0,1);
        $user2=pg_fetch_result($commentholder,1,1);
        $user3="/";
        $like1=pg_fetch_result($commentholder,0,2);
        $like2=pg_fetch_result($commentholder,1,2);
        $like3="/";
        $time1=pg_fetch_result($commentholder,0,3);
        $time2=pg_fetch_result($commentholder,1,3);
        $time3="/";
        }elseif($acountrowforcomment==1){
             $comment1=pg_fetch_result($commentholder,0,0);
        $comment2="no comment yet";
        $comment3="no comment yet";
        $user1=pg_fetch_result($commentholder,0,1);
        $user2="/";
        $user3="/";
        $like1=pg_fetch_result($commentholder,0,2);
        $like2="/";
        $like3="/";
        $time1=pg_fetch_result($commentholder,0,3);
        $time2="/";
        $time3="/";
        }else{
            $comment1="no comment yet";
            $comment2="no comment yet";
        $comment3="no comment yet";
        $user1="/";
        $user2="/";
        $user3="/";
        $like1="/";
        $like2="/";
        $like3="/";
        $time1="/";
        $time2="/";
        $time3="/";
        }
        
?>

<title>Movie World</title>
<style>p.leftbutton{
    position: absolute;
    left: 100px
}
    p.middledisplay{
        position:absolute;
        left: 300px
    }
    body{
        color: rgb(252, 194, 0);
        margin-right:100px
    }
</style>
<head>
    <center>
        <form id="search" name="search" method="post" action="./search.php" style="position: absolute;left:750px;top:50px ;">
    <input name="keyword" type="text" id="keyword" value="movie,actor,director" size="50"/>
    <input type="submit" name="skeyword" id="skeyword" value="Search"/>
    <br />
    <br />
    <br />
    <br />
    <br />
    </form>
<form id="searchbytag" name="searchbytag" method="post" action="./searchbytag.php"style="position: absolute;left:750px;top:100px ;">
    <input type="submit" name="searchbytag" id="searchbytag" value="Tag"/>
    <br />
</form>
         <form id="trailer" name="trailer" method="post" action="./trailer.php"style="position: absolute;left:850px;top:100px ;">
    <input type="submit" name="trailer" id="trailer" value="Trailer"/>
    <br />
</form>

    </center>
</head>
<body>
    <video autoplay="" muted="" loop="" poster="" class="c-video-bg js-video-bg">
                <source src="http://s.lolstatic.com/site/taric-comic/db9babd9f498c7a6338b0d276cad89e3431d023d/video/video-bg.webm" type="video/webm">
                <source src="http://s.lolstatic.com/site/taric-comic/db9babd9f498c7a6338b0d276cad89e3431d023d/video/video-bg.mp4" type="video/mp4">
                <img src="http://s.lolstatic.com/site/taric-comic/db9babd9f498c7a6338b0d276cad89e3431d023d/img/video-bg-fallback.jpg" class="u-img-full">
            </video>
    <p class="leftbutton" style="position: absolute;left: 100px;top:150px;">
    <form id="myaccount" name="myaccount" method="post" action="./viewmyaccount.php"style="position: absolute;left: 100px;top:150px;">
        <input type="submit" name="viewyouraccount" id="viewyouraccount" value="Your Account"/><br />
    <br/>
    </form>
    <form id="Logout" name="Logout" method="post" action="./logout.php"style="position: absolute;left: 100px;top:175px;">
    <input type="submit" name="Logout" id="skeyword" value="    Log Out     "/><br />
    </form>
    </p>
    <p class="middledisplay"style="position: absolute;left: 400px;top:150px;opacity:0.5; filter: alpha(opacity=30); background-color:rgb(0, 0, 0);">
        <a href = 'movie.php?movie_id=<?php echo $firstmatch;?>'><img src=<?php echo $match01; ?> style="width:800px;height:500px"></a>
        <br />
        <br />
        Movie:<?php
        echo $moviename;
        ?>
    Release Date:<?php echo $Total_Time ?>
     Actor:<?php         
        $query8="SELECT ACTOR_ID FROM database_project.PLAY WHERE MOVIE_ID=$1";
        $stmt8=  pg_prepare($dbconn,"ps8",$query8);
        $actor_id = pg_execute($dbconn,"ps8",array($firstmatch));
        $row_count=pg_num_rows($actor_id);
        for($i=0;$i<$row_count;$i++){
            $actor_idholder= pg_fetch_result($actor_id, $i , 0);
            $qureyactnamefinder="SELECT ACTOR_NAME FROM database_project.ACTOR WHERE ACTOR_ID = $1";
            $stmtactornamefinder= pg_prepare($dbconn,$i,$qureyactnamefinder);
            $actorname=  pg_execute($dbconn, $i,array($actor_idholder));
            $displayactorname=pg_fetch_result($actorname, 0 , 0);
            echo $displayactorname;
            echo " ";
        }
        ?>
    
        Director:<?php         
        $query8="SELECT DIRECTOR_ID FROM database_project.DIRECT WHERE MOVIE_ID=$1";
        $stmt8=  pg_prepare($dbconn,"ps9",$query8);
        $director_id = pg_execute($dbconn,"ps9",array($firstmatch));
        $row_count=pg_num_rows($director_id);
        for($i=0;$i<$row_count;$i++){
            $director_idholder= pg_fetch_result($director_id, $i , 0);
            $qureydircnamefinder="SELECT DIRECTOR_NAME FROM database_project.DIRECTOR WHERE DIRECTOR_ID = $1";
            $stmtdircnamefinder= pg_prepare($dbconn,$i+3,$qureydircnamefinder);
            $directorname=  pg_execute($dbconn, $i+3,array($director_idholder));
            $displaydircname=pg_fetch_result($directorname, 0 , 0);
            echo $displaydircname;
            echo " ";
        }
        ?>
    Rating: <?php echo $rank; ?><br/>
    <a href ='movie.php?movie_id=<?php echo $firstmatch?>'>View Deatil</a>
    <br />
    <br />
    
    <div class="head" style="position: absolute;left:400px;top:720px;"><h3 class="title">Comment:</h3></div>
    <table border="1" style="position: absolute;left:400px;top:800px;opacity:0.5; filter: alpha(opacity=30); background-color:rgb(0, 0, 0);">
        <thead>
            <tr>
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
            <tr>
                <td><?php
                echo $comment1;
                ?></td>
                <td>
                    <?php echo $user1;?>
                </td>
                <td>
                    <?php echo $like1;?>
                </td>
                <td>
                    <?php echo $time1;?>
                </td>
            </tr>
            <tr>
                <td><?php
                echo $comment2;
                ?></td>
                <td>
                    <?php echo $user2;?>
                </td>
                <td>
                    <?php echo $like2;?>
                </td>
                <td>
                    <?php echo $time2;?>
                </td>
            </tr>
            <tr>
                <td><?php
                echo $comment3;
                ?></td>
                <td>
                    <?php echo $user3;?>
                </td>
                <td>
                    <?php echo $like3;?>
                </td>
                <td>
                    <?php echo $time3;?>
                </td>
            </tr>
        </thead>
    </table>
    
    </p>
    
    <div class="head"style="position: absolute;left: 1400px;top:100px;"><h3 class="title"><a href="recomend.php">Best match:</a></h3></div>
    <br />
    <div class="body" style="position: absolute;left: 1400px;top:150px;">
        <span style="">
        <a href = 'movie.php?movie_id=<?php echo$firstmatch;?>'><img src=<?php echo$match01;?> style="width:200px;height:250px"></a><br />
        <br />
        <br />
        <a href = 'movie.php?movie_id=<?php echo $secondmatch;?>'><img src=<?php echo$match02;?>  style="width:200px;height:250px"></a><br />
        <br />
        <br />
        <a href ='movie.php?movie_id=<?php echo $thirdmatch;?>'><img src=<?php echo$match03;?>  style="width:200px;height:250px"></a><br />
    </span></div>
        
</body>
