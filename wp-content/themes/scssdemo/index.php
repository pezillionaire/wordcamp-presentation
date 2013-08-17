<?php 
	$twitter = get_theme_mod( 'twitter_setting' );
	$popular = get_theme_mod( 'popular_setting' );
	$about = get_theme_mod( 'abtp_setting' );
	$ga = get_theme_mod( 'ga_setting' );
	$cmmnt = get_theme_mod( 'comment_setting' );
	$attrb = get_theme_mod( 'attrib_setting' );
	$cc = get_theme_mod( 'ccolour_setting' );
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>
	
	<head>
		<title><?php if (is_home () ) { bloginfo('name'); echo ' | '; bloginfo('description'); } elseif ( is_category() ) { single_cat_title(); echo ' | ' ; bloginfo('name'); } elseif (is_single() ) { single_post_title(); echo ' | '; bloginfo('name'); } elseif (is_page() ) { single_post_title(); echo ' | '; bloginfo('name'); } else { wp_title('',true); echo ' | '; bloginfo('name'); } ?></title>

		<meta charset="UTF-8">
		
		<?php if (is_home ()) { ?>
		<meta name="description" content="<?php bloginfo('description'); ?>">	
		<?php } else { ?>
		<meta name="description" content="<?php $excerpt = strip_tags(get_the_excerpt()); echo $excerpt; ?>">
		<?php } ?>
		
			
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta http-equiv="x-ua-compatible" content="ie=edge,chrome=1">
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo_rss('name'); ?>" href="<?php bloginfo_rss('atom_url') ?>">
		
		<?php wp_head(); ?>

		<!--[if IE]>
		<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		
	</head>
	
	
	
	
	<body <?php body_class(); ?>>
		<div id="container">
			<div id="navwrap">
				
				<a href="#" class="toggle" id="x" data-target="#navwrap">Close&nbsp;&#215;</a>
				
				<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<input type="text" class="field" name="s" id="s" placeholder="<?php esc_attr_e( 'Search', 'pjrvs' ); ?>" />
				</form>

				<nav id="postnav">

					<h4>Pages</h4>
					<ul><?php wp_list_pages('title_li='); ?></ul>

					<h4>Recent Posts</h4>
					<ul>
						<?php wp_reset_query(); query_posts('showposts=3'); if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
						<?php endwhile; else: endif; wp_reset_query(); ?>
					</ul>

				</nav>


			</div><!-- navwrap -->

			<div id="page">
				
				<header>
					<div class="title">
						<a href="<?php echo home_url(); ?>" class="logo">
							<img src="<?php bloginfo('template_directory'); ?>/imgs/logo.png" alt="logo" />
						</a>
					
						<span class='description'><?php bloginfo('description'); ?></span>
					</div>
					<a href="#" class="toggle" id="hamburger" data-target="#navwrap">Menu&nbsp;&#9776;</a>
				</header>

				<section>
					<?php if(is_404()) { ?>
					<article>
						<h2>Sorry, but nothing exists here.</h2>
						<p>Find something <a href="<?php echo home_url(); ?>">interesting to read</a>.</p>
					</article>
					
					<?php } elseif(is_category()) { ?>
						<h4 class="cat-title"><?php single_cat_title(); ?></h4>
					<?php } ?>
					
							
					<?php while (have_posts()) : the_post(); ?>
						<?php if(is_single() || is_page()) {
							if ( has_post_thumbnail() ) {
								the_post_thumbnail();
							} 
						} else { 
							if ( has_post_thumbnail() ) {?>
								<div class="thumb"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( array(150,150) ); ?></a></div>
							<?php } 
						} ?>			
					
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<h2><?php if(is_single() || is_page()) { the_title(); } else { ?><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><?php } ?></h2>

						<?php if(is_single() || is_page()) { 
							edit_post_link('Edit Post &#10150;');	

							the_content(); 
						
						} else {
						
							the_excerpt(); 
						
						} ?>
			
						<?php if(is_single()) { ?>
						<div class="meta clearfix">
							
							<div class="alignright cat-list">Posted in <?php the_category(', '); ?></div>

						</div><!-- meta -->
							
							<?php if ($cmmnt == 1) { comments_template(); } ?>
							
						<?php } elseif(!is_page()) { ?>
							<p class="more"><a href="<?php the_permalink(); ?>">Read Now &#10149;</a></p>
						<?php } ?>
						
					</article>
					<?php endwhile; ?>
			
					<nav id="pagi">
						<?php previous_posts_link('Previous'); ?>
						<?php next_posts_link('Older'); ?>
					</nav>
				
				</section>
				
				
				<footer>
					<nav>
						<section>
							<h4>Popular Posts</h4>
							<ul>
								<?php wp_reset_query(); query_posts('showposts=3&orderby=rand&cat='.$popular); if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
								<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
								<?php endwhile; else: endif; wp_reset_query(); ?>
							</ul>
							
						</section>
						<section>
							<h4>Pages</h4>
							<ul> <?php wp_list_pages('title_li='); ?></ul>
						</section>
						
					</nav>

					<p><?php bloginfo('description'); ?></p>
					
				</footer>
				
				<?php wp_footer(); ?>
				<script>$(document).ready(function(){$(".toggle").click(function(e){e.preventDefault();$("#page").toggleClass("sidebar");$("#navwrap").toggleClass("sidebar");});});</script>
				
				
		  	<?php if ( ! is_preview() ) { ?><script> (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){ (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o), m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m) })(window,document,'script','//www.google-analytics.com/analytics.js','ga'); ga('create', '<?php echo $ga; ?>', '<?php echo home_url(); ?>'); ga('send', 'pageview'); </script><?php  } ?>
			</div> <!-- page -->
		</div> <!-- container -->
	</body>
</html>



