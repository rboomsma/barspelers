<?php

/**
 * 
 * icuetheme
 * @license 
 * @version 
 * */
 
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
JHtml::_('jquery.framework');


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
<head>


<script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <jdoc:include type="head" />
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/system.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/general.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/media/jui/css/bootstrap.min.css" type="text/css" />
	<!--TODO descargar estas librerias-->
	<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

    <?php if ($this->direction == 'rtl') { ?>
		<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/default_rtl.css" type="text/css" />
                <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/template_rtl.css" type="text/css" />
    <?php } else { ?>
		<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/default.css" type="text/css" />
                <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/template.css" type="text/css" />
	<?php } ?>
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/fonts/fonts.css" type="text/css" />
    <?php if ($this->params->get('useresponsive','1')) { ?>
        <meta name="viewport" content="width=device-width; initial-scale=1.0" />
        <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/mobile.css" type="text/css" />
    <?php } ?>
    
<?php
$nbmodules8 = 0;
if ($this->countModules('top-module-1'))  $nbmodules8++;
if ($this->countModules('top-module-2'))  $nbmodules8++;
if ($this->countModules('top-module-3'))  $nbmodules8++;
if ($this->countModules('top-module-4'))  $nbmodules8++;
if ($nbmodules8 == 1) $modulesclasse8 = 'full';
if ($nbmodules8 == 2) $modulesclasse8 = 'demi';
if ($nbmodules8 == 3) $modulesclasse8 = 'tiers';
if ($nbmodules8 == 4) $modulesclasse8 = 'quart';
?>

<?php
$componentwidth = 100;
if ($this->countModules('left')) { $componentwidth = 100-20;}
if ($this->countModules('right')) { $componentwidth = $componentwidth-20;}
?>

<?php
$nbmodules17 = 0;
if ($this->countModules('middle-module-1'))  $nbmodules17++;
if ($this->countModules('middle-module-2'))  $nbmodules17++;
if ($this->countModules('middle-module-3'))  $nbmodules17++;
if ($this->countModules('middle-module-4'))  $nbmodules17++;
if ($nbmodules17 == 1) $modulesclasse17 = 'full';
if ($nbmodules17 == 2) $modulesclasse17 = 'demi';
if ($nbmodules17 == 3) $modulesclasse17 = 'tiers';
if ($nbmodules17 == 4) $modulesclasse17 = 'quart';
?>

<?php
$nbmodules23 = 0;
if ($this->countModules('footer-module-1'))  $nbmodules23++;
if ($this->countModules('footer-module-2'))  $nbmodules23++;
if ($this->countModules('footer-module-3'))  $nbmodules23++;
if ($this->countModules('footer-module-4'))  $nbmodules23++;
if ($nbmodules23 == 1) $modulesclasse23 = 'full';
if ($nbmodules23 == 2) $modulesclasse23 = 'demi';
if ($nbmodules23 == 3) $modulesclasse23 = 'tiers';
if ($nbmodules23 == 4) $modulesclasse23 = 'quart';
?>
</head>

