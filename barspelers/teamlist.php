<?php


// Set flag that this is a parent file
define( '_JEXEC', 1 );

define('JPATH_BASE', dirname(__FILE__) );

define( 'DS', DIRECTORY_SEPARATOR );

require_once ( JPATH_BASE .DS.'includes'.DS.'defines.php' );
require_once ( JPATH_BASE .DS.'includes'.DS.'framework.php' );

require('libraries/joomla/factory.php');

// initialize the application 
$mainframe =& JFactory::getApplication('site');
$mainframe->initialise();


$user =& JFactory::getUser();


// laat userid zien
if($user->id)
{
//echo 'userid = ';
$user_id = $user->get('id');
//echo $user_id;
//echo'<br />';

}
else
{echo 'Je bent niet (meer) ingelogd';
echo'<br />';
//do user not logged in stuff
}



















$link = mysql_connect('localhost', 'barspelers_hans', 't0maat');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
// echo 'Connected successfully';
//mysql_close($link);

//mysql_select_db("barspelers_joomla") or die(mysql_error());


// Laat naam zien
$query2 = "SELECT jos_users.name,jos_users.id FROM jos_users where jos_users.id='$user_id'";
$result2 = mysql_query($query2) or die(mysql_error());
while($row2 = mysql_fetch_array($result2)){
echo 'Hallo ';
echo $row2['name'];
echo '<br />';
$testuser=$user->get('id');

};


mysql_select_db("barspelers_joomla") or die(mysql_error());
$query3 = "SELECT jos_comprofiler.cb_teamdate as tdate,jos_comprofiler.lastupdatedate FROM jos_comprofiler where cb_team =1";
$result3 = mysql_query($query3) or die(mysql_error());
while($row3 = mysql_fetch_array($result3)){
if ($row3['tdate']==''){

mysql_query("UPDATE jos_comprofiler SET  cb_teamdate = lastupdatedate where `cb_teamdate` IS NULL AND cb_team =1 ");
}
else {
}
};

// verwijder na x weken
$dnow=strtotime(date("Y-m-d-H-i-s"));

$link = mysql_connect('localhost', 'barspelers_hans', 't0maat');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
$query3 = "SELECT jos_comprofiler.user_id as uid,jos_comprofiler.cb_teamdate as dd  FROM jos_comprofiler where cb_team =1";
//$query3 = "SELECT jos_comprofiler.cb_teamdate as tdate,jos_comprofiler.lastupdatedate FROM jos_comprofiler where cb_team =1";
$result3 = mysql_query($query3) or die(mysql_error());
while($row = mysql_fetch_array($result3)){
$weg=$row['uid'];
//echo '<br />';
$updatedate=$row['dd'];
//echo $dnow;
//echo $updatedate;
//echo '<br />';
$ddbase=strtotime($updatedate);
//echo $ddbase;
//echo $weg;
$dagverschil=($dnow-$ddbase)/ (60 * 60 * 24);

//echo '<br />';
//echo $dagverschil;
//echo '<br />';
if ($testuser == $row['testusertest'] && $dagverschil>84) {
mysql_select_db("barspelers_joomla") or die(mysql_error());
mysql_query("UPDATE jos_comprofiler SET  cb_team = '0' where user_id = $weg");
mysql_query("UPDATE jos_comprofiler SET  cb_teamdate =NULL where user_id = $weg");
}

}






$query = "SELECT jos_users.name,jos_users.id as testusertest, jos_users.email, jos_comprofiler.cb_gendergeslacht, jos_comprofiler.cb_telefoonnummer as telefoon,jos_comprofiler.lastupdatedate as udate, jos_comprofiler.cb_laatstereset as rdate FROM jos_users \n"
    . "LEFT JOIN jos_comprofiler ON jos_users.id = jos_comprofiler.user_id 
	where jos_comprofiler.cb_team=1 order by jos_comprofiler.cb_teamdate asc";

	 
$result = mysql_query($query) or die(mysql_error());


// Print out the contents of each row into a table 
echo '<table border=\"1\">';
echo '<tr><td>naam</td><td>geslacht</td><td>email</td><td>telefoon</td><td>-</td></tr>';
while($row = mysql_fetch_array($result)){
	//echo $row['name']. " - ". $row['email']." - ".$row['telefoon'];
	echo'<tr><td>';
	echo $row['name'];
	echo '</td><td>';
	//echo $row['cb_gendergeslacht'];
		if ($row['cb_gendergeslacht']=='male / man'){
		//echo 'man';
		echo '<img src="male.jpg"/>';
		}
		else
		{
		//echo 'vrouw';
		echo '<img src="female.jpg"/>';
		}
	echo '</td><td>';
	// echo $row['email'];
	echo '<a href="mailto:';
	echo $row['email'];
	echo '">';
	echo $row['email'];
	echo '</a>';
	
	echo '</td><td>';
	if ($row['telefoon']==''){
	echo ' - ';
	}{
                echo '(0)';
	echo $row['telefoon'];
}
	
// controleer of ingelogde gebruiker in lijst staat	
//    $updatedate=$row['rdate'];	
//	$dnow=strtotime(date("Y-m-d-H-i-s"));
//	$dagverschil=($dnow-$ddbase)/ (60 * 60 * 24);
//	if ($testuser == $row['testusertest'] && $dagverschil>3) {


	// controleer aantal dagen sinds laatste update van status

//	echo '</td><td>';

	// resetknopje
//echo "<form action=\"resetreserve.php\" method=\"post\">";
//echo "<input type=\"hidden\" name=\"resetid\" value=\"";
//echo "$user_id\">";
//echo "<input type=\"image\" src=\"reset.jpg\">";
//echo "</form>";
//	 }
//	 else{
//		 echo '</td><td>';
//	echo ' - ';
	//echo '</td><td>';
//	 }

	if ($testuser == $row['testusertest'] ) {
echo '</td><td>';
	// deleteknopje
echo "<form action=\"deleteteam.php\" method=\"post\">";
echo "<input type=\"hidden\" name=\"resetid\" value=\"";
echo "$user_id\">";
echo "<input type=\"image\" src=\"deletereserve.jpg\">";
echo "</form>";}
else
{   
echo '</td><td>';
	echo ' - ';}

	 echo '</td></tr>';
//	$updatedate=$row['udate'];
	// echo $updatedate;
//	$ddbase=strtotime($updatedate);
//	$dnow=strtotime(date("Y-m-d-H-i-s"));
//	$dagverschil=($dnow-$ddbase)/ (60 * 60 * 24);
//echo "<br />";
//	echo' Datum database: ';
//echo $ddbase;
//echo "<br />";
//echo' Datum nu: ';
//echo $dnow;
//echo "<br />";
//echo "verschil";
//echo $dagverschil;
//echo "<br />";


}
echo'</table>';
echo "<br />";
echo "<br />";
echo "<br />";
echo '<table border=\"1\">';
echo '<tr><td>';
echo "Druk op de pijl om je aan te melden als teamzoekende";
echo '</td><td>';

	// aanmelden invallijst
echo "<form action=\"aanmeldteam.php\" method=\"post\">";
echo "<input type=\"hidden\" name=\"resetid\" value=\"";
echo "$user_id\">";
echo "<input type=\"image\" src=\"aanmelden.jpg\">";
echo "</form>";
echo '</td></tr></table>';
?>