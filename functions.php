
// Login errors fix
function no_wordpress_errors(){
  return 'Wrong ! We are watching you !';
}
add_filter( 'login_errors', 'no_wordpress_errors' );


// Change Admin footer text
function change_footer_admin () {  
  echo 'Made with <span style="color: #ff0000;">❤</span> by <a href="http://spiritpixels.com" target="_blank">Spirit Pixels</a>. Powered by <a href="http://www.wordpress.org">WordPress</a>.';  
}  
  
add_filter('admin_footer_text', 'change_footer_admin');


// Scroll to top script
function scroll_to_top() {
wp_enqueue_script('custom-script', get_stylesheet_directory_uri() . '/js/topbutton.js', array( 'jquery' ));
}
add_action( 'wp_enqueue_scripts', 'scroll_to_top' ); 


//Comment form fix / After Wordpress 4.4 update
function serbia_incoming_move_comment_field_to_bottom( $fields ) {
$comment_field = $fields['comment'];
unset( $fields['comment'] );
$fields['comment'] = $comment_field;
return $fields;
}

add_filter( 'comment_form_fields', 'serbia_incoming_move_comment_field_to_bottom' );


//Remove WooCommerce's annoying update message
remove_action( 'admin_notices', 'woothemes_updater_notice' );


// hide the meta tag generator from head and rss. This goes to bottom.
function disable_version() {
   return '';
}
add_filter('the_generator','disable_version');
remove_action('wp_head', 'wp_generator');


// Remove Visual Composer meta tag
// -----------------------------------------------------------------
add_action('init', 'myoverride', 100);
function myoverride() {
    remove_action('wp_head', array(visual_composer(), 'addMetaData'));
}


// Remove Revolution Slider meta tag
// -----------------------------------------------------------------

add_action( 'wp_head', 'remove_revslide', 9 );
function remove_revslide() {
remove_action('wp_head', array('RevSliderFront', 'add_meta_generator'));
}
