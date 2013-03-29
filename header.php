<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />


<?php if(get_background()!="") : ?>

<style type="text/css">
	body {
		background: <?php echo get_background(); ?>;
	}
</style>
<?php endif; ?>

<?php wp_head(); ?>
</head>

<body>
<div id="page">
<div id="centercontent">
<div id="sidebar">
	<a href="<?php bloginfo('siteurl'); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/blogside.jpg" width="100" height="700"/></a>	
</div>
<div id="container">
<div id="header">
	<ul id="nav">
	<?php wp_list_pages('title_li=&exclude=557'); ?>
	</ul>
	<?php if(is_page('archive') || is_home() || is_single()) : ?>
	<ul id="searchbox">
	<li><?php include (TEMPLATEPATH . '/searchform.php'); ?></li>
	</ul>
	<?php endif; ?>
</div>

<!--<div class="slide-out-div">
    <a class="handle" href="http://www.twitter.com/andrewjesaitis">Twitter</a>
    <?php aktt_sidebar_tweets(); ?>
</div>-->
