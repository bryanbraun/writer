<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">

<head>
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  <?php print $styles; ?>
  <?php print $scripts; ?>
  <script type="text/javascript"><?php /* Needed to avoid Flash of Unstyled Content in IE */ ?> </script>
</head>
	<body class="<?php print $body_classes; ?>">
		<div id="wrapper">
			<header class="clearfix">
				<div id="site-name">
					<a href="<?php print $front_page; ?>"><?php print $site_name; ?></a>
				</div>
				<nav>
					<?php print theme('links', $primary_links, array('class' => 'links primary-links')); ?>
				</nav>
			</header>
			<section>
				<?php if (!empty($title)): ?><h1 class="title" id="page-title"><?php print $title; ?></h1><?php endif; ?>
        		<?php if (!empty($tabs)): ?><div class="tabs"><?php print $tabs; ?></div><?php endif; ?>
        		<?php if (!empty($messages)): print $messages; endif; ?>
        		<?php if (!empty($help)): print $help; endif; ?>
        		<?php print $content_top ?>
				<article>
					<?php print $content ?>
				</article>
			</section>
			<footer>
				<div class="footer-msg"><?php print $footer_message; ?></div>
        		<?php if (!empty($footer)): print $footer; endif; ?>
        		<?php print theme('links', $secondary_links, array('class' => 'links secondary-links')); ?>
			</footer>
		</div> <!-- end wrapper -->
		<?php print $closure; ?>
	</body>
</html>