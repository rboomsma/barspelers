<?php
require('vertex/cms_core_functions.php');
s5_restricted_access_call();
/*
-----------------------------------------
Design Control - Shape 5 Club Design
-----------------------------------------
Site:      shape5.com
Email:     contact@shape5.com
@license:  GPL
@copyright (C) 2013 Shape 5 LLC

*/

?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" <?php s5_language_call(); ?>>
<head>
<?php s5_head_call(); ?>
<?php
require("vertex/parameters.php");
require("vertex/general_functions.php");
require("vertex/module_calcs.php");
require("vertex/includes/vertex_includes_header.php");
?>


<?php if ($browser == "ie7" || $browser == "ie8") { ?>
<link href="<?php echo $s5_directory_path ?>/css/IECSS3.css" rel="stylesheet" type="text/css"  />
<?php } ?>

<?php if(($s5_fonts_highlight != "Arial") && ($s5_fonts_highlight != "Helvetica") && ($s5_fonts_highlight != "Sans-Serif")) { ?>
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=<?php echo str_replace(" ","%20",$s5_fonts_highlight); if ($s5_fonts_highlight_style != "") { echo ":".$s5_fonts_highlight_style; } ?>" />
<?php } ?>

<style type="text/css"> 
body, .inputbox {font-family: '<?php echo $s5_fonts;?>',Helvetica,Arial,Sans-Serif ;} 

#s5_nav li.active, .button, button, .dropdown-menu li > a:hover, .dropdown-menu li > a:focus, .dropdown-submenu:hover > a, .dropdown-menu .active > a, .dropdown-menu .active > a:hover, .nav-list > .active > a, .nav-list > .active > a:hover, .nav-pills > .active > a, .nav-pills > .active > a:hover, .btn-group.open .btn-primary.dropdown-toggle, .btn-primary, .item-page .dropdown-menu li > a:hover, .blog .dropdown-menu li > a:hover, .item .dropdown-menu li > a:hover, p.readmore a, .readon_highlight1, .highlight1_button, .module_round_box-highlight1 {
background:#<?php echo $s5_highlight1; ?> !important;
}

.highlight2_button, .readon_highlight2, .pager a, .module_round_box-highlight2 {
background:#<?php echo $s5_highlight2; ?> !important;
}

p.readmore a, .readon_highlight1 {
border-bottom:solid 2px #<?php echo change_Color($s5_highlight1,'+40'); ?>;
}

.highlight1_button {
border-bottom:solid 3px #<?php echo change_Color($s5_highlight1,'+40'); ?>;
}

.highlight2_button {
border-bottom:solid 3px #<?php echo change_Color($s5_highlight2,'+40'); ?>;
}

p.readmore a:hover, .readon_highlight1:hover, .highlight1_button:hover {
background:#<?php echo change_Color($s5_highlight1,'+40'); ?> !important;
}

.highlight2_button:hover, .readon_highlight2:hover {
background:#<?php echo change_Color($s5_highlight2,'+40'); ?> !important;
}

#s5_nav li.active {
border-left:solid 1px #<?php echo $s5_highlight1; ?> !important;
border-right:solid 1px #<?php echo $s5_highlight1; ?> !important;
}

#s5_nav li.active:hover, #s5_nav li.active.mainMenuParentBtnFocused {
border-left:solid 1px #EEEDED !important;
border-right:solid 1px #FFFFFF !important;
}

a {
color:#<?php echo $s5_highlight1; ?>;
}

ul.menu .current a, .highlight1_text {
color:#<?php echo $s5_highlight1; ?> !important;
}

.highlight2_text {
color:#<?php echo $s5_highlight2; ?> !important;
}

#s5_login, #s5_register {
color:#<?php echo $s5_login_register_color; ?> !important;
}

<?php if ($s5_header_background == "yes") { ?>

	#s5_header_area1 {
		<?php if ($s5_header_background_image == "") {?>
		background:#<?php echo $s5_header_background_color; ?> !important;
		<?php } ?>
		<?php if ($s5_header_background_image != "") {
		if ($s5_header_background_image_size == "custom") { $s5_header_background_image_size = $s5_header_background_image_size_custom; }
		?>
		background-color:#<?php echo $s5_header_background_color; ?> !important;
		background-image:url(<?php echo $LiveSiteUrl; echo "images/"; echo $s5_header_background_image; ?>) !important;
		background-size: <?php echo $s5_header_background_image_size; ?> !important;
		background-attachment: <?php echo $s5_header_background_image_attachment; ?> !important;
		background-repeat:<?php echo $s5_header_background_image_repeat; ?>;
		background-position:<?php echo $s5_header_background_image_position; ?>;
		<?php } ?>
	}
	
<?php } ?>

<?php if ($s5_top_row_shadow_size != "") { ?>
#s5_top_row1_area1 {
-moz-box-shadow:0 0px <?php echo $s5_top_row_shadow_size; ?>px rgba(0, 0, 0, <?php echo $s5_top_row_shadow_opacity; ?>) inset;
-webkit-box-shadow: 0 0px <?php echo $s5_top_row_shadow_size; ?>px rgba(0, 0, 0, <?php echo $s5_top_row_shadow_opacity; ?>) inset;
box-shadow:0 0px <?php echo $s5_top_row_shadow_size; ?>px rgba(0, 0, 0, <?php echo $s5_top_row_shadow_opacity; ?>) inset;
}
<?php } ?>

<?php if ($s5_uppercase == "yes") { ?>
.btn, #s5_drop_down_text_inner, legend, label, #s5_breadcrumb_wrap, h1, h2, h3, h4, h5, .s5_mod_h3, .pagenav a, #s5_loginreg, #s5_nav li a, p.readmore a, .readon_highlight1, .readon_highlight2, .uppercase_letters, .highlight1_button, .highlight2_button {
text-transform:uppercase;
}
<?php } ?>

<?php if ($s5_small_menu == "yes") { ?>
.S5_parent_subtext {
display:none;
}
#s5_social_bar {
margin-top:11px;
}
<?php } ?>

<?php if ($s5_pos_right == "published" && $s5_pos_right_inset == "published") { ?>
#s5_right_inset_wrap .module_round_box_outer {
margin-right:15px;
}
#s5_right_wrap .module_round_box_outer {
margin-left:15px;
}
<?php } ?>	

<?php if ($s5_pos_left == "published" && $s5_pos_left_inset == "published") { ?>
#s5_left_inset_wrap .module_round_box_outer {
margin-left:15px;
}
#s5_left_wrap .module_round_box_outer {
margin-right:15px;
}
<?php } ?>	

