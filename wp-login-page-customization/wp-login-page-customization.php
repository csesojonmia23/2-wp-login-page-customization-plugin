<?php
/**
 * Plugin Name: WP Login Page Customize
 * Plugin URI: https://wordpress.org/plugins/wp-login-page-customize/
 * Description: The Customizer Login Page plugin will help you to enable a custom login page to your WordPress website.
 * Version: 1.0.0
 * Requires at least: 5.2
 * Requires PHP: 7.2
 * Author: Engr Sojon Mia
 * Author URI: https://www.sojonmiawebdeveloper.com
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: wplpc
 */
 /*
 * Enqueue Dashboard CSS file
 */
function wplpc_dashboard_enqueue_register(){
     wp_enqueue_style( 'wplpc-dashboard', plugins_url( 'css/wplpc-dashboard.css', __FILE__ ), false, "1.0.0");
     }
     add_action('admin_enqueue_scripts', 'wplpc_dashboard_enqueue_register');
 /*
 * Plugin Option Page Function
 */
  function wplpc_add_theme_page(){
    add_menu_page( 'Login Option for Admin', 'Login Page', 'manage_options', 'wplpc-plugin-option', 'wplpc_create_page', 'dashicons-lock', 101 );
  }
  add_action( 'admin_menu', 'wplpc_add_theme_page');

  function wplpc_create_page(){
     ?>
          <div class="wplpc_main_area">
               <div class="wplpc_body_area wplpc_common">
                    <h3 id="title"><?php print esc_attr('Login Page Customizer');?></h3>
                    <form action="options.php" method="post">
                         <?php wp_nonce_field('update-options'); ?>
                         <!-- Primary Color -->
                         <label for="wplpc-primary-color" name="wplpc-primary-color"><?php print esc_attr('Primary Color: ');?></label>
                         <input type="color" name="wplpc-primary-color" value="<?php print get_option('wplpc-primary-color');?>" id="">
                         <br><br>
                         <!-- Secondary Color -->
                         <label for="wplpc-secondary-color" name="wplpc-secondary-color"><?php print esc_attr('Secondary Color: ');?></label>
                         <input type="color" name="wplpc-secondary-color" value="<?php print get_option('wplpc-secondary-color');?>" id="">
                         <br><br>
                         <!-- Logo -->
                         <label for="wplpc-logo-image-url" name="wplpc-logo-image-url"><?php print esc_attr('Logo URL from Media: ');?></label>
                         <input type="text" name="wplpc-logo-image-url" value="<?php print get_option('wplpc-logo-image-url');?>" id="" placeholder="Logo image URL">
                         <br><br>
                         <!-- Background Image -->
                         <label for="wplpc-bg-image-url" name="wplpc-bg-image-url"><?php print esc_attr('Background Image URL from Media: ');?></label>
                         <input type="text" name="wplpc-bg-image-url" value="<?php print get_option('wplpc-bg-image-url');?>" id="" placeholder="Background image URL">
                         <br><br>
                         <!-- Background Brightness -->
                         <label for="wplpc-bg-brightness" name="wplpc-bg-brightness"><?php print esc_attr('Background Opacity, Between ( 0.1 to 1 ): ');?></label>
                         <input type="text" name="wplpc-bg-brightness" value="<?php print get_option('wplpc-bg-brightness');?>" id="" placeholder="Typing Number">

                         <br><br><br>
                         <input type="hidden" name="action" value="update">
                         <input type="hidden" name="page_options" value="wplpc-primary-color, wplpc-logo-image-url, wplpc-bg-image-url, wplpc-bg-brightness, wplpc-secondary-color">
                         <input type="submit" name="submit" class="button button-primary" value="<?php _e('Save Changes', 'wplpc') ?>">
                    </form>
               </div>
               <div class="wplpc_sidebar_area wplpc_common">
                    <h3 id="title"><?php print esc_attr('Author Information');?></h3>
                    <img src="<?php echo plugins_url( 'images/author_img.png', __FILE__ );?>" alt="author_img" class="myimg">
                    <p>Engr Sojon Mia, a Computer Engineer, offers expert WordPress theme and plugin development services. With a deep understanding of web technology, I create custom themes to enhance site aesthetics and plugins to add functionality. Providing tailored solutions, I optimize websites for improved performance and user experience, catering to diverse client needs.</p>
                    <h3 id="sojon_title"><?php print esc_attr('Contact Me');?></h3>
                    <p><b>Gmail: </b>sojonmiawebdev@gmail.com</p>
                    <p><b>WhatsApp: </b>+88 01708926923</p>
                    <p><b>LinkdedIn: </b><a href="https://www.linkedin.com/in/csesojonmia23/" target="_blank">www.linkedin.com/in/csesojonmia23</a></p>
                    <p><b>Portfolio: </b><a href="https://www.sojonmiawebdeveloper.com/" target="_blank">www.sojonmiawebdeveloper.com</a></p>
                    <p><b>gitHub: </b><a href="https://github.com/csesojonmia23" target="_blank">https://github.com/csesojonmia23</a></p>
               </div>
          </div>
     <?php
  }
     // Enqueue Plugin CSS file
     function wplpc_login_enqueue_register(){
     wp_enqueue_style( 'clpwp_login_enqueue', plugins_url( 'css/wp-login-page-customization.css', __FILE__ ), false, "1.0.0");
   }
   add_action('login_enqueue_scripts', 'wplpc_login_enqueue_register');
   // Changing Login form logo
     function wplpc_login_logo_change(){
          ?>
          <style>
          #login h1 a, .login h1 a{
          background-image: url(<?php print get_option('wplpc-logo-image-url'); ?>) !important;
          }
          .login #login_error,
          .login .message,
          .login .success {
          border-left: 4px solid <?php print get_option('wplpc-primary-color'); ?> !important;
          }
          input#user_login,
          input#user_pass {
               border-left: 4px solid <?php print get_option('wplpc-primary-color'); ?> !important;
          }
          #login form p.submit input {
          background: <?php print get_option('wplpc-primary-color'); ?> !important;
          }
          body.login {
          background-image: url(<?php print get_option('wplpc-bg-image-url'); ?>);
          }
          .login #backtoblog a {
          background: <?php print get_option('wplpc-secondary-color'); ?> !important;
          }
          body.login::after {
          opacity: <?php print get_option('wplpc-bg-brightness'); ?> !important;
          }
          </style>
     
          <?php
     }
     add_action( 'login_enqueue_scripts', 'wplpc_login_logo_change');
     // Changing Login form logo url
     function wplpc_login_logo_url_change(){
     return home_url();
     }
     add_filter( 'login_headerurl', 'wplpc_login_logo_url_change');
/*=====================================
* Plugin Redirect Feature
*/
register_activation_hook( __FILE__, 'wplpc_plugin_activation' );
function wplpc_plugin_activation(){
    add_option('wplpc_plugin_do_activation_redirect', true);
  }

add_action( 'admin_init', 'wplc_plugin_redirect');
function wplc_plugin_redirect(){
    if(get_option('wplpc_plugin_do_activation_redirect', false)){
      delete_option('wplpc_plugin_do_activation_redirect');
      if(!isset($_GET['active-multi'])){
        wp_safe_redirect(admin_url('admin.php?page=wplpc-plugin-option'));
        exit;
      }
    }
  }
 ?>