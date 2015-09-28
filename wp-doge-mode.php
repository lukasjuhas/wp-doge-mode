<?php
/**
* Plugin Name: Doge Mode
* Plugin URI: https://github.com/lukasjuhas/wp-doge-mode
* Description: Doge Mode for Wordpress. Turns your website in to doge mode.
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

# hooks
add_action( 'activate_' . WPDM_PLUGIN_BASENAME, 'wpdm_install' );

# on installation
function wpdm_install() {}


if ( ! class_exists('wpDogeMode') ) {

  class wpDogeMode {

      function __construct() {
          add_action( 'admin_head', array( $this, 'style' ) );
          add_action( 'admin_bar_menu', array( $this, 'indicator' ), 100 );
          add_action( 'wp_enqueue_scripts', array($this, 'enqueue' ) );
      }

      private static function style() {
          echo '<style type="text/css">#wp-admin-bar-wpdm-indicator.active { background: #D9CE9E; }</style>';
      }

      private static function enqueue() {
          wp_enqueue_style( WPDM_DOMAIN,  WPDM_PLUGIN_URL . '/doge.css');
          wp_enqueue_script( WPDM_DOMAIN, WPDM_PLUGIN_URL . '/doge.min.js', array('jquery'), WPDM_VERSION, true );
          $doge = array(
  		        'img_url' => WPDM_PLUGIN_URL . '/images/'
          );
          wp_localize_script(WPDM_DOMAIN, 'wpdm', $doge);
      }

      private static function indicator($wp_admin_bar) {
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
