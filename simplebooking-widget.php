<?
/**
Plugin Name: 	Simple Booking - Widget
Description:	Configuración Motor de Reservas Simple Booking - Plugin Wordpress
Version:		1.1
Author:			Simple Booking
Author URI:		https://www.simplebooking.es/
**/
add_action( 'admin_menu', 'wp_simple_booking' );
add_action( 'shutdown' , 'sh_simple_booking' );
function sh_simple_booking(){
    if(is_home()){
        echo escape_html('Simple Booking');
    }
}
add_action( 'admin_enqueue_scripts', 'simple_booking_color_pick' );
function simple_booking_color_pick( $hook_suffix ) {
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'simple-booking-handle', plugins_url('simple_pick_color.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
}
/* ========================================================== */
/* TITLE ROLINE SYSTEM -------------------------------------- */
/* ========================================================== */
function wp_simple_booking() {
    add_options_page( 'Opciones Simple Booking', 'Simple Booking', 'manage_options', 'wp_simple_booking', 'wp_simple_booking_options' );
}


function escape_html($str_txt){
    return esc_html($str_txt);
}


/* ========================================================== */
/* CORE ROLINE SYSTEM --------------------------------------- */
/* ========================================================== */
function wp_simple_booking_options() {

    if (!current_user_can('manage_options')){
        wp_die( 'Pequeño padawan... debes utilizar la fuerza para entrar aquí.' );
    }

    $action = sanitize_text_field($_POST['sb_action']);

    $data_fields = [
        ['name' => 'sb_id_hotel', 'label' => 'Hotel ID', 'placeholder' => 'Introduzca su ID del hotel', 'value' => sanitize_text_field($_POST['sb_id_hotel']), 'type' => 'text' ],
        ['name' => 'sb_id_chain', 'label' => 'Chain ID', 'placeholder' => 'Introduzca su ID de la cadena', 'value' => sanitize_text_field($_POST['sb_id_chain']), 'type' => 'text' ],
        ['name' => 'sb_color_1', 'label' => 'Color 1', 'placeholder' => 'Introduzca color 1', 'value' => sanitize_text_field($_POST['sb_color_1']), 'type' => 'color' ],
        ['name' => 'sb_color_2', 'label' => 'Color 2', 'placeholder' => 'Introduzca color 1', 'value' => sanitize_text_field($_POST['sb_color_2']), 'type' => 'color' ]
    ];

    if( $action == 'save_data') {
        foreach($data_fields as $data_field_details){
            update_option( $data_field_details['name'], $data_field_details['value'] );
        }
        $opt_show_title = $_POST['sb_show_title']; update_option( 'sb_show_title', $opt_show_title );
        $opt_theme_form = $_POST['sb_theme_form']; update_option( 'sb_theme_form', $opt_theme_form );
        echo '<div class="updated"><p><strong>Cambios guardados correctamente.</strong></p></div>';
    } 

    ?>
    <div class="wrap"><h2>WP Simple Booking</h2></div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // COPY IFRAME
            var copyBtnIframe = document.querySelector('.copy-iframe');
            copyBtnIframe.addEventListener('click', function(event) {
              var copyIframe = document.querySelector('.element-iframe');
              copyIframe.focus();
              copyIframe.select();
              try {
                var successful = document.execCommand('copy');
                var msg = successful ? 'correctamente' : 'ERROR!';
                alert('Shortcode copiado ' + msg);
              } catch (err) { alert('Oops, su navegador no admite el copiado automático. Deberá hacerlo manualmente.'); }
            });
            // COPY OFFERS
            var copyBtnOffers = document.querySelector('.copy-offers');
            copyBtnOffers.addEventListener('click', function(event) {
              var copyOffers = document.querySelector('.element-offers');
              copyOffers.focus();
              copyOffers.select();
              try {
                var successful = document.execCommand('copy');
                var msg = successful ? 'correctamente' : 'ERROR!';
                alert('Shortcode copiado ' + msg);
              } catch (err) { alert('Oops, su navegador no admite el copiado automático. Deberá hacerlo manualmente.'); }
            });
        }, false);
    </script>
        <style type="text/css">
            .sb_boxing{margin-bottom:20px;padding:5px;}
            .sb_boxing label{display:block;}
        </style>
        <form name="form1" method="post" action="">
            <input type="hidden" name="sb_action" value="save_data">
            <?php
                $opt_show_title = get_option( 'sb_show_title' );
                $opt_theme_form = get_option( 'sb_theme_form' );
                foreach($data_fields as $data_field_details){
                    if($data_field_details['type'] == 'color') $type_details = 'class="color-field" data-default-color="#f2f2f2" ';
                    else '';
                    echo '<p>'. $data_field_details['label'] .'<br><input type="'.$data_field_details['type'].'" name="'. $data_field_details['name'] .'" value="'. get_option($data_field_details['name']) .'" size="60" placeholder="'. $data_field_details['placeholder'] .'" '. $type_details .' /></p>';
                }
            ?>
            <div class="sb_boxing">
                <label>Theme Booking Form</label>
                <select name="sb_theme_form">
                    <option value="0" <?php if(($opt_theme_form == '')||($opt_theme_form == 0)){ echo 'selected'; }; ?>>Light</option>
                    <option value="1" <?php if($opt_theme_form == 1){ echo 'selected'; }; ?>>Dark</option>
                </select>
            </div>
            <div class="sb_boxing">
                <label>Title "Book Now" top form</label>
                <select name="sb_show_title">
                    <option value="0" <?php if(($opt_show_title == '')||($opt_show_title == 0)){ echo 'selected'; }; ?>>Show</option>
                    <option value="1" <?php if($opt_show_title == 1){ echo 'selected'; }; ?>>Hidden</option>
                </select>
            </div>
            <p class="submit">
                <input type="submit" name="Submit" class="button-primary" value="Guardar Datos" />
            </p>
        </form>
        <div class="sb_boxing"><hr></div>
        <h3>ShortCodes:</h3>
        <ul>
            <li>iFrame del Motor: <input type="text" class="element-iframe" value="[form-simple-booking position='h']" readonly="readonly" onclick="this.select();" style="width: 180px;" /><button class="copy-iframe">Copiar</button><br><small>Se puede insertar en cualquier sitio de la web.</small></li>
            <li><hr style="width: 360px;margin-left:0px;"></li>
            <li>Listado de Ofertas: <input type="text" class="element-offers" value="[offers-simple-booking]" readonly="readonly" onclick="this.select();" style="width: 180px;" /><button class="copy-offers">Copiar</button><br><small>Se puede insertar en cualquier sitio de la web.</small></li>
        </ul>
    </div>

