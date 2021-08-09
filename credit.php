<?php
/**
	Plugin Name: Credit ShortCode
	Author: abelikov
	Version: 3.0
	Author URI: https://t.me/a_belikof
	License: GPL
**/

	add_shortcode("CreditsTotal", "credits_total");
	add_shortcode("CreditsUse", "credits_use");
	add_shortcode("CreditsNow", "credits_now");

	function credits_total () {
		return '<span id="credits_total"></span>';
	}
	function credits_use () {
		return '<span id="credits_use"></span>';
	}
	function credits_now () {
		return '<span id="credits_now"></span>';
	}

	add_action('wp_footer', 'tutsplus_add_script_wp_footer');
function tutsplus_add_script_wp_footer() {
    ?>
        <script>
            function credit_shortcode(str) {
			let local = localStorage.getItem(str);
			let elem  = document.getElementById(str);

			// console.log("local ", local, " elem ", elem);

			if (elem && local) {
				if (elem.textContent != local) {
					elem.innerHTML = local;
				}
			}
		}

		function check_shortcode() {
			credit_shortcode("credits_total");
			credit_shortcode("credits_use");
			credit_shortcode("credits_now");
		}
		// console.log("script work");
		setInterval(check_shortcode, 1000);
        </script>
    <?php
}
?>