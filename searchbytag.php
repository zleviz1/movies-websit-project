<style>
    body{
        background-image: url("background4.jpg");
        background-size: fixed;
    }
</style>
<center>
<form id="sbt" name="sbt" method="post" action="./sbt.php">
    
    <label >Type:</label><br />
    <input name="check_list" type="checkbox" value="T1"/>
    <label for ="Popular:">Popular(T1)</label>
    <input name="check_list[]" type="checkbox" value="T2"/>
    <label for ="Newest:">Newest(T2)</label>
    <input name="check_list[]" type="checkbox" value="T3"/>
    <label for ="Comedy:">Comedy(T3)</label>
    <input name="check_list[]" type="checkbox" value="T4"/>
    <label for ="Action:">Action(T4)</label>
    <input name="check_list[]" type="checkbox" value="T5"/>
    <label for ="Documentary:">Documentary(T5)</label><br />
    
    <input name="check_list[]" type="checkbox" value="T35"/>
    <label for ="Romantic:">Romantic(T35)</label>
    <input name="check_list[]" type="checkbox" value="T6"/>
    <label for ="Anime:">Anime(T6)</label>
    <input name="check_list[]" type="checkbox" value="T7"/>
    <label for ="Horror:">Horror(T7)</label>                                                               
    <input name="check_list[]" type="checkbox" value="T8"/>
    <label for ="Tragedy:">Tragedy(T8)</label>
    <input name="check_list[]" type="checkbox" value="T9"/>
    <label for ="Violence:">Violence(T9)</label><br />
    
    <input name="check_list[]" type="checkbox" value="T10"/>
    <label for ="Science_Fiction:">Science Fiction(T10)</label>
    <input name="check_list[]" type="checkbox" value="T11"/>
    <label for ="Family:">Family(T11)</label>
    <input name="check_list[]" type="checkbox" value="T12"/>
    <label for ="Crime:">Crime(T12)</label>
    <input name="check_list[]" type="checkbox" value="T13"/>
    <label for ="Musical:">Musical(T13)</label>
    <input name="check_list[]" type="checkbox" value="T14"/>
    <label for ="Suspense:">Suspense(T14)</label><br />
    
    <input name="check_list[]" type="checkbox" value="T15"/>
    <label for ="war:">War(T15)</label>
    <input name="check_list[]" type="checkbox" value="T16"/>
    <label for ="adventure:">Adventure(T16)</label>
    <input name="check_list[]" type="checkbox" value="T17"/>
    <label for ="sports:">Sports(T17)</label>
    <input name="check_list[]" type="checkbox" value="T18"/>
    <label for ="novel:">Novel(T18)</label>
    <input name="check_list[]" type="checkbox" value="T19"/>
    <label for ="magic:">Magic(T19)</label><br />
    
    <input name="check_list[]" type="checkbox" value="T20"/>
    <label for ="monster:">Monster(T20)</label>
    <input name="check_list[]" type="checkbox" value="T21"/>
    <label for ="Cowboy:">Cowboy(T21)</label>
    <input name="check_list[]" type="checkbox" value="T22"/>
    <label for ="history:">History(T22)</label>
    <input name="check_list[]" type="checkbox" value="T23"/>
    <label for ="drama:">Drama(T23)</label>
    <input name="check_list[]" type="checkbox" value="T24"/>
    <label for ="ethic:">Ethic(T24)</label><br />
    
    <input name="check_list[]" type="checkbox" value="T25"/>
    <label for ="hero:">Hero(T25)</label>
    <input name="check_list[]" type="checkbox" value="T26"/>
    <label for ="Thriller:">Thriller(T26)</label>
    <input name="check_list[]" type="checkbox" value="T27"/>
    <label for ="biography:">Biography(T27)</label><br />
        
    <label >Studio:</label><br />
    <input name="check_list[]" type="checkbox" value="T28"/>
    <img src="20th_century_fox.jpg">
    <label>T28</label>
    
    <input name="check_list[]" type="checkbox" value="T29"/>
    <img src="Universal.jpg">
    <label>T29</label><br />
    <input name="check_list[]" type="checkbox" value="T30"/>
    <img src="Disney.jpg">
    <label>T29</label>
    <input name="check_list[]" type="checkbox" value="T31"/>
    <img src="Warner_Bros.jpg">
    <label>T31</label><br />
    <input name="check_list[]" type="checkbox" value="T32"/>
    <img src="Columbia.jpg">
    <label>T32</label>
    <input name="check_list[]" type="checkbox" value="T33"/>
    <img src="Paramount.jpg"><label>T33</label><br />
    <input name="check_list[]" type="checkbox" value="T34"/>
    <img src="MGM.jpg"><label>T34</label><br />
    
    <input type="submit" name="sbt" id="sbt" value="Search"/><br/>
         <a href = mainpage.php>back to main page</a>
        </form> 

<br/>
<br/>
<br/>
<br/>

    <p>
    Top 10 movie:
