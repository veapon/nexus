<?php
require_once("include/bittorrent.php");
dbconn();
loggedinorreturn();

//签到
if ($_REQUEST['action']=="checkin")
{
    $row = mysql_fetch_array(sql_query("SELECT checkin_date,checkin_int,seedbonus FROM users WHERE id= ".$CURUSER['id']));
    if ($row['checkin_date']<>date("Ymd") )  {
        $a=mt_rand(0,50);
        sql_query("UPDATE users SET checkin_date =".date("Ymd").",checkin_int=checkin_int+1 WHERE id = ".$CURUSER['id']) or sqlerr(__FILE__, __LINE__);
        //sql_query("UPDATE users SET seedbonus = seedbonus+".$a." WHERE id = ".$CURUSER['id']) or sqlerr(__FILE__, __LINE__);
        KPS("+",$a,$CURUSER['id']);
		echo $a;
    }
    else{
        print("Don't try sql injection！");
    }

}

?>
