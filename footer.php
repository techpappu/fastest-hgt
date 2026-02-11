<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fastest_theme
 */

?>

<footer>
	<div class="container">
		<p>&copy; ২০২৪ Royal Natural Mixed Honey. সর্বস্বত্ব সংরক্ষিত।</p>
	</div>
</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

<script>
	jQuery(function($) {

		// Make sure WooCommerce checkout JS is loaded
		if (typeof wc_checkout_params === 'undefined') return;

		// Function to switch product via AJAX
		function switchProduct(productId) {
			if (!productId) return;

			$.post(wc_checkout_params.ajax_url, {
				action: 'switch_checkout_product',
				product_id: productId
			}).done(function() {
				// Trigger WooCommerce to refresh the checkout form
				$('body').trigger('update_checkout');
			});
		}

		// Load default product after page load
		$(document).ready(function() {
			let defaultProduct = $('.order-form').data('default');
			if (defaultProduct) {
				switchProduct(defaultProduct);
			}
		});

		// Switch product on radio change
		$(document).on('change', 'input[name="checkout_product"]', function() {
			let selectedProduct = $(this).val();
			switchProduct(selectedProduct);
		});

	});
</script>
</body>

</html>