<style>
    body{
        background-image: url("background3.jpg");
        background-size: 100% 100%;
        
    }
</style>
<title>Set Up your file</title>
<center>
<form id="loginform" name="loginfrom" method="post" action="./st.php">
    
    <label >I'm interest in(optional):</label><br />
    <input name="check_box[]" type="checkbox" value="T1"/>
    <label for ="Popular:">Popular</label>
    <input name="check_box[]" type="checkbox" value="T2"/>
    <label for ="Newest:">Newest</label>
    <input name="check_box[]" type="checkbox" value="T3"/>
    <label for ="Comedy:">Comedy</label>
    <input name="check_box[]" type="checkbox" value="T4"/>
    <label for ="Action:">Action</label>
    <input name="check_box[]" type="checkbox" value="T5"/>
    <label for ="Documentary:">Documentary</label><br />
    
    <input name="check_box[]" type="checkbox" value="T35"/>
    <label for ="Romantic:">Romantic</label>
    <input name="check_box[]" type="checkbox" value="T6"/>
    <label for ="Anime:">Anime</label>
    <input name="check_box[]" type="checkbox" value="T7"/>
    <label for ="Horror:">Horror</label>                                                               
    <input name="check_box[]" type="checkbox" value="T8"/>
    <label for ="Tragedy:">Tragedy</label>
    <input name="check_box[]" type="checkbox" value="T9"/>
    <label for ="Violence:">Violence</label><br />
    
    <input name="check_box[]" type="checkbox" value="T10"/>
    <label for ="Science_Fiction:">Science Fiction</label>
    <input name="check_box[]" type="checkbox" value="T11"/>
    <label for ="Family:">Family</label>
    <input name="check_box[]" type="checkbox" value="T12"/>
    <label for ="Crime:">Crime</label>
    <input name="check_box[]" type="checkbox" value="T13"/>
    <label for ="Musical:">Musical</label>
    <input name="check_box[]" type="checkbox" value="T14"/>
    <label for ="Suspense:">Suspense</label><br />
    
    <input name="check_box[]" type="checkbox" value="T15"/>
    <label for ="war:">War</label>
    <input name="check_box[]" type="checkbox" value="T16"/>
    <label for ="adventure:">Adventure</label>
    <input name="check_box[]" type="checkbox" value="T17"/>
    <label for ="sports:">Sports</label>
    <input name="check_box[]" type="checkbox" value="T18"/>
    <label for ="novel:">Novel</label>
    <input name="check_box[]" type="checkbox" value="T19"/>
    <label for ="magic:">Magic</label><br />
    
    <input name="check_box[]" type="checkbox" value="T20"/>
    <label for ="monster:">Monster</label>
    <input name="check_box[]" type="checkbox" value="T21"/>
    <label for ="Cowboy:">Cowboy</label>
    <input name="check_box[]" type="checkbox" value="T22"/>
    <label for ="history:">History</label>
    <input name="check_box[]" type="checkbox" value="T23"/>
    <label for ="drama:">Drama</label>
    <input name="check_box[]" type="checkbox" value="T24"/>
    <label for ="ethic:">Ethic</label><br />
    
    <input name="check_box[]" type="checkbox" value="T25"/>
    <label for ="hero:">Hero</label>
    <input name="check_box[]" type="checkbox" value="T26"/>
    <label for ="Thriller:">Thriller</label>
    <input name="check_box[]" type="checkbox" value="T27"/>
    <label for ="biography:">Biography</label><br />
        
    <label >I'm also like the movie made by(Optional):</label><br />
    <input name="check_box[]" type="checkbox" value="T28"/>
    <img src="20th_century_fox.jpg">
    <input name="check_box[]" type="checkbox" value="T29"/>
    <img src="Universal.jpg"><br />
    <input name="check_box[]" type="checkbox" value="T30"/>
    <img src="Disney.jpg">
    <input name="check_box[]" type="checkbox" value="T31"/>
    <img src="Warner_Bros.jpg"><br/>
    <input name="check_box[]" type="checkbox" value="T32"/>
    <img src="Columbia.jpg">
    <input name="check_box[]" type="checkbox" value="T33"/>
    <img src="Paramount.jpg"><br />
    <input name="check_box[]" type="checkbox" value="T34"/>
    <img src="MGM.jpg"><br />
    
    <input type="submit" name="Set_up" id="Set_up" value="Set up"/><br/>
    
        </form> 
</center>
<?php
error_reporting(E_ERROR);
session_start();
if(empty($_SESSION['logged_in']))
{
    header('Location: index.php');
    exit;
}

?>


