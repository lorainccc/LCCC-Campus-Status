<?php

function lc_add_campus_status_submenu_page() {
 add_submenu_page(
  'lccc-wp-webtools',                                                 // Parent Menu Slug
  __( 'LCCC Campus Status', 'lorainccc' ),                            // Page Title
  'Campus Status',                                                    // Menu Title
  'manage_options',                                                   // Capabilities
  'lc-campus-status',                                                 // Menu Slug
  'lc_campus_status_page'                                             // Function
 );
}

add_action( 'admin_menu', 'lc_add_campus_status_submenu_page' );

function lc_campus_status_page() {
  ?>
 <div style="display:block; width:100%; float:left;">
  <img style="float:right;" src="<?php echo str_replace('/php/', '', plugin_dir_url( __FILE__ ))?>/assets/images/lccc-logo.png" border="0">
  <h1 style="float:left; padding: 20px 0 0 0;">LCCC Campus Status</h1>
 </div>

<?php
}
?>