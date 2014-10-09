<html>
<head></head>
<body>

<p>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
<input type="checkbox" name="maillist[]" value="1@mail.com">1@mail.com<br>
<input type="checkbox" name="maillist[]" value="2@mail.com">2@mail.com<br>
<input type="checkbox" name="maillist[]" value="3@mail.com">3@mail.com<br>
<input type="hidden" name="g" value="yes">
<input type="image" src="mail.jpg">
</form>

<?php

//echo "url: ".$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']."<p>"; 

if ($_POST['g'] == "yes") {

echo "maillist: ";
print_r($_POST['maillist']);

$sendto = implode(', ', $_POST['maillist']);
echo "<p>sendto: ".$sendto;

?>
<script>window.open("mailto:?bcc=<?php echo $sendto; ?>")</script>
<?php
}
?>

<p><br><br>
<a href="sms:+31621141755,+31641523450">Contact us by SMS 1</a><p><br>
<a href="sms:+31621141755:+31641523450">Contact us by SMS 2</a><p><br>
<a href="sms:+31621141755.+31641523450">Contact us by SMS 3</a><p><br>
<a href="sms:+31621141755;+31641523450">Contact us by SMS 4</a><p><br>
<a href="sms:+31621141755, +31641523450">Contact us by SMS 5</a><p><br>
<a href="sms:+31621141755: +31641523450">Contact us by SMS 6</a><p><br>
<a href="sms:+31621141755. +31641523450">Contact us by SMS 7</a><p><br>
<a href="sms:+31621141755; +31641523450">Contact us by SMS 8</a><p><br>


</body>
</html>

