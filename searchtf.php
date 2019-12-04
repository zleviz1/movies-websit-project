<style>
    body{
        background-image: url("background5.jpg");
        background-size: fixed;
    }
</style>
<?php
require ("config.php");
 if(array_key_exists('stkeyword',$_POST)){
        $keyword="%".$_POST['tkeyword']."%";
$query="SELECT TRAILER FROM database_project.MOVIE WHERE NAME LIKE $1";
  $stmt=  pg_prepare($dbconn,"ps",$query);
        $result=  pg_execute($dbconn,"ps",array($keyword));
$row_count=pg_num_rows($result);
echo"<center>";
       for($i=0;$i<$row_count;$i++){
       $trailer = pg_fetch_result($result, $i, 0);
           echo "$trailer";
           echo"<br />";
       
       }if($row_count>0){
       echo"<br />";
       echo "<a href= mainpage.php>back to main page</a>";}else{
          echo" Nothing Found.<br />";
          echo "<a href= mainpage.php>back to main page</a>";
       }
 }
 echo"</center>";
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

