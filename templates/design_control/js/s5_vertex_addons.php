<script type="text/javascript">

<?php if ($s5_login_url != "") { ?>
jQuery(document).ready( function() {	
	function s5_login_url() {		
		window.location = "<?php echo $s5_login_url; ?>";	
	}	
	if (document.getElementById("s5_login")) {	
	document.getElementById("s5_login").className = "";	
	document.getElementById("s5_login").onclick = s5_login_url;	
	if (document.getElementById("s5_login").href) {		
		document.getElementById("s5_login").href = "javascript:;";	
	}	
	}
});
<?php } ?>

<?php if ($s5_register_url != "") { ?>
jQuery(document).ready( function() {	
	function s5_register_url() {		
		window.location = "<?php echo $s5_register_url; ?>";	
	}	
	if (document.getElementById("s5_register")) {	
	document.getElementById("s5_register").className = "";	
	document.getElementById("s5_register").onclick = s5_register_url;	
	if (document.getElementById("s5_register").href) {		
		document.getElementById("s5_register").href = "javascript:;";	
	}	
	}
});
<?php } ?>	

<?php if ($s5_menudetach  == "yes" && $s5_show_menu == "show") { ?>	
	<?php if ($browser == "ie9") { ?>function s5_fm_load_check_scroll_height() { <?php } ?>	
	<?php if ($browser != "ie9") { ?>jQuery(document).ready( function() { <?php } ?>			
		if (window.addEventListener) {
			window.addEventListener('scroll', s5_fm_check_scroll_height, false);
		}			
		else if (window.attachEvent) {
			window.attachEvent('onscroll', s5_fm_check_scroll_height);
		}			
			window.setTimeout(s5_fm_check_scroll_height,100);		
		}	
	<?php if ($browser != "ie9") { ?>);<?php } ?>	
	function s5_fm_check_scroll_height() {			
	<?php if ($s5_fmenuslidein  == "yes") { ?>		
		if (window.pageYOffset >= (<?php echo $s5_initialmenufloat; ?> - document.getElementById("s5_menu_wrap").offsetHeight)){		
			document.getElementById("s5_menu_wrap").style.top = "-500px";} 
		else {
			document.getElementById("s5_menu_wrap").style.top = "0px";
		}		
	<?php } ?>			
	if (window.pageYOffset >= <?php echo $s5_initialmenufloat; ?>){			
		<?php if ($s5_fmenufullwidth  == "yes") { ?>document.getElementById("s5_menu_wrap").className = 's5_wrap_fmfullwidth';			
		<?php } else {?>document.getElementById("s5_menu_wrap").className = 's5_wrap';			
		<?php } ?>
		document.getElementById("subMenusContainer").className = 'subMenusContainer';			
		document.getElementById("s5_floating_menu_spacer").style.height = document.getElementById("s5_menu_wrap").offsetHeight + "px";			
		if (document.getElementById("s5_menu_wrap").parentNode.offsetHeight >= document.getElementById("s5_menu_wrap").offsetHeight - 20 && document.getElementById("s5_menu_wrap").parentNode.parentNode.offsetHeight >= document.getElementById("s5_menu_wrap").	offsetHeight - 20 && document.getElementById("s5_menu_wrap").parentNode.style.position != "absolute" && document.getElementById("s5_menu_wrap").parentNode.parentNode.style.position != "absolute") {			
			document.getElementById("s5_floating_menu_spacer").style.display = "block";			
		}			
	}		
	else { 			
		document.getElementById("s5_menu_wrap").className = '';	document.getElementById("subMenusContainer").className = ''; 			
		document.getElementById("s5_floating_menu_spacer").style.display = "none";			
	}		
	}	
	<?php if ($browser == "ie9") { ?>window.setTimeout(s5_fm_load_check_scroll_height,1000);<?php } ?>
<?php } ?>	
</script>