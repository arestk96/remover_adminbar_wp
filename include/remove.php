<?php
/*esto sirve para sacar el nombre de usuario activo*/
function shortcode_gracias() {
 if ( is_user_logged_in() ) {
 global $current_user; wp_get_current_user ();
 echo 'Hola '. $current_user->user_login;
  }
}

add_shortcode('gracias', 'shortcode_gracias');

/*esto es para quitar el admin bar  y redirige a home al hacer logout*/
add_action('after_setup_theme', 'bp_no_admin_bar');

function bp_no_admin_bar() {
if (!current_user_can('administrator') && !is_admin()) {
add_filter( 'show_admin_bar', '__return_false' );
}
}
add_action('wp_logout',function(){return wp_redirect(home_url());exit();});
/* cambio de logo a wp*/
function my_login_logo() { ?>
  <style type="text/css">
    #login h1 a, .login h1 a {

        background-image: url(<?php echo content_url(); ?>/plugins/remove_v3/media/algo.png);
      height: 48px;
      width: 244px;
      background-size: cover;
      background-repeat: no-repeat;
    }
  </style>
<?php }//end my_login_logo()
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function my_login_logo_url() {
  return home_url();
}//end my_login_logo_url()
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
  return 'xxxxxxxxxxxxx';
}//end my_login_logo_url_title()
add_filter( 'login_headertitle', 'my_login_logo_url_title' );
/* cambio de logo a wp*/
