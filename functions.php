<?php
/** Start the engine */
require_once( get_template_directory() . '/lib/init.php' );

/** Child theme (do not remove) */
define( 'CHILD_THEME_NAME', 'Sample Child Theme' );
define( 'CHILD_THEME_URL', 'http://www.studiopress.com/themes/genesis' );

/** Add Viewport meta tag for mobile browsers */
add_action( 'genesis_meta', 'add_viewport_meta_tag' );
function add_viewport_meta_tag() {
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0"/>';
}

/** Add support for custom background */
add_custom_background();

/** Add support for custom header */
add_theme_support( 'genesis-custom-header', array( 'width' => 960, 'height' => 100 ) );

/** Add support for 3-column footer widgets */
add_theme_support( 'genesis-footer-widgets', 3 );


//Add subnav Menu
remove_action('genesis_after_header', 'genesis_do_subnav');
add_action('genesis_header', 'subnav_header');
function subnav_header(){
	genesis_do_subnav();
}


//Add nav Menu
remove_action('genesis_after_header', 'genesis_do_nav');
add_action('genesis_before_loop', 'custom_do_nav');
function custom_do_nav() {
genesis_do_nav();
}


/* FOOTER --------------------------------------------------------------------------------------- */

remove_action('genesis_footer', 'genesis_do_footer');
remove_action('genesis_footer', 'genesis_footer_markup_open', 5);
remove_action('genesis_footer', 'genesis_footer_markup_close', 15);
add_action('genesis_footer', 'child_do_footer');

function child_do_footer() {
?>

<div id="footer" class="footer">
	<div class="wrap">
		<div class="creds"><p>Cox <a href="http://www.coxthemes.com/wordpress/frameworks/genesis-child-themes/">Genesis Child Themes</a> - Design by <a href="http://www.coxthemes.com">Cox Themes</a></p></div>
		<div class="gototop"><p><a href="#wrap" rel="nofollow">Return to top of page</a></p></div></div><!-- end .wrap --></div>

<?php
}