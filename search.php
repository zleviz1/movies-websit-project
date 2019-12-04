<style>
    body{
        background-image: url("background1.jpg");
        background-size: fixed;
    }
</style>
<center><form id="search" name="search" method="post" action="./search.php" style="position: absolute;left:750px;top:50px ;">
        <input name="keyword" type="text" id="keyword" value="<?php echo$_POST['keyword']?>" size="50"/>
    <input type="submit" name="skeyword" id="skeyword" value="Search"/></form></center>
<?php
 require ("config.php");
    if(array_key_exists('skeyword',$_POST)){
        $keyword="%".$_POST['keyword']."%";
        $query="SELECT MOVIE_ID FROM database_project.MOVIE WHERE NAME LIKE $1;";
        $stmt=  pg_prepare($dbconn,"ps",$query);
        $result=  pg_execute($dbconn,"ps",array($keyword));
        $querya="SELECT ACTOR_ID FROM database_project.ACTOR WHERE ACTOR_NAME LIKE $1;";
        $stmta=  pg_prepare($dbconn,"psa",$querya);
        $resulta=  pg_execute($dbconn,"psa",array($keyword));
        $queryd="SELECT DIRECTOR_ID FROM database_project.DIRECTOR WHERE DIRECTOR_NAME LIKE $1;";
        $stmtd=  pg_prepare($dbconn,"psd",$queryd);
        $resultd=  pg_execute($dbconn,"psd",array($keyword));
        if(!$result){
            die("Error in SQL query".pg_last_error());
        }
        $row_count=pg_num_rows($result);
        echo "<h1>Search by Movie Name:<h1>";
        if($row_count>0){
            for($i=0;$i<$row_count;$i++){
                $movie_id=  pg_fetch_result($result, $i, 0);
                $queryformoviename="SELECT NAME, POST FROM database_project.MOVIE WHERE MOVIE_ID =$1;";
                $stmt1=  pg_prepare($dbconn,$i,$queryformoviename);
                $movienameresult=  pg_execute($dbconn,$i,array($movie_id));
                $moviename=pg_fetch_result($movienameresult,0,0);
                $moviepost=pg_fetch_result($movienameresult, 0,1);
                echo "<a href='movie.php?movie_id=$movie_id'><img src='$moviepost'style=\"width:200px;height:250px\"></a><br />";
                echo " $moviename<br />"; 
            }
        }else{
            echo"<h2>No Thing Found.<h2>";
        }
        
        $a='a';
        $b='b';
        $row_counta=  pg_num_rows($resulta);
        echo "<h1>Search by Actor Name:<h1>";
        if($row_counta>0){
            for($k=0;$k<$row_counta;$k++){
                $actor_id=  pg_fetch_result($resulta, $k, 0);
                $o=$k.$a;
                $queryam="SELECT MOVIE_ID FROM database_project.PLAY WHERE ACTOR_ID =$1;";
                $stmtam=  pg_prepare($dbconn,$o,$queryam);
                $movieidresult=  pg_execute($dbconn,$o,array($actor_id));
                $row_countam=pg_num_rows($movieidresult);
                for($j=0;$j<$row_countam;$j++){ 
                    $movie_ida=  pg_fetch_result($movieidresult,$j,0);
                    $queryamn="SELECT NAME,POST FROM database_project.MOVIE WHERE MOVIE_ID=$1;";
                    $p=$j.$actor_id;
                    $stmtamn=  pg_prepare($dbconn,$p,$queryamn);
                    $resultam=  pg_execute($dbconn,$p,array($movie_ida));
                    $movienamea=pg_fetch_result($resultam,0,0);
                    $movieposta=pg_fetch_result($resultam, 0,1);
                    echo "<a href= 'movie.php?movie_id=$movie_ida'><img src='$movieposta'style=\"width:200px;height:250px\"></a><br />";
                    echo " $movienamea<br />"; 
                    $queryamnn="SELECT ACTOR_NAME FROM database_project.ACTOR WHERE ACTOR_ID=$1;";
                    $q=$p.$actor_id;
                    $stmtamnn=  pg_prepare($dbconn,$q,$queryamnn);
                    $resultamn=  pg_execute($dbconn,$q,array($actor_id));
                    $actorname=pg_fetch_result($resultamn,0,0);
                    echo "act by $actorname<br />";
                }
            }
        }else{
            echo"<h2>No Thing Found.<h2>";
        }
        
       $row_countd=  pg_num_rows($resultd);
       echo "<h1>Search by Director Name:<h1>";
        if($row_countd>0){
            for($i=0;$i<$row_countd;$i++){
                $director_id=  pg_fetch_result($resultd, $i, 0);
                $o=$i.$b;
                $querydm="SELECT MOVIE_ID FROM database_project.DIRECT WHERE DIRECTOR_ID =$1;";
                $stmtdm=  pg_prepare($dbconn,$o,$querydm);
                $movieidresultd=  pg_execute($dbconn,$o,array($director_id));
                $row_countdm=pg_num_rows($movieidresultd);
                for($j=0;$j<$row_countdm;$j++){
                    $movie_idd= pg_fetch_result($movieidresultd,$j,0);
                    $p=$j.$director_id;
                    $querydmn="SELECT NAME,POST FROM database_project.MOVIE WHERE MOVIE_ID=$1;";
                    $stmtdmn=  pg_prepare($dbconn,$p,$querydmn);
                    $resultdm=  pg_execute($dbconn,$p,array($movie_idd));
                    $movienamed=pg_fetch_result($resultdm,0,0);
                    $moviepostd=pg_fetch_result($resultdm, 0,1);
                    echo "<a href='movie.php?movie_id=$movie_idd'><img src='$moviepostd'style=\"width:200px;height:250px\"></a><br />";
                    echo " $movienamed<br />"; 
                    $queryamnn="SELECT DIRECTOR_NAME FROM database_project.DIRECTOR WHERE DIRECTOR_ID=$1;";
                    $q=$p.$director_id;
                    $stmtdmnn=  pg_prepare($dbconn,$q,$queryamnn);
                    $resultdmn=  pg_execute($dbconn,$q,array($director_id));
                    $directorname=pg_fetch_result($resultdmn,0,0);
                    echo "direct by $directorname<br />";
                }
            }
        }else{
            echo"<h2>No Thing Found.<h2>";
        }
        
    }
     echo"<a href = mainpage.php>back to main page</a>";
