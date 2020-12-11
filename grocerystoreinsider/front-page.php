<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package grocerystoreinsider
 */

get_header();
?>

	<main id="primary" class="site-main">
		
		<div id="site-banner">
			<img src="wp-content/themes/grocerystoreinsider/images/grocerystoreinsider-banner1.jpg" alt="Have You been shopping WRONG by reading the WRONG articles?">
		</div>

		<div id="front-page-search">
			<?php
				get_sidebar();
			?>
		</div>
	
		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content-frontpage', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
		
		<button id="web-share-button">Share This Page</button>

	</main><!-- #main -->

	<script>
		document.getElementById('web-share-button').addEventListener("click", async () => {
		try {
				await navigator.share({ title: document.title, url: window.location.href });
				console.log("Data was shared successfully");
				} catch (err) {
					console.error("Share failed:", err.message);
				}
			});
	</script>

<?php

get_footer();
