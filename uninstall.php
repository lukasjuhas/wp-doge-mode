<?php
# make sure uninstallation is triggered
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) )
	exit();

# on uninstall, clean up database removing plugin options
function wpdm_delete_plugin() {
	  // delete_option( 'wpdm-enabled' );
}

wpdm_delete_plugin();

?>
