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

// Laat naam zien
$query2 = "SELECT jos_users.name,jos_users.id FROM jos_users where jos_users.id='$user_id'";
$result2 = mysql_query($query2) or die(mysql_error());
while($row2 = mysql_fetch_array($result2)){
echo 'Hallo ';
echo $row2['name'];
echo '<br />';
$testuser=$user->get('id');

};

// Laat telefoonnummer zien
$query2 = "SELECT jos_comprofiler.cb_telefoonnummer,jos_comprofiler.id FROM jos_comprofiler where jos_comprofiler.id='$user_id'";
$result2 = mysql_query($query2) or die(mysql_error());
while($row2 = mysql_fetch_array($result2)){
echo '<br />';
echo 'Je huidige telefoonnummer is:  ';
echo $row2['cb_telefoonnummer'];
	if ($row2['cb_telefoonnummer']==NULL){
	echo 'niet ingevuld';
	}
echo '<br />';
echo '<br />';
$testuser=$user->get('id');

};
echo'<br />';
echo'<br />';
echo'<br />';


echo "Voer je nummer in, sluit af met een [enter]:";
echo "<form id=\"form1\" name=\"form1\" method=\"post\" action=\"telefoon.php\">";
echo "<input type=\"hidden\" name=\"resetid\" value=\"";
echo "$user_id\">";    

    echo "<input type=\"text\" name=\"tel\" id=\"tel\" />";

echo"</form>";


echo'<br />';
echo'<br />';
echo'<br />';
echo "<form action=\"deletetelefoon.php\" method=\"post\">";
echo "<input type=\"hidden\" name=\"resetid\" value=\"";
echo "$user_id\">";
echo "<input type=\"image\" src=\"deletereserve.jpg\">";
echo "</form>";
echo 'Klik hier om je nummer te verwijderen.';

}
else
{echo 'Je bent niet (meer) ingelogd';
echo'<br />';
//do user not logged in stuff
}
?>