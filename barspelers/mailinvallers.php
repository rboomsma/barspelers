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

// begin hier eigen code:

// als M/V selectie gemaakt, die behouden voor terug link
if ($_POST['g']){
//echo "selectie: ".$_POST['g']."<br>";
$link = "testlist3.php?g=".$_POST['g'];
}
else {
$link = "testlist3.php";
}

// laat geselecteerde emails zien
if($_POST['maillist']){
//print_r($_POST['maillist']);
$sendto = implode(', ', $_POST['maillist']);
echo "Je hebt de volgende email adressen geselecteerd:<p>";
foreach ($_POST['maillist'] as $value) {
echo $value."<br>";
}
echo "<br><center>Druk op deze knop om bovenstaande adressen een mail te sturen<br><a href='mailto:?bcc=".$sendto."&subject=Invaller%20gezocht%20(barspelers.nl)&body=Beste%20invallers,'><img src='mail.jpg' border='0'></a>";
}
//check if maillist not filled, then say none selected
else {
echo "Je hebt geen invallers geselecteerd, ga terug en probeer het nogmaals.";
}


echo "<p><br>Klik <a href='".$link."'>hier</a> om terug te gaan naar de invallijst";

?>