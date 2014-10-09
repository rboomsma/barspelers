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

$query2 = "SELECT jos_users.name,jos_users.id FROM jos_users where jos_users.id='$user_id'";
$result2 = mysql_query($query2) or die(mysql_error());
while($row2 = mysql_fetch_array($result2)){
echo 'Hallo ';
echo $row2['name'];
//echo '<br />';
$testuser=$user->get('id');

};
$today=date("Y-m-d H:i:s");
mysql_select_db("barspelers_joomla") or die(mysql_error());
$query3 = "SELECT jos_comprofiler.cb_laatstereset as reset,jos_comprofiler.id as idd, jos_comprofiler.lastupdatedate FROM jos_comprofiler ";
$result3 = mysql_query($query3) or die(mysql_error());
while($row3 = mysql_fetch_array($result3)){
if ($row3['reset']==NULL){
$iddd= $row3['idd'];
mysql_query("UPDATE jos_comprofiler SET  cb_laatstereset = '$today' where id='$iddd'");
}
else {
}
};


if ($_GET['g'] == "M"){
$query = "SELECT jos_users.name,jos_users.id as testusertest, jos_users.email, jos_comprofiler.cb_gendergeslacht,jos_comprofiler.cb_telefoonnummer as telefoon,jos_comprofiler.lastupdatedate as udate, jos_comprofiler.cb_laatstereset as rdate FROM jos_users \n"
    . "LEFT JOIN jos_comprofiler ON jos_users.id = jos_comprofiler.user_id 
	where jos_comprofiler.cb_invallen=1 and jos_comprofiler.cb_gendergeslacht='male / man' order by jos_comprofiler.cb_laatstereset desc";
}
elseif ($_GET['g'] == "V") {
$query = "SELECT jos_users.name,jos_users.id as testusertest, jos_users.email, jos_comprofiler.cb_gendergeslacht,jos_comprofiler.cb_telefoonnummer as telefoon,jos_comprofiler.lastupdatedate as udate, jos_comprofiler.cb_laatstereset as rdate FROM jos_users \n"
    . "LEFT JOIN jos_comprofiler ON jos_users.id = jos_comprofiler.user_id 
	where jos_comprofiler.cb_invallen=1 and jos_comprofiler.cb_gendergeslacht='female /vrouw' order by jos_comprofiler.cb_laatstereset desc";
}
else {
$query = "SELECT jos_users.name,jos_users.id as testusertest, jos_users.email, jos_comprofiler.cb_gendergeslacht,jos_comprofiler.cb_telefoonnummer as telefoon,jos_comprofiler.lastupdatedate as udate, jos_comprofiler.cb_laatstereset as rdate FROM jos_users \n"
    . "LEFT JOIN jos_comprofiler ON jos_users.id = jos_comprofiler.user_id 
	where jos_comprofiler.cb_invallen=1 order by jos_comprofiler.cb_laatstereset desc";
}





	 
$result = mysql_query($query) or die(mysql_error());

?>
, hier vind je de spelers die zich als invallers hebben aangemeld. <p>- Door op M of V te klikken kun je alleen mannen of alleen vrouwen weergeven. Door op + te drukken geef je allebei weer.<br>- Door vinkjes te zetten achter de invallers en op de knop onder de tabel te klikken kan je meerdere invallers tegelijk een mail sturen.<p>
<?php
// Print out the contents of each row into a table 
echo "<form action=\"mailinvallers.php\" method=\"post\">";
echo '<table border=\"1\">';
echo '<tr><td><b>Naam</td><td><b>';
?>
<a href="<?php echo $_SERVER['PHP_SELF'] ?>?g=M">M</a> <a href="<?php echo $_SERVER['PHP_SELF'] ?>">+</a> <a href="<?php echo $_SERVER['PHP_SELF'] ?>?g=V">V</a>
<?php
//use $_GET['g'] to retrieve gender specification
echo "</td><td><b>Email</td><td><b>Telefoon</td><td>-</td><td>-</td><td><a href='".$_SERVER['PHP_SELF']."?s=yes";
if ($_GET['g']){
echo "&g=".$_GET['g'];
}
echo "'>All</a></td></tr>";

