<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package grocerystoreinsider
 */

?>

<!-- footer.php start -->

<!-- START CUSTOM FOOTER CODE -->

<footer>
        <div class="page-width">
		<nav class="main-navigation">
			<div class="site-width">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Fresh Truths about Shopping', 'grocerystoreinsider' ); ?></button>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					)
				);
				?>
			</div>
		</nav>
            <div class="site-width">
                <div class="bottom-nav-bar">
                    <div class="bottom-nav-links">
                        <div class="site-title"><?php require 'includes/title.php';?></div>
                        <div class="site-links">
                            <ul>
                                <li>contact</li>
                                <li><a href="https://grocerystoreinsider.com/privacy-policy/">privacy</a></li>
                                <li><a href="https://grocerystoreinsider.com/pitch-an-article-for-grocerystoreinsider-com/">pitch an article</a></li>
                            </ul>

                            <ul>
                                <li>instagram</li>
                                <li>pinterest</li>
                                <li>facebook</li>
                            </ul>
                        </div>
                        
                        
                    </div>
                    <div class="bottom-nav-search">
                        <div class="site-slogan">helping you shop smarter</div>
                        <div class="site-search"></div>
                    </div>
                </div>
                
                
                
            </div>
        </div>
    </footer>

<!-- END CUSTOM FOOTER CODE -->




</div><!-- #page -->

<?php wp_footer(); ?>

<!-- footer.php end (before closing body and html tags) -->
</body>
</html>
