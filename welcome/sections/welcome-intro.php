<?php
/**
 * Welcome Intro
 */
?>
<div id="getting_started" class="ig-started ig-row">
    <div class="ig-col ig-col2">
        <div class="ig-boxed">
        <h3><span class="dashicons dashicons-format-aside"></span> <?php esc_html_e( 'Documentation', 'ig-pricing-table' ); ?></h3>
        <p><?php esc_html_e( 'You can read detailed information on plugin features in the documentation.', 'ig-pricing-table' ); ?></p>
        <a href="<?php echo esc_url('http://www.iograficathemes.com/documentation/');?>" class="button"><?php esc_html_e( 'View the documentation', 'ig-pricing-table' ); ?></a>
    </div>
    </div><!-- end ig-col2 -->
    <div class="ig-col ig-col2">
    <div class="ig-boxed">
        <h3><span class="dashicons dashicons-admin-tools"></span><?php esc_html_e( 'Settings' ,'ig-pricing-table' ); ?></h3>
        <p><?php esc_html_e( 'Start to customize and setup your plugin in the settings page.', 'ig-pricing-table' ); ?></p>
        <a href="<?php echo esc_url( admin_url() . 'edit.php?post_type=ig_pricing_table&page=ig-pricing-table-settings-page' ); ?>" class="button"><?php esc_html_e( 'Go to settings', 'ig-pricing-table' ); ?></a>    
    </div>
    </div><!-- end ig-col2 -->
</div><!-- end ig-started -->