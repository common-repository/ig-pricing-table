<?php

add_action('admin_menu', 'ig_pricing_table_submenu_page');

function ig_pricing_table_submenu_page() {
    add_submenu_page( 'edit.php?post_type=ig_pricing_table', 'IG Pricing Table Settings', 'Settings', 'manage_options', 'ig-pricing-table-settings-page', 'ig_pricing_table_submenu_page_callback' );
    //call register settings function
    add_action( 'admin_init', 'register_ig_pricing_table_settings' );
}

function register_ig_pricing_table_settings() {
	//register our settings
	register_setting( 'ig-pricing-table-settings-group', 'ig_pricing_table_color_scheme' );
}

function ig_pricing_table_submenu_page_callback() {
?>
<div class="wrap">
<h2>IG Pricing Table Settings</h2>
<img style="max-width:99%;" src="<?php echo plugins_url( '../img/pricing-tables.png', __FILE__ ) ; ?>" >
<form method="post" action="options.php">
    <?php settings_fields( 'ig-pricing-table-settings-group' ); ?>
    <?php do_settings_sections( 'ig-pricing-table-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row"><?php esc_html_e('Color scheme', 'ig-pricing-table');?></th>
        <td>
            <select name="ig_pricing_table_color_scheme">
                <option value="1" <?php selected( get_option('ig_pricing_table_color_scheme'), 1 ); ?>><?php esc_html_e('Normal', 'ig-pricing-table') ?></option>
                <option value="2" <?php selected( get_option('ig_pricing_table_color_scheme'), 2 ); ?>><?php esc_html_e('Clean', 'ig-pricing-table') ?></option>
                <option value="3" <?php selected( get_option('ig_pricing_table_color_scheme'), 3 ); ?>><?php esc_html_e('Dark', 'ig-pricing-table') ?></option>  
                <option value="4" <?php selected( get_option('ig_pricing_table_color_scheme'), 4 ); ?>><?php esc_html_e('Green', 'ig-pricing-table') ?></option>
                <option value="5" <?php selected( get_option('ig_pricing_table_color_scheme'), 5 ); ?>><?php esc_html_e('Blue', 'ig-pricing-table') ?></option>
                <option value="6" <?php selected( get_option('ig_pricing_table_color_scheme'), 6 ); ?>><?php esc_html_e('Aqua', 'ig-pricing-table') ?></option>  

            </select>
        </td>
        </tr>
    </table>
    <?php submit_button(); ?>
</form>

</div>
<?php } ?>