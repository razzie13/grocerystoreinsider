<?php
/*
    Template Name: Shopping Tools Page
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'shopping-tools' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
        ?> 

        <button id="web-share-button">Share This Page</button>
            
        <!-- RELATED POSTS -->
		<h3 id="related-posts-h3">Recent Insider Posts</h3>
		<div id="related-posts">
			
 
		<?php 
		// Define our WP Query Parameters
		$the_query = new WP_Query( 'posts_per_page=6' ); ?>
		
		<?php 
		// Start our WP Query
		while ($the_query -> have_posts()) : $the_query -> the_post(); 
		// Display the Post Title with Hyperlink
		?>
			<div class="related-posts-item">
				<div><?php the_post_thumbnail(); ?></div>
				<div class="related-posts-item-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></div>
			</div><!-- .related-posts-item -->
		<?php 
		// Repeat the process and reset once it hits the limit
		endwhile;
		wp_reset_postdata();
		?>
		</div><!-- #related-posts -->
		<!-- /RELATED POSTS -->

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
