<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package grocerystoreinsider
 */

?>

<!-- content-shopping-tools.php start  -->

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<!--<header class="entry-header">-->
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	<!-- </header> .entry-header -->

	<div class="entry-content">
        <h3>Measurement Converters</h3>
        <div class="page-tools-icon-container">
            <div id="page-tools-calc-weight" class="page-tools-items">
                <i class="fas fa-weight"></i>
                <a href="https://grocerystoreinsider.com/shopping-tools/calculating-product-value-by-weight/">weight</a>
            </div>
            <div id="page-tools-calc-volume" class="page-tools-items">
                <i class="fas fa-balance-scale"></i>
                volume
            </div>
            <div id="page-tools-calc-volume" class="page-tools-items">
                <i class="fas fa-euro-sign"></i>
                currency
            </div>
        </div>

        <h3>Search Tools</h3>
        <div class="page-tools-icon-container">
            <div id="page-tools-find-plu" class="page-tools-items">
                <i class="fas fa-search"></i>
                find PLU
            </div>
            <div id="page-tools-find-plu" class="page-tools-items">
                <i class="fas fa-search"></i>
                find UPC
            </div>
        </div>
        
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'grocerystoreinsider' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>

			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'grocerystoreinsider' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>

	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->

<!-- content-page.php end  -->