<?php if ($s5_pos_top_row1_1 == "published" || $s5_pos_top_row1_2 == "published" || $s5_pos_top_row1_3 == "published" || $s5_pos_top_row1_4 == "published" || $s5_pos_top_row1_5 == "published" || $s5_pos_top_row1_6 == "published") { ?>
#s5_menu_wrap {
border-bottom:none;
}
<?php } ?>

<?php if ($browser == "ie7" || $browser == "ie8" || $browser == "ie9") { ?>
.s5_lr_tab_inner {writing-mode: bt-rl;filter: flipV flipH;}
<?php } ?>

<?php if($s5_thirdparty == "enabled") { ?>
/* k2 stuff */
div.itemHeader h2.itemTitle, div.catItemHeader h3.catItemTitle, h3.userItemTitle a, #comments-form p, #comments-report-form p, #comments-form span, #comments-form .counter, #comments .comment-author, #comments .author-homepage,
#comments-form p, #comments-form #comments-form-buttons, #comments-form #comments-form-error, #comments-form #comments-form-captcha-holder {font-family: '<?php echo $s5_fonts;?>',Helvetica,Arial,Sans-Serif ;} 
<?php } ?>	
.s5_wrap{width:<?php echo $s5_body_width; echo $s5_fixed_fluid ?>;}	

</style>
</head>

<body id="s5_body">

<div id="s5_scrolltotop"></div>

<!-- Top Vertex Calls -->
<?php require("vertex/includes/vertex_includes_top.php"); ?>

