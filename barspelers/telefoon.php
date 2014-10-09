<?php 

$id= $_POST["resetid"]; 
$telefoon=$_POST["tel"]; 

$link = mysql_connect('localhost', 'barspelers_hans', 't0maat');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("barspelers_joomla") or die(mysql_error());
mysql_query("UPDATE jos_comprofiler SET  jos_comprofiler.cb_telefoonnummer = $telefoon where user_id = $id");


header( 'Location: http://www.barspelers.nl/telinvoer.php' ) ;
?>
