<?php 

//echo $_POST["resetid"]; 
$postreset=$_GET["resetid"]; 
$today2=getdate();
$today=date("Y-m-d H:i:s");
$link = mysql_connect('localhost', 'barspelers_hans', 't0maat');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("barspelers_joomla") or die(mysql_error());
mysql_query("UPDATE jos_comprofiler SET  cb_laatstereset = '$today' where user_id = $postreset");
// " 
//echo $today;
//echo $postreset;

header( 'Location: http://www.barspelers.nl/testlist3.php' ) ;
?>
