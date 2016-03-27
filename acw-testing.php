<?php
/**
 * Advanced Comments Widget Testing
 *
 * @package ACW_Recent_Comments
 *
 * @license     http://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 * @version     0.1.0
 *
 * Plugin Name: ACW Testing
 * Plugin URI:  http://darrinb.com/plugins/advanced-comments-widget
 * Description: A series of functions to test the Advanced Comments Widget
 * Version:     0.1.0
 * Author:      Darrin Boutote
 * Author URI:  http://darrinb.com
 * Text Domain: 
 * Domain Path: /lang
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */


// No direct access
if ( ! defined( 'ABSPATH' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}

/**
 * To add a new form field to the Advanced Comments Widget
 * 
 * 1. Add to $instance via the acw_instance_defaults filter.
 * 2. Add the field to the widget form via the "acw_form_before_field_{$name}" 
 *    or "acw_form_after_field_{$name}" filters.
 * 3. Hook into the update() method to save your field. 
 * 4. Hook into the widget() method to display your field value.
 */
 
  
/**
 * Filter the default widget instance
 * 
 * @param array $_defaults Current widget values.
 *
 * @return array $_defaults Filtered widget values.
 */
function dbdb_acw_instance_defaults( $_defaults ){

	$_defaults['subtitle'] = __( 'Subtitle' );
	
	return $_defaults;
}
add_filter( 'acw_instance_defaults', 'dbdb_acw_instance_defaults' );


/**
 * Sample form field added via "acw_form_before_field_{$name}" filter
 * 
 * @param array $instance Current widget settings.
 * @param object $widget Widget Object.
 */
function dbdb_acw_subtitle_field( $instance, $widget ){	
	?>
	<p>
		<label for="<?php echo $widget->get_field_id( 'subtitle' ); ?>"><?php _e( 'Subtitle:' ); ?></label>
		<input class="widefat" id="<?php echo $widget->get_field_id( 'subtitle' ); ?>" name="<?php echo $widget->get_field_name( 'subtitle' ); ?>" type="text" value="<?php echo esc_attr( $instance['subtitle'] ); ?>" />
	</p>
	<?php
}
add_action( 'acw_form_after_field_title' , 'dbdb_acw_subtitle_field', 0, 2);


/**
 * Hook into the update() method to save custom field. 
 * 
 * @param array $instance The settings prior to saving.
 * @param array $new_instance New settings for this instance as input by the user via
 *                            Widget_ACW_Recent_Comments::form().
 * @param array $old_instance Old settings for this instance.
 * 
 * @return array $instance Updated settings to save.
 */
function dbdb_acw_update_instance( $instance, $new_instance, $old_instance ){

	$instance['subtitle'] = sanitize_text_field( $new_instance['subtitle'] );
	
	return $instance;
}
add_filter( 'acw_update_instance', 'dbdb_acw_update_instance', 0, 3);

/**
 * Output subtitle on the front end
 *
 * @param array $instance Current widget settings.
 */
function dbdb_acw_widget_title_after( $instance ){

	if( empty( $instance['subtitle'] ) ) {
		return $instance;
	}
	
	echo '<h4 class="widget-subtitle">' . __( $instance['subtitle'] ) . '</h4>';

}
add_action( 'acw_widget_title_after',  'dbdb_acw_widget_title_after' );
