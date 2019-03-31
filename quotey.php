<?php
/**
 * @package Quotey
 * @version 2.1
 */
/*
Plugin Name: Quotey
Description: A simple plugin which was just created for personal use. No configuration required. When activated it shows a random quote from a predefined list on the top of your header.
Plugin URI: http://github.com/black-dragon74/Quotey
Author: black.dragon74
Version: 2.0
Author URI: https://portfolio.nicksuniversum.com
*/

function quotey_custom_content() {
	// Edit these quotes. In case you want to add more. Add them each. Line by line. One at a time.
	// Mind the quote symbol on the first and the last line. Mind the colon too.
	$quotes = 
	"Enter you custom quotes like this.
	Second like this
	Third like this
	And so on";

	// Parse the above quotes into single lines.
	$quotes = explode( "\n", $quotes );

	// Use wordpress function to randomly choose a line.
	return wptexturize( $quotes[ mt_rand( 0, count( $quotes ) - 1 ) ] );
}

function quotey_remote_content() {
	// Please change this url in case you want to change the fetch location.
	// The file should be readable without any encryption
	// It is advised to use simple txt file containing quotes. One in each line.
	// There are multiple preloaded file of different categories. You just have to change quotes_inspirational.txt to quotes_category.txt
	// The list of categories can be found in the readme file on the plugin's website (GitHub)
	$quotes = file_get_contents('https://raw.githubusercontent.com/black-dragon74/Quotey/wordpress/quotes_classy.txt');

	// Parse the above quotes into single lines.
	$quotes = explode( "\n", $quotes );

	// Use wordpress function to randomly choose a line.
	$selectedQuote = wptexturize( $quotes[ mt_rand( 0, count( $quotes ) - 1 ) ] );

    // If the selected quote is empty, re-run the whole algo until we have something that is not empty
    while (empty($selectedQuote)) {
        $selectedQuote = wptexturize( $quotes[ mt_rand( 0, count( $quotes ) - 1 ) ] );        
    }

    // Finally return the selected quote
    return $selectedQuote;
}

// Print a random line. Everytime the page is loaded.
function print_quote() {
	// To use custom content change quotey_remote_content() to quotey_custom_content() in the line below.
	$selectedquote = quotey_remote_content();
	// Define a paragraph tag. Don't change anything below this line.
	echo "<p id='quotey'>$selectedquote</p>";
}

// Now we add a event listener into the head tag as we want it to appear it on the top.
add_action( 'wp_head', 'print_quote' );

// Some styleup to the output
// Edit the background-color property to match your theme's header.
// If you see some extra spacing or want more. Edit the margin-top and margin-bottom.
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
                background-color: #333 !important;
			}
	</style>
	";
}

// Deploy the plugin with the style element applied.
add_action( 'wp_head', 'quotey_style' );
?>
