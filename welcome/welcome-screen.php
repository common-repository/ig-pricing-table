<?php
/**
 * Welcome Screen Class
 */
add_action('admin_menu', 'ig_pricing_table_submenu_welcome_page');

function ig_pricing_table_submenu_welcome_page() {
    global $ig_pricing_table_welcome_page;
    $ig_pricing_table_welcome_page = add_submenu_page( 'edit.php?post_type=ig_pricing_table', 'IG Pricing Table', 'Getting Started', 'manage_options', 'ig-pricing-table-getting-started', 'ig_pricing_table_submenu_welcome_page_callback' );
}
function ig_pricing_table_submenu_welcome_page_callback() {
?>

<div class="wrap">
<div class="ig-introig ig-row">
        <h1><?php echo '<strong>'.ig_pricing_table_name().'</strong> <sup style="font-weight: bold; font-size: 14px; padding: 5px 10px; color: #666; background: #fff;">' . esc_attr( ig_pricing_table_version() ) . '</sup>'; ?></h1>
        <p style="font-size: 1.2em;"><?php esc_html_e( 'Thank you to use ', 'ig-pricing-table'); ?><?php echo ig_pricing_table_name(); ?></p>
        <p><?php esc_html_e( 'Here you can read the documentation and you can know how to get the most out of your new plugin.', 'ig-pricing-table' ); ?></p>
</div><!-- end ig-intro --> 
<?php include ('sections/welcome-intro.php'); ?>
<?php include ('sections/welcome-free-resources.php'); ?>
<?php include ('sections/welcome-footer.php'); ?>
</div>
<?php } ?>