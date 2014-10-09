<?php 

//echo $_POST["resetid"]; 
$postdelete=$_POST["resetid"]; 

$link = mysql_connect('localhost', 'barspelers_hans', 't0maat');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("barspelers_joomla") or die(mysql_error());
mysql_query("UPDATE jos_comprofiler SET  cb_team = '0' where user_id = $postdelete");
mysql_query("UPDATE jos_comprofiler SET  cb_teamdate =NULL where user_id = $postdelete");

header( 'Location: http://www.barspelers.nl/teamlist.php' ) ;
?>
