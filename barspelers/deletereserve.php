<?php 

//echo $_POST["resetid"]; 
$postdelete=$_GET["resetid"]; 

$link = mysql_connect('localhost', 'barspelers_hans', 't0maat');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("barspelers_joomla") or die(mysql_error());
mysql_query("UPDATE jos_comprofiler SET  cb_invallen = '0' where user_id = $postdelete");


header( 'Location: http://www.barspelers.nl/testlist3.php' ) ;
?>
