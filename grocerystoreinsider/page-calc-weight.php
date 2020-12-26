<?php
/*
    Template Name: Calculate Weight Value Page
 */

get_header();
?>

	<main id="primary" class="site-main">

		<div id="page-text-and-tools">
			<div id="page-text">
				<?php
					while ( have_posts() ) :
						
						the_post();

						get_template_part( 'template-parts/content', 'calc-unit' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
				?>
			</div>
			<div id="page-tools">
				<div class="value-calculator">        
					<h2>Product Weight Calculator</h2>    
					<label for="price">Price</label><input type="number" name="price" id="input-price">

					<div id="price-and-weight">
						<label for="weight">Weight</label><br>
						<input type="number" name="input-weight" id="input-weight">
						<select name="select-initial-unit" id="select-initial-unit">
							<option value="pounds">Pounds</option>
							<option value="ounces">Ounces</option>
							<option value="grams">Grams</option>
							<option value="kilograms">Kilograms</option>
						</select>
					</div>

					<div id="convert-units">
						Convert To:
						<select name="select-convert-unit" id="select-convert-unit">
							<option value="pounds">Price per Pound</option>
							<option value="ounces">Price per Ounce</option>
							<option value="grams">Price per 100 Grams</option>
							<option value="kilograms">Price per Kilogram</option>
						</select>
					</div>

					<input type="submit" value="Find Value" onclick="findValue()">

					<p id="price-per-unit"></p>

					<input type="submit" id="add-to-comparison-chart" value="Add to Compare List" onclick="addToCompareList()"> 
				
					<p id="compare-list"></p>

					<input type="submit" id="clear-compare-list" value="Clear Compare List" onclick="clearCompareList()">
				
				
				</div>
			</div>
			
		</div>

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

<?php
get_footer();
