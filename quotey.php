<?php
/**
 * @package Quotey
 * @version 1.0
 */
/*
Plugin Name: Quotey
Description: A simple plugin which was just created for personal use. No configuration required. When activated it shows a random quote from a predefined list on the top of your header.
Plugin URI: http://github.com/black-dragon74/Quotey
Author: black.dragon74
Version: 1.0
Author URI: http://hackintoshrevolution.net/members/black-dragon74.1/
*/

function quotey_content() {
	// Edit these quotes. In case you want to add more. Add them each. Line by line. One at a time.
	$quotes = 
	"
	Live life less ordinary.
	If you want it, earn it.
	There is no shortcut to success.
	No one can make you feel inferior without your consent.
	The way to get started is to quit talking and begin doing.
	In order to succeed you have to believe that you can succeed.
	When opportunity knocks, build a door.
	To see the rainbow you have to deal with the rain.
	It doesn't matter how slowly you go until you stop.
	Keep your eyes on the stars and feet on the ground.
	It always seems impossible until it's done.
	If you can dream it. You can do it.
	Start where you are, use what you have and do what you can.
	Problems are not stop signs, they are guidelines.
	Aim for the moon. If you miss, you may hit a star.
	The secret of getting ahead is getting started.
	What you plant now, you'll harvest later.
	Even a stopped clock shows right time twice.
	Don't watch the clock. Do what it does. Keep moving.
	Either you run the day or the day runs you.
	Be kind whenever possible. It is always possible.
	Expect problems and eat them for breakfast.
	Quality is not an act. It is a habit.
	Do not wait to strike till the iron is hot; but make it hot by striking.
	Things do not happen. Things are made to happen.
	Go for it now. The future is promised to no one.
	Even if you fall on your face, you're still moving forward.
	Arriving at one goal is the starting point to another.
	There's a way to do it better - find it.
	A goal is a dream with a deadline.
	Without hard work, nothing grows but weeds.
	One finds limits by pushing them.
	Live a live worth remembering.
	";

	// Parse the above quotes into single lines.
	$quotes = explode( "\n", $quotes );

	// Use wordpress function to randomly choose a line.
	return wptexturize( $quotes[ mt_rand( 0, count( $quotes ) - 1 ) ] );
}

// Print a random line. Everytime the page is loaded.
function print_quote() {
	$selectedquote = quotey_content();
	echo "<p id='quotey'>$selectedquote</p>";
}

// Now we add a event listener into the head tag as we want it to appear it on the top.
add_action( 'wp_head', 'print_quote' );

// Some styleup to the output
function quotey_style() {
	echo "
	<style type='text/css'>
	#quotey {
                text-align: center !important;
                font-family: cursive;
                margin-bottom: 3px;
                margin-top: 3px;
                margin-left: auto;
                margin-right: auto;
                font-weight: 600;
                opacity: 0.7 !important;
                color: white;
			}
	</style>
	";
}

// Deploy the plugin with the style element applied.
add_action( 'wp_head', 'quotey_style' );
?>