<!-- Body Padding Div Used For Responsive Spacing -->		
<div id="s5_body_padding">

	<!-- Header -->			
	<div id="s5_header_area1">		
	<div id="s5_header_area2">	
	<div id="s5_header_area_inner" class="s5_wrap">					
		<div id="s5_header_wrap">
			<?php if($s5_pos_logo == "published") { ?>
			<div id="s5_logo_module">
				<?php s5_module_call('logo','notitle'); ?>
			</div>	
			<?php } else { ?>
				<img alt="logo" src="<?php echo $s5_directory_path ?>/images/s5_logo.png" id="s5_logo" onclick="window.document.location.href='<?php echo $LiveSiteUrl ?>'" />
			<?php } ?>
			
			<?php if ($s5_rss  != "" || $s5_twitter  != "" || $s5_facebook  != "" || $s5_google  != "") { ?>
				<div id="s5_social_clear" style="clear:both; height:0px"></div>
				<div id="s5_social_bar_narrow_screen">
					<?php if ($s5_facebook  != "") { ?>
						<div class="s5_facebook" onclick="window.open('<?php echo $s5_facebook; ?>')"></div>
					<?php } ?>	
					<?php if ($s5_google  != "") { ?>
						<div class="s5_google" onclick="window.open('<?php echo $s5_google; ?>')"></div>
					<?php } ?>	
					<?php if ($s5_twitter  != "") { ?>
						<div class="s5_twitter" onclick="window.open('<?php echo $s5_twitter; ?>')"></div>
					<?php } ?>
					<?php if ($s5_rss  != "") { ?>
						<div class="s5_rss" onclick="window.open('<?php echo $s5_rss; ?>')"></div>
					<?php } ?>	
				</div>
			<?php } ?>
			
			<?php if ($s5_login  != "" || $s5_register  != "" || $s5_pos_search == "published") { ?>
				<div id="s5_search_login_wrap">
					<?php if ($s5_login  != "" || $s5_register  != "") { ?>	
						<div id="s5_loginreg">	
								<div id="s5_logregtm">
								
									<?php if ($s5_login  != "") { ?>
										<a href="<?php echo JRoute::_('index.php?option=com_users&view=login'); ?>" id="s5_login">
											<?php if ($s5_user_id) { echo $s5_loginout; } else { echo $s5_login; } ?>
										</a>
									<?php } ?>
								
									<?php if ($s5_user_id) { } else {?>
										<a href="<?php echo JRoute::_('index.php?option=com_users&view=registration'); ?>" id="s5_register">
											<?php echo $s5_register ?>
										</a>
									<?php } ?>

								</div>
						
						</div>
						<div style="clear:both; height:0px"></div>
					<?php } ?>
					
					<?php if ($s5_pos_search == "published") { ?>
						<div id="s5_search_wrap">
							<?php s5_module_call('search','notitle'); ?>
						</div>
					<?php } ?>
				</div>
			<?php } ?>
			
			<div style="clear:both; height:0px"></div>			
		</div>
	</div>
	</div>
	</div>
	<!-- End Header -->	
	
	<div style="clear:both; height:0px"></div>	
			
	<?php if ($s5_show_menu == "show") { ?>
		<div id="s5_menu_wrap">
		<div id="s5_menu_wrap_inner" class="s5_wrap">
		<div id="s5_menu_wrap_inner2">
			<?php include("vertex/s5flex_menu/default.php"); ?>
			<?php if ($s5_rss  != "" || $s5_twitter  != "" || $s5_facebook  != "" || $s5_google  != "") { ?>
				<div id="s5_social_bar">
					<?php if ($s5_facebook  != "") { ?>
						<div class="s5_facebook" onclick="window.open('<?php echo $s5_facebook; ?>')"></div>
					<?php } ?>	
					<?php if ($s5_google  != "") { ?>
						<div class="s5_google" onclick="window.open('<?php echo $s5_google; ?>')"></div>
					<?php } ?>	
					<?php if ($s5_twitter  != "") { ?>
						<div class="s5_twitter" onclick="window.open('<?php echo $s5_twitter; ?>')"></div>
					<?php } ?>
					<?php if ($s5_rss  != "") { ?>
						<div class="s5_rss" onclick="window.open('<?php echo $s5_rss; ?>')"></div>
					<?php } ?>
					<div style="clear:both; height:0px"></div>	
				</div>
				<div style="clear:both; height:0px"></div>	
			<?php } ?>
			<div style="clear:both; height:0px"></div>	
		</div>
		</div>
		</div>
	<?php } ?>
				

	<!-- Top Row1 -->	
		<?php if ($s5_pos_top_row1_1 == "published" || $s5_pos_top_row1_2 == "published" || $s5_pos_top_row1_3 == "published" || $s5_pos_top_row1_4 == "published" || $s5_pos_top_row1_5 == "published" || $s5_pos_top_row1_6 == "published") { ?>
			<div id="s5_top_row1_area1">
			<div id="s5_top_row1_area2">
			<div id="s5_top_row1_area_inner" class="s5_wrap">

				<div id="s5_top_row1_wrap">
					<div id="s5_top_row1">
					<div id="s5_top_row1_inner">
					
						<?php if ($s5_pos_top_row1_1 == "published") { ?>
							<div id="s5_pos_top_row1_1" class="s5_float_left" style="width:<?php echo $s5_pos_top_row1_1_width ?>%">
								<?php s5_module_call('top_row1_1','round_box'); ?>
							</div>
						<?php } ?>
						
						<?php if ($s5_pos_top_row1_2 == "published") { ?>
							<div id="s5_pos_top_row1_2" class="s5_float_left" style="width:<?php echo $s5_pos_top_row1_2_width ?>%">
								<?php s5_module_call('top_row1_2','round_box'); ?>
							</div>
						<?php } ?>
						
						<?php if ($s5_pos_top_row1_3 == "published") { ?>
							<div id="s5_pos_top_row1_3" class="s5_float_left" style="width:<?php echo $s5_pos_top_row1_3_width ?>%">
								<?php s5_module_call('top_row1_3','round_box'); ?>
							</div>
						<?php } ?>
						
						<?php if ($s5_pos_top_row1_4 == "published") { ?>
							<div id="s5_pos_top_row1_4" class="s5_float_left" style="width:<?php echo $s5_pos_top_row1_4_width ?>%">
								<?php s5_module_call('top_row1_4','round_box'); ?>
							</div>
						<?php } ?>
						
						<?php if ($s5_pos_top_row1_5 == "published") { ?>
							<div id="s5_pos_top_row1_5" class="s5_float_left" style="width:<?php echo $s5_pos_top_row1_5_width ?>%">
								<?php s5_module_call('top_row1_5','round_box'); ?>
							</div>
						<?php } ?>
						
						<?php if ($s5_pos_top_row1_6 == "published") { ?>
							<div id="s5_pos_top_row1_6" class="s5_float_left" style="width:<?php echo $s5_pos_top_row1_6_width ?>%">
								<?php s5_module_call('top_row1_6','round_box'); ?>
							</div>
						<?php } ?>
						
						<div style="clear:both; height:0px"></div>

					</div>
					</div>
				</div>

		</div>
		</div>
		</div>
		<?php } ?>
	<!-- End Top Row1 -->	
	
		
	<!-- Top Row2 -->	
		<?php if ($s5_pos_top_row2_1 == "published" || $s5_pos_top_row2_2 == "published" || $s5_pos_top_row2_3 == "published" || $s5_pos_top_row2_4 == "published" || $s5_pos_top_row2_5 == "published" || $s5_pos_top_row2_6 == "published") { ?>
		<div id="s5_top_row2_area1">
		<div id="s5_top_row2_area2">
		<div id="s5_top_row2_area_inner" class="s5_wrap">			
		
			<div id="s5_top_row2_wrap">
				<div id="s5_top_row2">
				<div id="s5_top_row2_inner">					
					<?php if ($s5_pos_top_row2_1 == "published") { ?>
						<div id="s5_pos_top_row2_1" class="s5_float_left" style="width:<?php echo $s5_pos_top_row2_1_width ?>%">
							<?php s5_module_call('top_row2_1','round_box'); ?>
						</div>
					<?php } ?>
					
					<?php if ($s5_pos_top_row2_2 == "published") { ?>
						<div id="s5_pos_top_row2_2" class="s5_float_left" style="width:<?php echo $s5_pos_top_row2_2_width ?>%">
							<?php s5_module_call('top_row2_2','round_box'); ?>
						</div>
					<?php } ?>
					
					<?php if ($s5_pos_top_row2_3 == "published") { ?>
						<div id="s5_pos_top_row2_3" class="s5_float_left" style="width:<?php echo $s5_pos_top_row2_3_width ?>%">
							<?php s5_module_call('top_row2_3','round_box'); ?>
						</div>
					<?php } ?>
					
					<?php if ($s5_pos_top_row2_4 == "published") { ?>
						<div id="s5_pos_top_row2_4" class="s5_float_left" style="width:<?php echo $s5_pos_top_row2_4_width ?>%">
							<?php s5_module_call('top_row2_4','round_box'); ?>
						</div>
					<?php } ?>
					
					<?php if ($s5_pos_top_row2_5 == "published") { ?>
						<div id="s5_pos_top_row2_5" class="s5_float_left" style="width:<?php echo $s5_pos_top_row2_5_width ?>%">
							<?php s5_module_call('top_row2_5','round_box'); ?>
						</div>
					<?php } ?>
					
					<?php if ($s5_pos_top_row2_6 == "published") { ?>
						<div id="s5_pos_top_row2_6" class="s5_float_left" style="width:<?php echo $s5_pos_top_row2_6_width ?>%">
							<?php s5_module_call('top_row2_6','round_box'); ?>
						</div>
					<?php } ?>						
					<div style="clear:both; height:0px"></div>
				</div>
				</div>	
			</div>	
				
		</div>
		</div>
		</div>
		<?php } ?>
	<!-- End Top Row2 -->
	
	
	
	<!-- Top Row3 -->	
		<?php if ($s5_pos_top_row3_1 == "published" || $s5_pos_top_row3_2 == "published" || $s5_pos_top_row3_3 == "published" || $s5_pos_top_row3_4 == "published" || $s5_pos_top_row3_5 == "published" || $s5_pos_top_row3_6 == "published") { ?>
		<div id="s5_top_row3_area1">	
		<div id="s5_top_row3_area2">
		<div id="s5_top_row3_area_inner" class="s5_wrap">
		
			<div id="s5_top_row3_wrap">
				<div id="s5_top_row3">
				<div id="s5_top_row3_inner">
				
					<?php if ($s5_pos_top_row3_1 == "published") { ?>
						<div id="s5_pos_top_row3_1" class="s5_float_left" style="width:<?php echo $s5_pos_top_row3_1_width ?>%">
							<?php s5_module_call('top_row3_1','round_box'); ?>
						</div>
					<?php } ?>
					
					<?php if ($s5_pos_top_row3_2 == "published") { ?>
						<div id="s5_pos_top_row3_2" class="s5_float_left" style="width:<?php echo $s5_pos_top_row3_2_width ?>%">
							<?php s5_module_call('top_row3_2','round_box'); ?>
						</div>
					<?php } ?>
					
					<?php if ($s5_pos_top_row3_3 == "published") { ?>
						<div id="s5_pos_top_row3_3" class="s5_float_left" style="width:<?php echo $s5_pos_top_row3_3_width ?>%">
							<?php s5_module_call('top_row3_3','round_box'); ?>
						</div>
					<?php } ?>
					
					<?php if ($s5_pos_top_row3_4 == "published") { ?>
						<div id="s5_pos_top_row3_4" class="s5_float_left" style="width:<?php echo $s5_pos_top_row3_4_width ?>%">
							<?php s5_module_call('top_row3_4','round_box'); ?>
						</div>
					<?php } ?>
					
					<?php if ($s5_pos_top_row3_5 == "published") { ?>
						<div id="s5_pos_top_row3_5" class="s5_float_left" style="width:<?php echo $s5_pos_top_row3_5_width ?>%">
							<?php s5_module_call('top_row3_5','round_box'); ?>
						</div>
					<?php } ?>
					
					<?php if ($s5_pos_top_row3_6 == "published") { ?>
						<div id="s5_pos_top_row3_6" class="s5_float_left" style="width:<?php echo $s5_pos_top_row3_6_width ?>%">
							<?php s5_module_call('top_row3_6','round_box'); ?>
						</div>
					<?php } ?>						
					<div style="clear:both; height:0px"></div>

				</div>
				</div>
			</div>

		</div>
		</div>
		</div>
		<?php } ?>
	<!-- End Top Row3 -->	
		
		
		
	<!-- Center area -->	
		<?php if ($s5_show_component == "yes" || $s5_pos_left_top == "published" || $s5_pos_left == "published" || $s5_pos_left_inset == "published" || $s5_pos_left_bottom == "published" || $s5_pos_right_top == "published" || $s5_pos_right == "published" || $s5_pos_right_inset == "published" || $s5_pos_right_bottom == "published" || $s5_pos_middle_top_1 == "published" || $s5_pos_middle_top_2 == "published" || $s5_pos_middle_top_3 == "published" || $s5_pos_middle_top_4 == "published" || $s5_pos_middle_top_5 == "published" || $s5_pos_middle_top_6 == "published" || $s5_pos_above_body_1 == "published" || $s5_pos_above_body_2 == "published" || $s5_pos_above_body_3 == "published" || $s5_pos_above_body_4 == "published" || $s5_pos_above_body_5 == "published" || $s5_pos_above_body_6 == "published" || $s5_pos_middle_bottom_1 == "published" || $s5_pos_middle_bottom_2 == "published" || $s5_pos_middle_bottom_3 == "published" || $s5_pos_middle_bottom_4 == "published" || $s5_pos_middle_bottom_5 == "published" || $s5_pos_middle_bottom_6 == "published" || $s5_pos_below_body_1 == "published" || $s5_pos_below_body_2 == "published" || $s5_pos_below_body_3 == "published" || $s5_pos_below_body_4 == "published" || $s5_pos_below_body_5 == "published" || $s5_pos_below_body_6 == "published" || $s5_pos_above_columns_1 == "published" ||  $s5_pos_above_columns_2 == "published" ||  $s5_pos_above_columns_3 == "published" ||  $s5_pos_above_columns_4 == "published" ||  $s5_pos_above_columns_5 == "published" ||  $s5_pos_above_columns_6 == "published" ||  $s5_pos_below_columns_1 == "published" ||  $s5_pos_below_columns_2 == "published" ||  $s5_pos_below_columns_3 == "published" ||  $s5_pos_below_columns_4 == "published" ||  $s5_pos_below_columns_5 == "published" ||  $s5_pos_below_columns_6 == "published") { ?>
		<div id="s5_center_area1">
		<div id="s5_center_area2">
		<div id="s5_center_area_inner" class="s5_wrap">
		
		<?php if ($s5_pos_breadcrumb == "published" || $s5_font_resizer == "yes") { ?>
		<div id="s5_breadcrumb_font_wrap">
			<?php if ($s5_pos_breadcrumb == "published") { ?>
				<div id="s5_breadcrumb_wrap">
					<?php s5_module_call('breadcrumb','notitle'); ?>
				</div>
			<?php } ?>
			
			<?php if($s5_font_resizer == "yes") { ?>
				<div id="fontControls"></div>
			<?php } ?>
			
			<div style="clear:both"></div>
		</div>
		<?php } ?>
		
		<!-- Above Columns Wrap -->	
			<?php if ($s5_pos_above_columns_1 == "published" || $s5_pos_above_columns_2 == "published" || $s5_pos_above_columns_3 == "published" || $s5_pos_above_columns_4 == "published" || $s5_pos_above_columns_5 == "published" || $s5_pos_above_columns_6 == "published") { ?>
			<div id="s5_above_columns_wrap1">	
			<div id="s5_above_columns_wrap2">
			<div id="s5_above_columns_inner" class="s5_wrap">

					
						<?php if ($s5_pos_above_columns_1 == "published") { ?>
							<div id="s5_above_columns_1" class="s5_float_left" style="width:<?php echo $s5_pos_above_columns_1_width ?>%">
								<?php s5_module_call('above_columns_1','round_box'); ?>
							</div>
						<?php } ?>
						
						<?php if ($s5_pos_above_columns_2 == "published") { ?>
							<div id="s5_above_columns_2" class="s5_float_left" style="width:<?php echo $s5_pos_above_columns_2_width ?>%">
								<?php s5_module_call('above_columns_2','round_box'); ?>
							</div>
						<?php } ?>
						
						<?php if ($s5_pos_above_columns_3 == "published") { ?>
							<div id="s5_above_columns_3" class="s5_float_left" style="width:<?php echo $s5_pos_above_columns_3_width ?>%">
								<?php s5_module_call('above_columns_3','round_box'); ?>
							</div>
						<?php } ?>
						
						<?php if ($s5_pos_above_columns_4 == "published") { ?>
							<div id="s5_above_columns_4" class="s5_float_left" style="width:<?php echo $s5_pos_above_columns_4_width ?>%">
								<?php s5_module_call('above_columns_4','round_box'); ?>
							</div>
						<?php } ?>
						
						<?php if ($s5_pos_above_columns_5 == "published") { ?>
							<div id="s5_above_columns_5" class="s5_float_left" style="width:<?php echo $s5_pos_above_columns_5_width ?>%">
								<?php s5_module_call('above_columns_5','round_box'); ?>
							</div>
						<?php } ?>
						
						<?php if ($s5_pos_above_columns_6 == "published") { ?>
							<div id="s5_above_columns_6" class="s5_float_left" style="width:<?php echo $s5_pos_above_columns_6_width ?>%">
								<?php s5_module_call('above_columns_6','round_box'); ?>
							</div>
						<?php } ?>						
						<div style="clear:both; height:0px"></div>

			</div>
			</div>
			</div>
			<?php } ?>
		<!-- End Above Columns Wrap -->			
				
			<!-- Columns wrap, contains left, right and center columns -->	
			<div id="s5_columns_wrap">
			<div id="s5_columns_wrap_inner">
				
				<div id="s5_center_column_wrap">
				<div id="s5_center_column_wrap_inner" style="margin-left:<?php echo $s5_center_column_margin_left ?>px; margin-right:<?php echo $s5_center_column_margin_right ?>px;">
					
					<?php if ($s5_pos_middle_top_1 == "published" || $s5_pos_middle_top_2 == "published" || $s5_pos_middle_top_3 == "published" || $s5_pos_middle_top_4 == "published" || $s5_pos_middle_top_5 == "published" || $s5_pos_middle_top_6 == "published") { ?>
					
						<div id="s5_middle_top_wrap">
							
							<div id="s5_middle_top">
							<div id="s5_middle_top_inner">
							
								<?php if ($s5_pos_middle_top_1 == "published") { ?>
									<div id="s5_pos_middle_top_1" class="s5_float_left" style="width:<?php echo $s5_pos_middle_top_1_width ?>%">
										<?php s5_module_call('middle_top_1','round_box'); ?>
									</div>
								<?php } ?>
								
								<?php if ($s5_pos_middle_top_2 == "published") { ?>
									<div id="s5_pos_middle_top_2" class="s5_float_left" style="width:<?php echo $s5_pos_middle_top_2_width ?>%">
										<?php s5_module_call('middle_top_2','round_box'); ?>
									</div>
								<?php } ?>
								
								<?php if ($s5_pos_middle_top_3 == "published") { ?>
									<div id="s5_pos_middle_top_3" class="s5_float_left" style="width:<?php echo $s5_pos_middle_top_3_width ?>%">
										<?php s5_module_call('middle_top_3','round_box'); ?>
									</div>
								<?php } ?>
								
								<?php if ($s5_pos_middle_top_4 == "published") { ?>
									<div id="s5_pos_middle_top_4" class="s5_float_left" style="width:<?php echo $s5_pos_middle_top_4_width ?>%">
										<?php s5_module_call('middle_top_4','round_box'); ?>
									</div>
								<?php } ?>
								
								<?php if ($s5_pos_middle_top_5 == "published") { ?>
									<div id="s5_pos_middle_top_5" class="s5_float_left" style="width:<?php echo $s5_pos_middle_top_5_width ?>%">
										<?php s5_module_call('middle_top_5','round_box'); ?>
									</div>
								<?php } ?>
								
								<?php if ($s5_pos_middle_top_6 == "published") { ?>
									<div id="s5_pos_middle_top_6" class="s5_float_left" style="width:<?php echo $s5_pos_middle_top_6_width ?>%">
										<?php s5_module_call('middle_top_6','round_box'); ?>
									</div>
								<?php } ?>						
								<div style="clear:both; height:0px"></div>

							</div>
							</div>
						
						</div>

					<?php } ?>
					
					<?php if ($s5_show_component == "yes" || $s5_pos_above_body_1 == "published" || $s5_pos_above_body_2 == "published" || $s5_pos_above_body_3 == "published" || $s5_pos_above_body_4 == "published" || $s5_pos_above_body_5 == "published" || $s5_pos_above_body_6 == "published" || $s5_pos_below_body_1 == "published" || $s5_pos_below_body_2 == "published" || $s5_pos_below_body_3 == "published" || $s5_pos_below_body_4 == "published" || $s5_pos_below_body_5 == "published" || $s5_pos_below_body_6 == "published") { ?>
						
						<div id="s5_component_wrap">
						<div id="s5_component_wrap_inner">
						
							<?php if ($s5_pos_above_body_1 == "published" || $s5_pos_above_body_2 == "published" || $s5_pos_above_body_3 == "published" || $s5_pos_above_body_4 == "published" || $s5_pos_above_body_5 == "published" || $s5_pos_above_body_6 == "published") { ?>
						
								<div id="s5_above_body_wrap">
									
									<div id="s5_above_body">
									<div id="s5_above_body_inner">
									
										<?php if ($s5_pos_above_body_1 == "published") { ?>
											<div id="s5_pos_above_body_1" class="s5_float_left" style="width:<?php echo $s5_pos_above_body_1_width ?>%">
												<?php s5_module_call('above_body_1','round_box'); ?>
											</div>
										<?php } ?>
										
										<?php if ($s5_pos_above_body_2 == "published") { ?>
											<div id="s5_pos_above_body_2" class="s5_float_left" style="width:<?php echo $s5_pos_above_body_2_width ?>%">
												<?php s5_module_call('above_body_2','round_box'); ?>
											</div>
										<?php } ?>
										
										<?php if ($s5_pos_above_body_3 == "published") { ?>
											<div id="s5_pos_above_body_3" class="s5_float_left" style="width:<?php echo $s5_pos_above_body_3_width ?>%">
												<?php s5_module_call('above_body_3','round_box'); ?>
											</div>
										<?php } ?>
										
										<?php if ($s5_pos_above_body_4 == "published") { ?>
											<div id="s5_pos_above_body_4" class="s5_float_left" style="width:<?php echo $s5_pos_above_body_4_width ?>%">
												<?php s5_module_call('above_body_4','round_box'); ?>
											</div>
										<?php } ?>
										
										<?php if ($s5_pos_above_body_5 == "published") { ?>
											<div id="s5_pos_above_body_5" class="s5_float_left" style="width:<?php echo $s5_pos_above_body_5_width ?>%">
												<?php s5_module_call('above_body_5','round_box'); ?>
											</div>
										<?php } ?>
										
										<?php if ($s5_pos_above_body_6 == "published") { ?>
											<div id="s5_pos_above_body_6" class="s5_float_left" style="width:<?php echo $s5_pos_above_body_6_width ?>%">
												<?php s5_module_call('above_body_6','round_box'); ?>
											</div>
										<?php } ?>						
										<div style="clear:both; height:0px"></div>

									</div>
									</div>
								
								</div>

							<?php } ?>
									
							<?php if ($s5_show_component == "yes") { ?>
							
								<?php s5_component_call(); ?>
								<div style="clear:both;height:0px"></div>
								
							<?php } ?>
							
							<?php if ($s5_pos_below_body_1 == "published" || $s5_pos_below_body_2 == "published" || $s5_pos_below_body_3 == "published" || $s5_pos_below_body_4 == "published" || $s5_pos_below_body_5 == "published" || $s5_pos_below_body_6 == "published") { ?>
						
								<div id="s5_below_body_wrap">			
								
									<div id="s5_below_body">
									<div id="s5_below_body_inner">
									
										<?php if ($s5_pos_below_body_1 == "published") { ?>
											<div id="s5_pos_below_body_1" class="s5_float_left" style="width:<?php echo $s5_pos_below_body_1_width ?>%">
												<?php s5_module_call('below_body_1','round_box'); ?>
											</div>
										<?php } ?>
										
										<?php if ($s5_pos_below_body_2 == "published") { ?>
											<div id="s5_pos_below_body_2" class="s5_float_left" style="width:<?php echo $s5_pos_below_body_2_width ?>%">
												<?php s5_module_call('below_body_2','round_box'); ?>
											</div>
										<?php } ?>
										
										<?php if ($s5_pos_below_body_3 == "published") { ?>
											<div id="s5_pos_below_body_3" class="s5_float_left" style="width:<?php echo $s5_pos_below_body_3_width ?>%">
												<?php s5_module_call('below_body_3','round_box'); ?>
											</div>
										<?php } ?>
										
										<?php if ($s5_pos_below_body_4 == "published") { ?>
											<div id="s5_pos_below_body_4" class="s5_float_left" style="width:<?php echo $s5_pos_below_body_4_width ?>%">
												<?php s5_module_call('below_body_4','round_box'); ?>
											</div>
										<?php } ?>
										
										<?php if ($s5_pos_below_body_5 == "published") { ?>
											<div id="s5_pos_below_body_5" class="s5_float_left" style="width:<?php echo $s5_pos_below_body_5_width ?>%">
												<?php s5_module_call('below_body_5','round_box'); ?>
											</div>
										<?php } ?>
										
										<?php if ($s5_pos_below_body_6 == "published") { ?>
											<div id="s5_pos_below_body_6" class="s5_float_left" style="width:<?php echo $s5_pos_below_body_6_width ?>%">
												<?php s5_module_call('below_body_6','round_box'); ?>
											</div>
										<?php } ?>						
										<div style="clear:both; height:0px"></div>

									</div>
									</div>
								</div>

							<?php } ?>
							
						</div>
						</div>
						
					<?php } ?>
					
					<?php if ($s5_pos_middle_bottom_1 == "published" || $s5_pos_middle_bottom_2 == "published" || $s5_pos_middle_bottom_3 == "published" || $s5_pos_middle_bottom_4 == "published" || $s5_pos_middle_bottom_5 == "published" || $s5_pos_middle_bottom_6 == "published") { ?>
					
						<div id="s5_middle_bottom_wrap">
							
							<div id="s5_middle_bottom">
							<div id="s5_middle_bottom_inner">
							
								<?php if ($s5_pos_middle_bottom_1 == "published") { ?>
									<div id="s5_pos_middle_bottom_1" class="s5_float_left" style="width:<?php echo $s5_pos_middle_bottom_1_width ?>%">
										<?php s5_module_call('middle_bottom_1','round_box'); ?>
									</div>
								<?php } ?>
								
								<?php if ($s5_pos_middle_bottom_2 == "published") { ?>
									<div id="s5_pos_middle_bottom_2" class="s5_float_left" style="width:<?php echo $s5_pos_middle_bottom_2_width ?>%">
										<?php s5_module_call('middle_bottom_2','round_box'); ?>
									</div>
								<?php } ?>
								
								<?php if ($s5_pos_middle_bottom_3 == "published") { ?>
									<div id="s5_pos_middle_bottom_3" class="s5_float_left" style="width:<?php echo $s5_pos_middle_bottom_3_width ?>%">
										<?php s5_module_call('middle_bottom_3','round_box'); ?>
									</div>
								<?php } ?>
								
								<?php if ($s5_pos_middle_bottom_4 == "published") { ?>
									<div id="s5_pos_middle_bottom_4" class="s5_float_left" style="width:<?php echo $s5_pos_middle_bottom_4_width ?>%">
										<?php s5_module_call('middle_bottom_4','round_box'); ?>
									</div>
								<?php } ?>
								
								<?php if ($s5_pos_middle_bottom_5 == "published") { ?>
									<div id="s5_pos_middle_bottom_5" class="s5_float_left" style="width:<?php echo $s5_pos_middle_bottom_5_width ?>%">
										<?php s5_module_call('middle_bottom_5','round_box'); ?>
									</div>
								<?php } ?>
								
								<?php if ($s5_pos_middle_bottom_6 == "published") { ?>
									<div id="s5_pos_middle_bottom_6" class="s5_float_left" style="width:<?php echo $s5_pos_middle_bottom_6_width ?>%">
										<?php s5_module_call('middle_bottom_6','round_box'); ?>
									</div>
								<?php } ?>						
								<div style="clear:both; height:0px"></div>

							</div>
							</div>
						
						</div>

					<?php } ?>
					
				</div>
				</div>
				<!-- Left column -->	
				<?php if($s5_pos_left == "published" || $s5_pos_left_inset == "published" || $s5_pos_left_top == "published" || $s5_pos_left_bottom == "published") { ?>
					<div id="s5_left_column_wrap" class="s5_float_left" style="width:<?php echo $s5_left_column_width ?>px">
					<div id="s5_left_column_wrap_inner">
						<?php if($s5_pos_left_top == "published") { ?>
							<div id="s5_left_top_wrap" class="s5_float_left" style="width:<?php echo $s5_left_column_width ?>px">
								<?php s5_module_call('left_top','round_box'); ?>
							</div>
						<?php } ?>
						<?php if($s5_pos_left == "published") { ?>
							<div id="s5_left_wrap" class="s5_float_left" style="width:<?php echo $s5_left_width ?>px">
								<?php s5_module_call('left','round_box'); ?>
							</div>
						<?php } ?>
						<?php if($s5_pos_left_inset == "published") { ?>
							<div id="s5_left_inset_wrap" class="s5_float_left" style="width:<?php echo $s5_left_inset_width ?>px">
								<?php s5_module_call('left_inset','round_box'); ?>
							</div>
						<?php } ?>
						<?php if($s5_pos_left_bottom == "published") { ?>
							<div id="s5_left_bottom_wrap" class="s5_float_left" style="width:<?php echo $s5_left_column_width ?>px">
								<?php s5_module_call('left_bottom','round_box'); ?>
							</div>
						<?php } ?>
					</div>
					</div>
				<?php } ?>
				<!-- End Left column -->	
				<!-- Right column -->	
				<?php if($s5_pos_right == "published" || $s5_pos_right_inset == "published" || $s5_pos_right_top == "published" || $s5_pos_right_bottom == "published") { ?>
					<div id="s5_right_column_wrap" class="s5_float_left" style="width:<?php echo $s5_right_column_width ?>px; margin-left:-<?php echo $s5_right_column_width + $s5_left_column_width ?>px">
					<div id="s5_right_column_wrap_inner">
						<?php if($s5_pos_right_top == "published") { ?>
							<div id="s5_right_top_wrap" class="s5_float_left" style="width:<?php echo $s5_right_column_width ?>px">
								<?php s5_module_call('right_top','round_box'); ?>
							</div>
						<?php } ?>
						<?php if($s5_pos_right_inset == "published") { ?>
							<div id="s5_right_inset_wrap" class="s5_float_left" style="width:<?php echo $s5_right_inset_width ?>px">
								<?php s5_module_call('right_inset','round_box'); ?>
							</div>
						<?php } ?>
						<?php if($s5_pos_right == "published") { ?>
							<div id="s5_right_wrap" class="s5_float_left" style="width:<?php echo $s5_right_width ?>px">
								<?php s5_module_call('right','round_box'); ?>
							</div>
						<?php } ?>
						<?php if($s5_pos_right_bottom == "published") { ?>
							<div id="s5_right_bottom_wrap" class="s5_float_left" style="width:<?php echo $s5_right_column_width ?>px">
								<?php s5_module_call('right_bottom','round_box'); ?>
							</div>
						<?php } ?>
					</div>
					</div>
				<?php } ?>
				<!-- End Right column -->	
			</div>
			</div>
			<!-- End columns wrap -->	
			
		<!-- Below Columns Wrap -->	
			<?php if ($s5_pos_below_columns_1 == "published" || $s5_pos_below_columns_2 == "published" || $s5_pos_below_columns_3 == "published" || $s5_pos_below_columns_4 == "published" || $s5_pos_below_columns_5 == "published" || $s5_pos_below_columns_6 == "published") { ?>
			<div id="s5_below_columns_wrap1">	
			<div id="s5_below_columns_wrap2">
			<div id="s5_below_columns_inner" class="s5_wrap">

					
						<?php if ($s5_pos_below_columns_1 == "published") { ?>
							<div id="s5_below_columns_1" class="s5_float_left" style="width:<?php echo $s5_pos_below_columns_1_width ?>%">
								<?php s5_module_call('below_columns_1','round_box'); ?>
							</div>
						<?php } ?>
						
						<?php if ($s5_pos_below_columns_2 == "published") { ?>
							<div id="s5_below_columns_2" class="s5_float_left" style="width:<?php echo $s5_pos_below_columns_2_width ?>%">
								<?php s5_module_call('below_columns_2','round_box'); ?>
							</div>
						<?php } ?>
						
						<?php if ($s5_pos_below_columns_3 == "published") { ?>
							<div id="s5_below_columns_3" class="s5_float_left" style="width:<?php echo $s5_pos_below_columns_3_width ?>%">
								<?php s5_module_call('below_columns_3','round_box'); ?>
							</div>
						<?php } ?>
						
						<?php if ($s5_pos_below_columns_4 == "published") { ?>
							<div id="s5_below_columns_4" class="s5_float_left" style="width:<?php echo $s5_pos_below_columns_4_width ?>%">
								<?php s5_module_call('below_columns_4','round_box'); ?>
							</div>
						<?php } ?>
						
						<?php if ($s5_pos_below_columns_5 == "published") { ?>
							<div id="s5_below_columns_5" class="s5_float_left" style="width:<?php echo $s5_pos_below_columns_5_width ?>%">
								<?php s5_module_call('below_columns_5','round_box'); ?>
							</div>
						<?php } ?>
						
						<?php if ($s5_pos_below_columns_6 == "published") { ?>
							<div id="s5_below_columns_6" class="s5_float_left" style="width:<?php echo $s5_pos_below_columns_6_width ?>%">
								<?php s5_module_call('below_columns_6','round_box'); ?>
							</div>
						<?php } ?>						
						<div style="clear:both; height:0px"></div>

			</div>
			</div>
			</div>
			<?php } ?>
		<!-- End Below Columns Wrap -->				
			
			
		</div>
		</div>
		</div>
		<?php } ?>
	<!-- End Center area -->	
	
	
	<!-- Bottom Row1 -->	
		<?php if ($s5_pos_bottom_row1_1 == "published" || $s5_pos_bottom_row1_2 == "published" || $s5_pos_bottom_row1_3 == "published" || $s5_pos_bottom_row1_4 == "published" || $s5_pos_bottom_row1_5 == "published" || $s5_pos_bottom_row1_6 == "published") { ?>
			<div id="s5_bottom_row1_area1">
			<div id="s5_bottom_row1_area2">
			<div id="s5_bottom_row1_area_inner" class="s5_wrap">

				<div id="s5_bottom_row1_wrap">
					<div id="s5_bottom_row1">
					<div id="s5_bottom_row1_inner">
					
						<?php if ($s5_pos_bottom_row1_1 == "published") { ?>
							<div id="s5_pos_bottom_row1_1" class="s5_float_left" style="width:<?php echo $s5_pos_bottom_row1_1_width ?>%">
								<?php s5_module_call('bottom_row1_1','round_box'); ?>
							</div>
						<?php } ?>
						
						<?php if ($s5_pos_bottom_row1_2 == "published") { ?>
							<div id="s5_pos_bottom_row1_2" class="s5_float_left" style="width:<?php echo $s5_pos_bottom_row1_2_width ?>%">
								<?php s5_module_call('bottom_row1_2','round_box'); ?>
							</div>
						<?php } ?>
						
						<?php if ($s5_pos_bottom_row1_3 == "published") { ?>
							<div id="s5_pos_bottom_row1_3" class="s5_float_left" style="width:<?php echo $s5_pos_bottom_row1_3_width ?>%">
								<?php s5_module_call('bottom_row1_3','round_box'); ?>
							</div>
						<?php } ?>
						
						<?php if ($s5_pos_bottom_row1_4 == "published") { ?>
							<div id="s5_pos_bottom_row1_4" class="s5_float_left" style="width:<?php echo $s5_pos_bottom_row1_4_width ?>%">
								<?php s5_module_call('bottom_row1_4','round_box'); ?>
							</div>
						<?php } ?>
						
						<?php if ($s5_pos_bottom_row1_5 == "published") { ?>
							<div id="s5_pos_bottom_row1_5" class="s5_float_left" style="width:<?php echo $s5_pos_bottom_row1_5_width ?>%">
								<?php s5_module_call('bottom_row1_5','round_box'); ?>
							</div>
						<?php } ?>
						
						<?php if ($s5_pos_bottom_row1_6 == "published") { ?>
							<div id="s5_pos_bottom_row1_6" class="s5_float_left" style="width:<?php echo $s5_pos_bottom_row1_6_width ?>%">
								<?php s5_module_call('bottom_row1_6','round_box'); ?>
							</div>
						<?php } ?>
						
						<div style="clear:both; height:0px"></div>

					</div>
					</div>
				</div>

		</div>
		</div>
		</div>
		<?php } ?>
	<!-- End Bottom Row1 -->	
		
		
	<!-- Bottom Row2 -->	
		<?php if ($s5_pos_bottom_row2_1 == "published" || $s5_pos_bottom_row2_2 == "published" || $s5_pos_bottom_row2_3 == "published" || $s5_pos_bottom_row2_4 == "published" || $s5_pos_bottom_row2_5 == "published" || $s5_pos_bottom_row2_6 == "published") { ?>
		<div id="s5_bottom_row2_area1">
		<div id="s5_bottom_row2_area2">
		<div id="s5_bottom_row2_area_inner" class="s5_wrap">			
		
			<div id="s5_bottom_row2_wrap">
				<div id="s5_bottom_row2">
				<div id="s5_bottom_row2_inner">					
					<?php if ($s5_pos_bottom_row2_1 == "published") { ?>
						<div id="s5_pos_bottom_row2_1" class="s5_float_left" style="width:<?php echo $s5_pos_bottom_row2_1_width ?>%">
							<?php s5_module_call('bottom_row2_1','round_box'); ?>
						</div>
					<?php } ?>
					
					<?php if ($s5_pos_bottom_row2_2 == "published") { ?>
						<div id="s5_pos_bottom_row2_2" class="s5_float_left" style="width:<?php echo $s5_pos_bottom_row2_2_width ?>%">
							<?php s5_module_call('bottom_row2_2','round_box'); ?>
						</div>
					<?php } ?>
					
					<?php if ($s5_pos_bottom_row2_3 == "published") { ?>
						<div id="s5_pos_bottom_row2_3" class="s5_float_left" style="width:<?php echo $s5_pos_bottom_row2_3_width ?>%">
							<?php s5_module_call('bottom_row2_3','round_box'); ?>
						</div>
					<?php } ?>
					
					<?php if ($s5_pos_bottom_row2_4 == "published") { ?>
						<div id="s5_pos_bottom_row2_4" class="s5_float_left" style="width:<?php echo $s5_pos_bottom_row2_4_width ?>%">
							<?php s5_module_call('bottom_row2_4','round_box'); ?>
						</div>
					<?php } ?>
					
					<?php if ($s5_pos_bottom_row2_5 == "published") { ?>
						<div id="s5_pos_bottom_row2_5" class="s5_float_left" style="width:<?php echo $s5_pos_bottom_row2_5_width ?>%">
							<?php s5_module_call('bottom_row2_5','round_box'); ?>
						</div>
					<?php } ?>
					
					<?php if ($s5_pos_bottom_row2_6 == "published") { ?>
						<div id="s5_pos_bottom_row2_6" class="s5_float_left" style="width:<?php echo $s5_pos_bottom_row2_6_width ?>%">
							<?php s5_module_call('bottom_row2_6','round_box'); ?>
						</div>
					<?php } ?>						
					<div style="clear:both; height:0px"></div>
				</div>
				</div>	
			</div>	
				
		</div>
		</div>
		</div>
		<?php } ?>
	<!-- End Bottom Row2 -->

	
	<!-- Bottom Row3 -->	
		<?php if ($s5_pos_bottom_row3_1 == "published" || $s5_pos_bottom_row3_2 == "published" || $s5_pos_bottom_row3_3 == "published" || $s5_pos_bottom_row3_4 == "published" || $s5_pos_bottom_row3_5 == "published" || $s5_pos_bottom_row3_6 == "published") { ?>
		<div id="s5_bottom_row3_area1">	
		<div id="s5_bottom_row3_area2">
		<div id="s5_bottom_row3_area_inner" class="s5_wrap">
		
			<div id="s5_bottom_row3_wrap">
				<div id="s5_bottom_row3">
				<div id="s5_bottom_row3_inner">
				
					<?php if ($s5_pos_bottom_row3_1 == "published") { ?>
						<div id="s5_pos_bottom_row3_1" class="s5_float_left" style="width:<?php echo $s5_pos_bottom_row3_1_width ?>%">
							<?php s5_module_call('bottom_row3_1','round_box'); ?>
						</div>
					<?php } ?>
					
					<?php if ($s5_pos_bottom_row3_2 == "published") { ?>
						<div id="s5_pos_bottom_row3_2" class="s5_float_left" style="width:<?php echo $s5_pos_bottom_row3_2_width ?>%">
							<?php s5_module_call('bottom_row3_2','round_box'); ?>
						</div>
					<?php } ?>
					
					<?php if ($s5_pos_bottom_row3_3 == "published") { ?>
						<div id="s5_pos_bottom_row3_3" class="s5_float_left" style="width:<?php echo $s5_pos_bottom_row3_3_width ?>%">
							<?php s5_module_call('bottom_row3_3','round_box'); ?>
						</div>
					<?php } ?>
					
					<?php if ($s5_pos_bottom_row3_4 == "published") { ?>
						<div id="s5_pos_bottom_row3_4" class="s5_float_left" style="width:<?php echo $s5_pos_bottom_row3_4_width ?>%">
							<?php s5_module_call('bottom_row3_4','round_box'); ?>
						</div>
					<?php } ?>
					
					<?php if ($s5_pos_bottom_row3_5 == "published") { ?>
						<div id="s5_pos_bottom_row3_5" class="s5_float_left" style="width:<?php echo $s5_pos_bottom_row3_5_width ?>%">
							<?php s5_module_call('bottom_row3_5','round_box'); ?>
						</div>
					<?php } ?>
					
					<?php if ($s5_pos_bottom_row3_6 == "published") { ?>
						<div id="s5_pos_bottom_row3_6" class="s5_float_left" style="width:<?php echo $s5_pos_bottom_row3_6_width ?>%">
							<?php s5_module_call('bottom_row3_6','round_box'); ?>
						</div>
					<?php } ?>						
					<div style="clear:both; height:0px"></div>

				</div>
				</div>
			</div>

		</div>
		</div>
		</div>
		<?php } ?>
	<!-- End Bottom Row3 -->
	
	
	<!-- Footer Area -->
		<div id="s5_footer_area1">
		<div id="s5_footer_area2">
		<div id="s5_footer_area_inner" class="s5_wrap">
		<div id="s5_footer_area_inner2">
				
			<div id="s5_footer_menu_wrap">
				<?php if($s5_pos_footer == "published") { ?>
					<div id="s5_footer_module">
						<?php s5_module_call('footer','notitle'); ?>
					</div>	
				<?php } else { ?>
					<div id="s5_footer">
						<?php require("vertex/footer.php"); ?>
					</div>
				<?php } ?>
				
				<?php if($s5_pos_bottom_menu) { ?>
					<div id="s5_bottom_menu_wrap">
						<?php s5_module_call('bottom_menu','notitle'); ?>
					</div>	
				<?php } ?>
				<div style="clear:both; height:0px"></div>
			</div>
			
			<a title="Shape5.com Professional Joomla Templates and Wordpress Themes" href="http://www.shape5.com" target="blank" id="s5_shape5_logo"></a>
			
			<div style="clear:both; height:0px"></div>
			
		</div>
		</div>
		</div>
		</div>
	<!-- End Footer Area -->
	
	<?php s5_module_call('debug','round_box'); ?>
	
	<!-- Bottom Vertex Calls -->
	<?php require("vertex/includes/vertex_includes_bottom.php"); ?>
	
</div>
<!-- End Body Padding -->

</body>
</html>