<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>">

<head>
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  <?php print $styles; ?>
  <?php print $scripts; ?>
  <link href='http://fonts.googleapis.com/css?family=Merriweather:400italic,400,700|Lato|Inconsolata' rel='stylesheet' type='text/css'>
  <script type="text/javascript"><?php /* Needed to avoid Flash of Unstyled Content in IE */ ?> </script>
</head>
  <body class="<?php print $body_classes; ?>">
	<div id="wrapper">
	  <?php print $pre_header; ?>
	  <header>
	  	<div class="head-wrap clearfix">
		  <div id="site-name">
		    <a href="<?php print $front_page; ?>"><?php print $site_name; ?></a>
		  </div>
		  <nav>
		    <?php print theme('links', $primary_links, array('class' => 'links primary-links')); ?>
		  </nav>
		</div>
		<?php print $header; ?>
	  </header>
	  <?php print $post_header; ?>
	  <section>
	    <?php if (!empty($title)): ?><h1 class="title" id="page-title"><?php print $title; ?></h1><?php endif; ?>
        <?php if (!empty($tabs)): ?><div class="tabs"><?php print $tabs; ?></div><?php endif; ?>
        <?php if (!empty($messages)): print $messages; endif; ?>
        <?php if (!empty($help)): print $help; endif; ?>
        <?php print $content_top; ?>
		<?php print $content; ?>
		<?php print $content_bottom; ?>
	  </section>
	  <footer>
	  	<?php print $footer_top; ?>
	  	  <?php if($footer_left || $footer_right): ?>
	  	    <div class="foot-mid-wrap clearfix">
			  <?php if($footer_left): ?>
			    <div id="footer_left">
			      <?php print $footer_left; ?>
				</div>
			  <?php endif; ?>
			  <?php if($footer_right): ?>
				<div id="footer_right">
				  <?php print $footer_right; ?>
				</div>
			  <?php endif; ?>
	  		</div>
	  	  <?php endif; ?>
	  	<?php print $footer_bottom; ?>
	  	<div class="foot-wrap clearfix">
			<div class="footer-msg">
				<?php print $footer_message; ?>
			</div>
        	<div class="foot-links">
        		<?php print theme('links', $secondary_links, array('class' => 'links secondary-links')); ?>
        	</div>
        </div>
	  </footer>
	</div> <!-- end wrapper -->
	<?php print $closure; ?>
  </body>
</html>