</p>
<?php
error_reporting(E_ERROR);
require ("config.php");
$query="SELECT POST,NAME,RANK,MOVIE_ID FROM database_project.movie ORDER BY rank DESC LIMIT 10";
$stmt= pg_prepare($dbconn,"ps",$query);
        $result=  pg_execute($dbconn,"ps" ,array());
        $moviepost1=pg_fetch_result($result,0,0);
        $moviepost2=pg_fetch_result($result,1,0);
        $moviepost3=pg_fetch_result($result,2,0);
        $moviepost4=pg_fetch_result($result,3,0);
        $moviepost5=pg_fetch_result($result,4,0);
        $moviepost6=pg_fetch_result($result,5,0);
        $moviepost7=pg_fetch_result($result,6,0);
        $moviepost8=pg_fetch_result($result,7,0);
        $moviepost9=pg_fetch_result($result,8,0);
        $moviepost10=pg_fetch_result($result,9,0);
        
        $moviename1=pg_fetch_result($result,0,1);
        $moviename2=pg_fetch_result($result,1,1);
        $moviename3=pg_fetch_result($result,2,1);
        $moviename4=pg_fetch_result($result,3,1);
        $moviename5=pg_fetch_result($result,4,1);
        $moviename6=pg_fetch_result($result,5,1);
        $moviename7=pg_fetch_result($result,6,1);
        $moviename8=pg_fetch_result($result,7,1);
        $moviename9=pg_fetch_result($result,8,1);
        $moviename10=pg_fetch_result($result,9,1);
        
        $movierank1=pg_fetch_result($result,0,2);
        $movierank2=pg_fetch_result($result,1,2);
        $movierank3=pg_fetch_result($result,2,2);
        $movierank4=pg_fetch_result($result,3,2);
        $movierank5=pg_fetch_result($result,4,2);
        $movierank6=pg_fetch_result($result,5,2);
        $movierank7=pg_fetch_result($result,6,2);
        $movierank8=pg_fetch_result($result,7,2);
        $movierank9=pg_fetch_result($result,8,2);
        $movierank10=pg_fetch_result($result,9,2);
        
        $movie_id1=pg_fetch_result($result,0,3);
        $movie_id2=pg_fetch_result($result,1,3);
        $movie_id3=pg_fetch_result($result,2,3);
        $movie_id4=pg_fetch_result($result,3,3);
        $movie_id5=pg_fetch_result($result,4,3);
        $movie_id6=pg_fetch_result($result,5,3);
        $movie_id7=pg_fetch_result($result,6,3);
        $movie_id8=pg_fetch_result($result,7,3);
        $movie_id9=pg_fetch_result($result,8,3);
        $movie_id10=pg_fetch_result($result,9,3);
        
        echo "<a href='movie.php?movie_id=$movie_id1'><img src='$moviepost1'style=\"width:200px;height:250px\"></a><br />";
        echo " $moviename1<br />";
        echo"$movierank1<br />";
        
        echo "<a href='movie.php?movie_id=$movie_id2'><img src='$moviepost2'style=\"width:200px;height:250px\"></a><br />";
        echo " $moviename2<br />";
        echo"$movierank2<br />";
        
        echo "<a href='movie.php?movie_id=$movie_id3'><img src='$moviepost3'style=\"width:200px;height:250px\"></a><br />";
        echo " $moviename3<br />";
        echo"$movierank3<br />";
        
        echo "<a href='movie.php?movie_id=$movie_id4'><img src='$moviepost4'style=\"width:200px;height:250px\"></a><br />";
        echo " $moviename4<br />";
        echo"$movierank4<br />";
        
        echo "<a href='movie.php?movie_id=$movie_id5'><img src='$moviepost5'style=\"width:200px;height:250px\"></a><br />";
        echo " $moviename5<br />";
        echo"$movierank5<br />";
        
        echo "<a href='movie.php?movie_id=$movie_id6'><img src='$moviepost6'style=\"width:200px;height:250px\"></a><br />";
        echo " $moviename6<br />";
        echo"$movierank6<br />";
        
        echo "<a href='movie.php?movie_id=$movie_id7'><img src='$moviepost7'style=\"width:200px;height:250px\"></a><br />";
        echo " $moviename7<br />";
        echo"$movierank7<br />";    
        
        echo "<a href='movie.php?movie_id=$movie_id8'><img src='$moviepost8'style=\"width:200px;height:250px\"></a><br />";
        echo " $moviename8<br />";
        echo"$movierank8<br />";
        
        echo "<a href='movie.php?movie_id=$movie_id9'><img src='$moviepost9'style=\"width:200px;height:250px\"></a><br />";
        echo " $moviename9<br />";
        echo"$movierank9<br />";   
        
        echo "<a href='movie.php?movie_id=$movie_id10'><img src='$moviepost10'style=\"width:200px;height:250px\"></a><br />";
        echo " $moviename10<br />";
        echo"$movierank10<br />";
?>
     <a href = mainpage.php>back to main page</a>
</center>