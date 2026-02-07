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


	// Get the modal
	var modal = document.getElementById("video-modal");

	// Get the thumbnail image and iframe
	var thumbnail = document.getElementById("youtube-thumbnail-container");
	var youtubeVideo = document.getElementById("youtube-video");

	// Get the close button inside the modal
	var closeBtn = document.querySelector(".close-modal");

	// The video ID from the YouTube link
	if(document.body.classList.contains("woocommerce-order-received")) {
		var youtubeVideoID = "5fHzViaZ64A";
	}else{
		var youtubeVideoID = "fvgLuO-pZoM"; 
	}
	 // Replace with the actual video ID

	// When the thumbnail is clicked, open the modal and play the video
	thumbnail.onclick = function() {
		modal.style.display = "flex";
		youtubeVideo.src = "https://www.youtube.com/embed/" + youtubeVideoID + "?autoplay=1";
	}

	// When the close button is clicked, close the modal and stop the video
	closeBtn.onclick = function() {
		modal.style.display = "none";
		youtubeVideo.src = ""; // Stop the video by clearing the iframe source
	}

	// Close the modal if the user clicks anywhere outside the video
	window.onclick = function(event) {
		if (event.target == modal) {
			modal.style.display = "none";
			youtubeVideo.src = ""; // Stop the video by clearing the iframe source
		}
	}
</script>
</body>

</html>