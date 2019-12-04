<?php
//if(isset($_POST['login'])){}
  require ("config.php");
    if(array_key_exists('login',$_POST)){
        $username=$_POST['username'];
        //$password=$_POST['password'];
        $password=md5($_POST['password']);
        $query="SELECT * FROM database_project.\"USER\" WHERE USERNAME=$1 AND PASSWORD=$2";
        $stmt=  pg_prepare($dbconn,"ps",$query);
        $result=  pg_execute($dbconn,"ps",array($username,$password));
        if(!$result){
            die("Error in SQL query".pg_last_error());
        }
        $row_count=pg_num_rows($result);
        if($row_count>0){
            $pack=array($username,true);
            
            $_SESSION['username']=$username;
            $_SESSION['logged_in'][]=true;
            header("location: mainpage.php");
            exit;
        }
        header("location: loginerror.php");
        pg_free_result($result);
        pg_close($dbconn);
    }

?>

