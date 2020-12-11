<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package grocerystoreinsider
 */

?>

<!-- content-frontpage.php start  -->

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<div class="front-page-blog-posts">
			<div class="blog-post">
                <div class="blog-post-image-479"><?php the_post_thumbnail(); ?></div>
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

                    <div class="entry-summary">
                        <?php the_excerpt(); ?>
                    </div><!-- .entry-summary -->

            </div><!-- .blog-post -->
			<div class="blog-post-image"><?php grocerystoreinsider_post_thumbnail(); ?></div><!-- .blog-post-image -->
		</div>
	
</article><!-- #post-<?php the_ID(); ?> -->



<!-- content-frontpage.php end  -->