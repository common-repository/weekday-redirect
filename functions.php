<?php
/**
 * @package weekday-redirect
 * @author moxypark
 * @version 1.0.0
 */
/*
Plugin Name: Weekday Redirect
Plugin URI: http://moxypark.co.uk/weekday-redirect/
Description: Redirects to a specific page for each day of the week
Author: moxypark
Version: 1.0.0
Author URI: http://moxypark.co.uk/
*/

// [weekday-redirect pattern="/schedule/%day/"]
function perform_weekday_redirect($atts) {
	extract(
		shortcode_atts(
			array(
				'monday' => $_SERVER["REQUEST_URI"] . '/monday/',
				'tuesday' => $_SERVER["REQUEST_URI"] . '/tuesday/',
				'wednesday' => $_SERVER["REQUEST_URI"] . '/wednesday/',
				'thursday' => $_SERVER["REQUEST_URI"] . '/thursday/',
				'friday' => $_SERVER["REQUEST_URI"] . '/friday/',
				'saturday' => $_SERVER["REQUEST_URI"] . '/saturday/',
				'sunday' => $_SERVER["REQUEST_URI"] . '/sunday/',
				'pattern' => ''
			),
			$atts
		)
	);
	
	$now = getdate();
	$weekday = strtolower($now['weekday']);
	$day = ${$weekday};
	
	$pattern = "{$pattern}";
	if ($pattern != '') {
		$url = str_replace('%day', $weekday, $pattern);
	} else {
		$url = "{$day}";
	}
	
	header("Location: $url", TRUE, 307);
}
add_shortcode('weekday-redirect', 'perform_weekday_redirect');
?>