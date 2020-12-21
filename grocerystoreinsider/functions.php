<?php
/**
 * grocerystoreinsider functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package grocerystoreinsider
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'grocerystoreinsider_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function grocerystoreinsider_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on grocerystoreinsider, use a find and replace
		 * to change 'grocerystoreinsider' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'grocerystoreinsider', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'grocerystoreinsider' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'grocerystoreinsider_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'grocerystoreinsider_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function grocerystoreinsider_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'grocerystoreinsider_content_width', 640 );
}
add_action( 'after_setup_theme', 'grocerystoreinsider_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function grocerystoreinsider_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'grocerystoreinsider' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'grocerystoreinsider' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'grocerystoreinsider_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function grocerystoreinsider_scripts() {
	wp_enqueue_style( 'grocerystoreinsider-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'grocerystoreinsider-style', 'rtl', 'replace' );

	wp_enqueue_script( 'grocerystoreinsider-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'grocerystoreinsider_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Change search placeholder text.
 */
function wpforo_search_form( $html ) {

	$html = str_replace( 'placeholder="Search ', 'placeholder="Look up anything ', $html );

	return $html;
}
add_filter( 'get_search_form', 'wpforo_search_form' );


/* JAVASCRIPT UNIT WEIGHT CALCULATOR */

function javascript_weight_calc_footer() {
    if (is_page ('calculating-product-value-by-weight')) { 
		?>
			<script type="text/javascript">
			    var productCompareList = [];

				document.getElementById('clear-compare-list').style.display="none";


				function findValue()  {
					console.log('function findValue')
					var productPrice = document.getElementById('input-price').value;
					let productWeight = document.getElementById('input-weight').value;
					let productInitialUnit = document.getElementById('select-initial-unit').value;
					let productConvertUnit = document.getElementById('select-convert-unit').value;

					// INCOMPLETE FORM
					if (productPrice == '' || productWeight == '')  {
						console.log('Please Do Not Leave Empty Fields')
					}
					//if ((productInitialUnit == productConvertUnit) && (productWeight != 1))  {
					//    console.log('Please Choose a Conversion Value')
					//}

					// GET PRICE PER INDIVIDUAL UNIT
					var productPrice = productPrice / productWeight;

					// CONVERSIONS - POUNDS
					if (productInitialUnit == 'pounds' && productConvertUnit == 'ounces')  {
						document.getElementById('price-per-unit').innerText = 'Price per Ounce: ' + (productPrice / 16).toFixed(2);
					}
					if (productInitialUnit == 'pounds' && productConvertUnit == 'grams')  {
						document.getElementById('price-per-unit').innerText = 'Price per 100 Grams: ' + ((productPrice * 2.2) / 10).toFixed(2);
					}
					if (productInitialUnit == 'pounds' && productConvertUnit == 'kilograms')  {
						document.getElementById('price-per-unit').innerText = 'Price per Kilogram: ' + (productPrice * 2.2).toFixed(2);
					}
					// -- NEEDS WORK - DOES NOT COMPUTE PROPERLY --
					if (productInitialUnit == 'pounds' && productConvertUnit == 'pounds')  {
						document.getElementById('price-per-unit').innerText = 'Price per Pound: ' + productPrice / productWeight;
					}

					// CONVERSIONS - OUNCES
					if (productInitialUnit == 'ounces' && productConvertUnit == 'pounds')  {
						document.getElementById('price-per-unit').innerText = 'Price per Pound: ' + (productPrice * 16).toFixed(2) + ' for ' + (productWeight / 16).toFixed(2) + ' pounds';
					}
					if (productInitialUnit == 'ounces' && productConvertUnit == 'grams')  {
						document.getElementById('price-per-unit').innerText = 'Price per 100 Grams: ' + productPrice.toFixed(2) * (16 * 2.2).toFixed(2) / 10;
					}
					if (productInitialUnit == 'ounces' && productConvertUnit == 'kilograms')  {
						document.getElementById('price-per-unit').innerText = 'Price per Kilogram: ' + productPrice.toFixed(2) * (16 * 2.2).toFixed(2);
					}

					// CONVERSIONS - GRAMS
					if (productInitialUnit == 'grams' && productConvertUnit == 'pounds')  {
						document.getElementById('price-per-unit').innerText = 'Price per Pound: ' + ((productPrice * 1000) * 0.454).toFixed(2) + '. You have ' + ((productWeight / 1000)/ 0.454).toFixed(2) + ' pounds';
					}
					if (productInitialUnit == 'grams' && productConvertUnit == 'ounces')  {
						document.getElementById('price-per-unit').innerText = 'Price per Ounce: ' + (productPrice * 1000).toFixed(2) * (0.454 / 16).toFixed(2);
					}
					if (productInitialUnit == 'grams' && productConvertUnit == 'kilograms')  {
						document.getElementById('price-per-unit').innerText = 'Price per Kilogram: ' + (productPrice * 1000).toFixed(2);
					}

					// CONVERSIONS - KILOGRAMS
					if (productInitialUnit == 'kilograms' && productConvertUnit == 'pounds')  {
						document.getElementById('price-per-unit').innerText = 'Price per Pound: ' + (productPrice * 0.454).toFixed(2) + ' for ' + (productWeight / 0.454).toFixed(2) + ' pounds';
					}
					if (productInitialUnit == 'kilograms' && productConvertUnit == 'ounces')  {
						document.getElementById('price-per-unit').innerText = 'Price per Ounce: ' + (productPrice * 0.454).toFixed(2) / 16 + ' for ' + (productWeight / 0.454).toFixed(2) + ' pounds';
					}
					if (productInitialUnit == 'kilograms' && productConvertUnit == 'grams')  {
						document.getElementById('price-per-unit').innerText = 'Price per 100 Grams: ' + (productPrice / 10).toFixed(2);
					}

					document.getElementById('add-to-comparison-chart').style.display="block";
				}

				// ADD CALCULATED ITEMS TO LIST ARRAY FOR COMPARISON WITH OTHER CALCULATED ITEMS
				function addToCompareList()  {
					console.log('addToCompareList')
					productCompareList.push(document.getElementById('price-per-unit').innerText);
					showCompareList();
				}

				// DISPLAY FULL LIST OF COMPARISON ITEMS
				function showCompareList()  {
					console.log('showCompareList')
					document.getElementById('compare-list').innerHTML = '';
					productCompareList.forEach(function(items, index)  {
						document.getElementById('compare-list').innerHTML += "<input type='text' placeholder='Product #" + (index + 1) +"'><br>" + items + "<br>"; 
					})
					document.getElementById('clear-compare-list').style.display="block";
				}

				// CLEAR FULL LIST OF COMPARISON ITEMS
				function clearCompareList()  {
					console.log('clearCompareList')
					productCompareList = [];
					document.getElementById('compare-list').innerHTML = '';
					document.getElementById('clear-compare-list').style.display="none";
				}

				</script>
		<?php
	  }
}
add_action('wp_footer', 'javascript_weight_calc_footer');

