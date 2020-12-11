<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package grocerystoreinsider
 */

?>

<!-- content-search.php start  -->

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div id="search-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php
			//grocerystoreinsider_posted_on();
			//grocerystoreinsider_posted_by();
			?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</div><!-- #search-header -->

	<?php //grocerystoreinsider_post_thumbnail(); ?>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

<!--
	<footer class="entry-footer">
		<?php grocerystoreinsider_entry_footer(); ?>
	</footer> .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->

<!-- content-search.php end  -->