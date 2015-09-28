<?php
/**
* Plugin Name: Doge Mode
* Plugin URI: https://github.com/lukasjuhas/wp-doge-mode
* Description: Turns your website in to doge mode.
* Version: 1.0
* Author: Lukas Juhas
* Author URI: http://lukasjuhas.com
* Text Domain: wp-doge-mode
* License: GPL2
*/

/*  Copyright 2015  Lukas Juhas  (email : hello@lukasjuhas.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

define( 'WPDM_VERSION', '1.0' );
define( 'WPDM_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'WPDM_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'WPDM_PLUGIN_BASENAME', plugin_basename( __FILE__ ));
define( 'WPDM_PLUGIN_NAME', substr( WPDM_PLUGIN_BASENAME, 0, strrpos( WPDM_PLUGIN_BASENAME, '/')) );
define( 'WPDM_DOMAIN', 'wpdm' );
define( 'WPDM_CONTACT_EMAIL', 'hello@lukasjuhas.com' );

if ( !function_exists( 'add_action' ) ) {
	echo 'wow, much direct? Amaze...';
	exit;
}

if ( ! class_exists('wpDogeMode') ) {

  class wpDogeMode {

      function __construct() {
          add_action( 'wp_head', array( $this, 'style' ) );
          add_action( 'admin_bar_menu', array( $this, 'indicator' ), 100 );
          add_action( 'wp_enqueue_scripts', array($this, 'enqueue' ) );
      }

      static public function style() {
          echo "<style type='text/css'>
						body{
							font-family:'Comic Sans', 'Comic Sans MS', 'Chalkboard', 'ChalkboardSE-Regular', 'Marker Felt', 'Purisa', 'URW Chancery L', cursive !important
						}
						.wpdm-overlay{
							position: fixed;left:0;right:0;top:0;bottom:0;overflow:hidden;
							z-index: 99999;
						}
						.wpdm-overlay span {
							opacity: 1;
							-webkit-animation: fadein 0.5s;
				       -moz-animation: fadein 0.5s;
				        -ms-animation: fadein 0.5s;
				         -o-animation: fadein 0.5s;
				            animation: fadein 0.5s;
						}
						#wp-admin-bar-wpdm-indicator.active{
							background:#D9CE9E
						}
						#wp-admin-bar-wpdm-indicator.active a{
							color:black
						}
						@keyframes fadein {
						    from { opacity: 0; }
						    to   { opacity: 1; }
						}
						@-moz-keyframes fadein {
						    from { opacity: 0; }
						    to   { opacity: 1; }
						}
						@-webkit-keyframes fadein {
						    from { opacity: 0; }
						    to   { opacity: 1; }
						}
						@-ms-keyframes fadein {
						    from { opacity: 0; }
						    to   { opacity: 1; }
						}
						@-o-keyframes fadein {
						    from { opacity: 0; }
						    to   { opacity: 1; }
						}
					</style>";
      }

      static public function enqueue() {
          wp_enqueue_script( WPDM_DOMAIN, WPDM_PLUGIN_URL . 'doge.min.js', array('jquery'), WPDM_VERSION, true );
          $doge = array(
  		        'img_url' => WPDM_PLUGIN_URL . '/images/'
          );
          wp_localize_script(WPDM_DOMAIN, 'wpdm', $doge);
      }

      static public function indicator($wp_admin_bar) {
          $indicator = array(
              'id' => WPDM_DOMAIN . '-indicator',
              'title' => _x('Doge Mode: Active', WPDM_PLUGIN_NAME),
              'parent' => false,
              'href' => get_admin_url(null, 'options-general.php?page=wp-maintenance-mode'),
                  'meta' => array(
                  'title' => _x('Disable plugin to disable Doge Mode', WPDM_PLUGIN_NAME),
                  'class' => 'active',
              )
          );
          $wp_admin_bar->add_node($indicator);
      }

  }

  // init
  $wpDogeMode = new wpDogeMode();
}