<body>
<div id="wrapper">
    <div id="topwrapper" >
	<div id="mainbanner">
	<div id="logosearchwrapper">
		<div id="logo" class="logobloc" style="width:286px;">
			<?php if ($this->params->get('logolink')) { ?>
			<a href="<?php echo htmlspecialchars($this->params->get('logolink')); ?>">
			<?php } ?>
				<img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/logo.png" width="262px" alt="<?php echo htmlspecialchars($this->params->get('logotitle'));?>" />
			<?php if ($this->params->get('logolink')) { ?>
			</a>
			<?php } ?>
			<?php if ($this->params->get('logodescription')) { ?>
			<div id="logodesc"><?php echo htmlspecialchars($this->params->get('logodescription'));?></div>
			<?php } ?>
		</div>
		<?php if ($this->countModules('search')) : ?>
		<div id="banner" class="logobloc" style="width:400px;">
				<jdoc:include type="modules" name="search" style="xhtml" />
		</div>
		<?php endif; ?>
		<div class="clr"></div>
	 </div>
	</div>
	<?php if ($this->countModules('top-menu')) : ?>
	<div id="nav" class="animated  flipInY ">
	   <div id="topnavwrapper">
		<jdoc:include type="modules" name="top-menu" />
	  </div>
	</div>
	<div class="clr"></div>
	<?php endif; ?>

	<?php if ($this->countModules('slideshow')) : ?>
	<div id="slideshow">
		<jdoc:include type="modules" name="slideshow" style="xhtml" />
	</div>
	<div class="clr"></div>
	<?php endif; ?>
	</div>

	<?php if ($nbmodules8 > 0) : ?>
	<div id="modulestop">
		<div id="modulestopwrapper">
		<div class="inner">
			<?php if ($this->countModules('top-module-1')) : ?>
			<div id="moduletop1" class="flexiblemodule <?php echo $modulesclasse8; ?> ">
				<div class="inner">
					<jdoc:include type="modules" name="top-module-1" style="xhtml" />
				</div>
			</div>
			<?php endif; ?>
			<?php if ($this->countModules('top-module-2')) : ?>
			<div id="moduletop2" class="flexiblemodule <?php echo $modulesclasse8; ?> ">
				<div class="inner">
					<jdoc:include type="modules" name="top-module-2" style="xhtml" />
				</div>
			</div>
			<?php endif; ?>
			<?php if ($this->countModules('top-module-3')) : ?>
			<div id="moduletop3" class="flexiblemodule <?php echo $modulesclasse8; ?> ">
				<div class="inner">
					<jdoc:include type="modules" name="top-module-3" style="xhtml" />
				</div>
			</div>
			<?php endif; ?>
			<?php if ($this->countModules('top-module-4')) : ?>
			<div id="moduletop4" class="flexiblemodule <?php echo $modulesclasse8; ?> ">
				<div class="inner">
					<jdoc:include type="modules" name="top-module-4" style="xhtml" />
				</div>
			</div>
			<?php endif; ?>
			<div class="clr"></div>
		</div>
	  </div>
	</div>

	<?php endif; ?>

	<div id="main" >
	<div id="mainwrapper">
		<?php if ($this->countModules('left')) : ?>
		<div id="left" class="column column1 " style="width:200px">
			<div class="inner">
				<jdoc:include type="modules" name="left" style="xhtml" />
			</div>
		</div>
		<?php endif; ?>
		<div id="center" class="column center " style="width:<?php echo $componentwidth; ?>%">
			<div class="inner">
				<jdoc:include type="message" />
			<jdoc:include type="component" />
			</div>
		</div>
		<?php if ($this->countModules('right')) : ?>
		<div id="right" class="column column2 " style="width:200px">
			<div class="inner">
				<jdoc:include type="modules" name="right" style="xhtml" />
			</div>
		</div>
		<?php endif; ?>
		
		<div class="clr"></div>
	</div>
    </div>
	<?php if ($nbmodules17 > 0) : ?>
	<div id="modulesbottom">
	<div id="modulesbottomwrapper">
	
		<div class="inner">
			<?php if ($this->countModules('middle-module-1')) : ?>
			<div id="modulebottom1" class="flexiblemodule <?php echo $modulesclasse17; ?> ">
				<div class="inner">
					<jdoc:include type="modules" name="middle-module-1" style="xhtml" />
				</div>
			</div>
			<?php endif; ?>
			<?php if ($this->countModules('middle-module-2')) : ?>
			<div id="modulebottom2" class="flexiblemodule <?php echo $modulesclasse17; ?> ">
				<div class="inner">
					<jdoc:include type="modules" name="middle-module-2" style="xhtml" />
				</div>
			</div>
			<?php endif; ?>
			<?php if ($this->countModules('middle-module-3')) : ?>
			<div id="modulebottom3" class="flexiblemodule <?php echo $modulesclasse17; ?> ">
				<div class="inner">
					<jdoc:include type="modules" name="middle-module-3" style="xhtml" />
				</div>
			</div>
			<?php endif; ?>
			<?php if ($this->countModules('middle-module-4')) : ?>
			<div id="modulebottom4" class="flexiblemodule <?php echo $modulesclasse17; ?> ">
				<div class="inner">
					<jdoc:include type="modules" name="middle-module-4" style="xhtml" />
				</div>
			</div>
			<?php endif; ?>
			<div class="clr"></div>
	
		</div>
	  </div>
	</div>
	<?php endif; ?>

	<?php if ($this->countModules('footer-top')) : ?>
	<div id="top-footer">

		<jdoc:include type="modules" name="footer-top" style="xhtml" />

	</div>
	<div class="clr"></div>
	<?php endif; ?>

	<?php if ($nbmodules23 > 0) : ?>
	<div id="modules">
		<div class="inner">
		<div id="moduleswrapper">
			<?php if ($this->countModules('footer-module-1')) : ?>
			<div id="module1" class="flexiblemodule <?php echo $modulesclasse23; ?> ">
				<div class="inner">
					<jdoc:include type="modules" name="footer-module-1" style="xhtml" />
				</div>
			</div>
			<?php endif; ?>
			<?php if ($this->countModules('footer-module-2')) : ?>
			<div id="module2" class="flexiblemodule <?php echo $modulesclasse23; ?> ">
				<div class="inner">
					<jdoc:include type="modules" name="footer-module-2" style="xhtml" />
				</div>
			</div>
			<?php endif; ?>
			<?php if ($this->countModules('footer-module-3')) : ?>
			<div id="module3" class="flexiblemodule <?php echo $modulesclasse23; ?> ">
				<div class="inner">
					<jdoc:include type="modules" name="footer-module-3" style="xhtml" />
				</div>
			</div>
			<?php endif; ?>
			<?php if ($this->countModules('footer-module-4')) : ?>
			<div id="module4" class="flexiblemodule <?php echo $modulesclasse23; ?> ">
				<div class="inner">
					<jdoc:include type="modules" name="footer-module-4" style="xhtml" />
				</div>
			</div>
			<?php endif; ?>
			<div class="clr"></div>
		</div>
	</div>
	</div>
	<?php endif; ?>
	
	<?php if ($this->countModules('bottom-menu')) : ?>
   
	<div id="nav" class="navbottom">
	<div id="footernavwrapper">
		<jdoc:include type="modules" name="bottom-menu" />
	</div>
	</div>
	<div class="clr"></div>
	<?php endif; ?>
</div>
<div style="background-color:#1c1c1c; text-align:center; color:#808080; text-transform: lowercase; font-size:0.8em;">Designed by <a style="color:#808080" href="http://www.icuenet.com">Icuenet</a></div>

<jdoc:include type="modules" name="debug" />

	 <script type="text/javascript">


	$(".parent").click(function() {
		var display = $(this).find("ul" ).css( "display" );
			if (display=="none") {
				$(this).find("ul" ).css('display', 'block');
			} else {
				$(this).find("ul" ).css('display', 'none');
	 }
		});
		
	</script>
</body>
</html>