<?php }
/* ========================================================== */
/* OBTENEMOS ID SIMPLE BOOKING ------------------------------ */
/* ========================================================== */
function get_data_simple_booking($attr) {
    if(empty($attr)){$attr = 'sb_id_hotel';}
    $dbh = new wpdb( DB_USER, DB_PASSWORD, DB_NAME, DB_HOST );
    global $table_prefix;
    $table = $table_prefix.'options';
    $query_link = "SELECT `option_value` FROM $table WHERE `option_name` = '". $attr ."'";
    $res_link = $dbh->get_results( $query_link );
    return escape_html($res_link[0]->option_value);
}
/* ========================================================== */
/* CREAMOS SHORTCODE OFERTAS -------------------------------- */
/* ========================================================== */
function shortcode_offers_simple_booking($atts) {
    ob_start();
    global $otype;
    extract(shortcode_atts(array(
        'otype' => '',
    ), $atts));
    include( dirname(__FILE__) . "/list-offers.php" );
    $get_content_offers_sb = ob_get_clean();
    return $get_content_offers_sb;
}
/* ========================================================== */
/* CREAMOS SHORTCODE IFRAME BOOKING ------------------------- */
/* ========================================================== */
function shortcode_form_simple_booking($atts) {
    ob_start();
    global $position;
    extract(shortcode_atts(array(
        'position' => '',
    ), $atts));
    include( dirname(__FILE__) . "/form-booking.php" );
    $get_content_form_booking = ob_get_clean();
    return $get_content_form_booking;
}
/* ========================================================== */
/* GENERAMOS SHORTCODES ------------------------------------- */
/* ========================================================== */
add_shortcode('offers-simple-booking', 'shortcode_offers_simple_booking');
add_shortcode('form-simple-booking', 'shortcode_form_simple_booking');
?>