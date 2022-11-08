<?php

/**
 * Remove fields from Member Profile
 *
 * Remove fields from User Profile (Color Picker, Personal Options, website, etc.)
 */
if( is_admin() ){
    remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );
    add_action( 'personal_options', 'prefix_hide_personal_options' );
	add_filter( 'wp_is_application_passwords_available', '__return_false' );
}
 
function prefix_hide_personal_options() {
  ?>
    <script type="text/javascript">
        jQuery( document ).ready(function( $ ){
            $( '#your-profile .form-table:first, #your-profile h3:first, .yoast, .user-description-wrap, .user-profile-picture, h2, .user-url-wrap, .user-pinterest-wrap, .user-myspace-wrap, .user-soundcloud-wrap, .user-tumblr-wrap, .user-wikipedia-wrap' ).remove();
        } );
    </script>
  <?php
}

// Hide the Website field, BackWPUp Role choice
function hide_website_field(){
    echo "\n" . '<script type="text/javascript">jQuery(document).ready(function($) {
        $(\'label[for=url]\').parent().parent().hide();
		$(\'label[for=backwpup_role]\').parent().parent().hide();
    }); 
    </script>' . "\n";
}
add_action('admin_head','hide_website_field');

// Remove Create a brand new...
function fn_user_css() {
  echo '<style>
    #add-new-user+div+p { display:none } 
  </style>';
}
add_action('admin_head', 'fn_user_css');
