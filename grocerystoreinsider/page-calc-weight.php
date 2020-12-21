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

		

	</main><!-- #main -->

<?php
get_footer();