while($row = mysql_fetch_array($result)){
	//echo $row['name']. " - ". $row['email']." - ".$row['telefoon'];
	echo'<tr><td>';
	echo $row['name'];
	echo '</td><td><center>';
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
                echo'(0)';
	echo $row['telefoon'];
}
	
// controleer of ingelogde gebruiker in lijst staat	
    $updatedate=$row['rdate'];	
    $ddbase=strtotime($updatedate);
	$dnow=strtotime(date("Y-m-d-H-i-s"));
	$dagverschil=($dnow-$ddbase)/ (60 * 60 * 24);
	if ($testuser == $row['testusertest'] && $dagverschil>7) {


	// controleer aantal dagen sinds laatste update van status

	echo '</td><td>';

	// resetknopje
echo "<a href='resetreserve.php?resetid=".$user_id."'><img src='reset.jpg' border='0'></a>";
//echo "<form action=\"resetreserve.php\" method=\"post\">";
//echo "<input type=\"hidden\" name=\"resetid\" value=\"";
//echo "$user_id\">";
//echo "<input type=\"image\" src=\"reset.jpg\">";
//echo "</form>";
	 }
	 else{
		 echo '</td><td>';
	echo ' - ';
	//echo '</td><td>';
	 }

	if ($testuser == $row['testusertest'] ) {
echo '</td><td>';
	// deleteknopje
echo "<a href='deletereserve.php?resetid=".$user_id."'><img src='deletereserve.jpg' border='0'></a>";
//echo "<form action=\"deletereserve.php\" method=\"post\">";
//echo "<input type=\"hidden\" name=\"resetid\" value=\"";
//echo "$user_id\">";
//echo "<input type=\"image\" src=\"deletereserve.jpg\">";
//echo "</form>";
}
else
{   
echo '</td><td>';
	echo ' - ';}

//	 echo '</td></tr>';
// hier checkbox toevoegen
echo '</td><td>';
echo '<input type=\'checkbox\' name=\'maillist[]\' value=\'';
echo $row['email'];
if ($_GET['s']){
echo '\' checked>';
}
else {
echo '\'>';
}
echo '</td></tr>';
	$updatedate=$row['udate'];
	// echo $updatedate;
	$ddbase=strtotime($updatedate);
	$dnow=strtotime(date("Y-m-d-H-i-s"));
	$dagverschil=($dnow-$ddbase)/ (60 * 60 * 24);
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

// tabel verzend mail
echo "<br />";
echo "<br />";
echo '<table border=\"1\">';
echo '<tr><td>';
echo "Druk op de knop om een mail te sturen naar de aangevinkte spelers";
echo '</td><td>';
//check of selectie op M/V
if ($_GET['g']){
echo "<input type='hidden' name='g' value='".$_GET['g']."'>";
}
echo "<input type=\"image\" src=\"mail.jpg\">";

echo '</td></tr></table>';
echo "</form>";
//echo'</table>';

echo "<br />";


// tabel aanmelden invallijst
echo '<table border=\"1\">';
echo '<tr><td>';
echo "Druk op de pijl om je aan te melden als invaller";
echo '</td><td>';

	// aanmelden invallijst
echo "<form action=\"aanmeldinval.php\" method=\"post\">";
echo "<input type=\"hidden\" name=\"resetid\" value=\"";
echo "$user_id\">";
echo "<input type=\"image\" src=\"aanmelden.jpg\">";
echo "</form>";
echo '</td></tr></table></center>';

?>


<script type="text/javascript">
$('.chk_all').click(function(){
    var chk = $(this).attr('checked')?true:false;
    $('.chk_boxes1').attr('checked',chk);
});
</script> 