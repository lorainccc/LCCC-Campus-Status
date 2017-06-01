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

<div ng-app="app">
  <div ng-controller="lcAuthCtrl">
   <div ng-hide="authData">
   <h1>Login</h1>
      <div style="width: 100%; display:inline-block;">
       <div style="width: 25%; float:left;"><label>User Name:</label></div>
       <div style="width: 75%; float:left;"><input type="email" id="email" placeholder="email" ng-model="email"></div>
     </div>
     <div style="width: 100%; display:inline-block;">
      <div style="width: 25%; float:left;"><label>Password:</label></div>
      <div style="width: 75%; float:left;"><input type="password" id="password" placeholder="password" ng-model="password"></div>
     </div>
     <div style="width: 100%; display:inline-block;">
      <button id="login" ng-click="lcLogin()">Login</button>
     </div>
   </div>


   <div ng-show="authData">
     <div style="width: 100%; display:inline-block;">
      <button id="logout" ng-click="logout()">Logout</button>
     </div>

     <div style="width:500px; margin: 20px 0 0 0;" id="app">
      <div ng-show="save_notify">saved</div>
      <div style="width:50%; float:left; margin: 5px 0; font-weight:700;"><label>Notification Active?</label></div>
      <div style="width:50%; float:left; margin: 5px 0;"><select style="" ng-model="notify.active">
        <option value="1">Yes</option>
        <option value="0">No</option>
       </select></div>
      <div style="width:100%; margin: 5px 0;">
       <label style="font-weight:700;">Notification Headline</label>
       <input class="form-control" ng-model="notify.headline" placeholder="Headline for notification" ng-required="notify.active == '1'" size="100"/>
      </div>
      <div style="width:100%; margin: 5px 0;">
       <label style="font-weight:700;">Notification Text</label>
       <textarea class="form-control" ng-model="notify.text" placeholder="Text for notification" ng-required="notify.active == '1'" cols="100" rows="5" ></textarea>
      </div>
      <div style="width:100%; margin: 5px 0;">
       <label style="font-weight:700;">Notification Additional URL</label>
       <input class="form-control" ng-model="notify.url" placeholder="Read more link." ng-required="notify.active == '1'" size="100" />
      </div>
      <div style="width:100%; margin: 5px 0;">
       <label style="font-weight:700;">Notification Type</label>
       <select class="form-control" ng-model="notify.type" ng-required="notify.active == '1'">
        <option value="exclamation">Emergency (Red)</option>
        <option value="info">Info (Blue)</option>
        <option value="info-alt">Info (Blue - Bold i)</option>
       </select>
      </div>
      <div><button class="" ng-click="lcUpdateStatus()">Update Notification</button></div>
     </div>


   </div>
  </div>
 </div>

<?php
}
?>