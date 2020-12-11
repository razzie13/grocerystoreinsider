<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package grocerystoreinsider
 */

?>

<!-- content.php start  -->

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">

			</div><!-- .entry-meta -->
		<?php endif; ?>
	

	<?php grocerystoreinsider_post_thumbnail(); ?>

	<?php 
	function get_the_date( $format = '', $post = null ) {
		$post = get_post( $post );
	 
		if ( ! $post ) {
			return false;
		}
	 
		$_format = ! empty( $format ) ? $format : get_option( 'date_format' );
	 
		$the_date = get_post_time( $_format, false, $post, true );
	// get_the_category();
	?>

	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'grocerystoreinsider' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'grocerystoreinsider' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<div class="entry-footer">
		<?php grocerystoreinsider_entry_footer(); ?>
	</div><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->

<button id="web-share-button">Share This Page</button>

<!-- content.php end  -->