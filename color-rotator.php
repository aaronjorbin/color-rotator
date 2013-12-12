<?php
/*
Plugin Name: Color Rotator 
Description: Change the color scheme every time you login 
Author: Aaron Jorbin
Version: 1.0
Author URI: http://aaron.jorb.in/
License: GPLv2 or later
*/

// Every time a user logs in, change the color scheme
add_action( 'wp_login', 'jorbin_color_rotate' );

function jorbin_color_rotate() {
	register_admin_color_schemes();
	do_action( 'jorbin_color_rotate_pre_rotate' );
	global $_wp_admin_css_colors;

    $color_scheme = array_rand( $_wp_admin_css_colors , 1 ); 

    update_user_meta( get_current_user_id(), 'admin_color', $color_scheme );

}
