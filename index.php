<?php
/*
Plugin Name: WP azlink
Plugin URI: http://nafuel.net
Description: AZlink-TinyWidget for Wordpress
Author: Fumiya Nakamura
Version: 0.1
Author URI: http://nafuel.net
*/

add_action('admin_menu', 'wa_admin_actions');

function wa_admin_actions() {
  add_options_page("WP Azlink", "WP Azlink", "edit_published_posts", __FILE__, 'wa_admin_options');
}

function wa_admin_options() {
?>
<div class="wrap">
  <h2>WP Azlink</h2>

  <form method="post" action="">
    <input type="submit" name="aw-init" value="初期化する" />
  </form>
</div>

<?php }

add_action('wp_enqueue_scripts', 'wa_js_hook');

function wa_js_hook() {
  wp_enqueue_script('tinywidget', plugins_url('AZlink-TinyWidget/tinywidget.min.js', __FILE__));
}

if (isset($_POST['aw-init'])) {
  wa_initialize();
}

function wa_initialize() {
  $path = plugin_dir_path(__FILE__);
  chmod($path."AZlink-TinyWidget/json", 0777);
  chmod($path."AZlink-TinyWidget/work", 0777);
}
