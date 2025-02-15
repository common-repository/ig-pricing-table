<?php
/**
 * Welcome Free Resources
 */
?>
<div id="free_resources" class="ig-free-resources ig-row panel">
<h2><?php esc_html_e( 'Free resources', 'ig-pricing-table' ); ?></h2>
    <p><?php esc_html_e( 'Take a look to our free resources of themes and plugins.', 'ig-pricing-table' ); ?></p>
<div class="ig-themes">
    <div class="ig-col ig-col2">
        <div class="ig-boxed ig-row">
        <h3><span class="dashicons dashicons-admin-appearance"></span> <?php esc_html_e( 'Free themes', 'ig-pricing-table' ); ?></h3>
            <?php
            // Set the arguments. For brevity of code, I will use most of the defaults
            $args = array(
                'author' => 'iografica',
            );
            // Make request and extract plug-in object
            $response = wp_remote_post(
            'http://api.wordpress.org/themes/info/1.0/',
            array(
            'body' => array(
                'action' => 'query_themes',
                'request' => serialize((object)$args)
                    )
                )
            );

            if ( !is_wp_error($response) ) {
                $returned_object =  unserialize(wp_remote_retrieve_body($response));
                $theme = $returned_object->themes;
                if ( !is_object($theme) && !is_array($theme) ) {
                // Response body does not contain an object/array
                echo esc_html__('An error has occurred', 'ig-pricing-table');
            }
            else {
            // Display a list of the plug-ins and the number of downloads
            if ( $theme ) {
                foreach ( $theme as $theme ) { ?>
                <div class="item">
                <div class="item-details">
                    <span class="item-name"><?php echo esc_html($theme->name); ?></span>
                    <!-- Check if the theme is installed -->
                    <?php if( wp_get_theme( $theme->slug )->exists() ) { ?>
                    <!-- Show the tick image notifying the theme is already installed. -->
                    <span class="item-status"><?php esc_html_e( 'installed', 'ig-pricing-table' ); ?></span>
                    <?php }	else {
                    // Set the install url for the theme.
                    $install_url = add_query_arg( array(
                    'action' => 'install-theme',
                    'theme'  => $theme->slug,
                    ), self_admin_url( 'update.php' ) );
                    ?>
                    <!-- Install Button -->
                    <span class="item-buttons">
                    <a class="install" href="<?php echo esc_url( wp_nonce_url( $install_url, 'install-theme_' . $theme->slug ) ); ?>" >
                        <?php esc_html_e( 'Install Now', 'ig-pricing-table' ); ?>
                    </a>
                    <?php } ?>
                    </span><!-- item-buttons -->
                </div><!-- item-details -->
                </div><!-- item -->
           <?php }
            }
        }
    }
    else {
    // Error object returned
    echo esc_html__('An error has occurred', 'ig-pricing-table');
    }?>
        </div><!-- ig-boxed -->
    </div><!-- ig-col2 -->
</div><!-- ig-themes -->

<div class="ig-plugins">
    <div class="ig-col ig-col2">
        <div class="ig-boxed ig-row">
    <h3><span class="dashicons dashicons-admin-plugins"></span> <?php esc_html_e( 'Free plugins', 'ig-pricing-table' ); ?></h3>
    <?php
    $args = array(
        'author' => 'iografica',
        'fields' => array(
            'description' => true,
            'downloadlink' => true
        )
    );
    // Make request and extract plug-in object. Action is query_plugins
    $response = wp_remote_post(
        'http://api.wordpress.org/plugins/info/1.0/',
        array(
        'body' => array(
            'action' => 'query_plugins',
            'request' => serialize((object)$args)
            )
        )
    );
    if ( !is_wp_error($response) ) {
        $returned_object = unserialize(wp_remote_retrieve_body($response));
        $plugins = $returned_object->plugins;
        if ( !is_array($plugins) ) {
            // Response body does not contain an object/array
            echo esc_html__('An error has occurred', 'ig-pricing-table');
        }
        else {
            // Display a list of the plug-ins and the number of downloads
            if ( $plugins ) {
                foreach ( $plugins as $plugin ) { ?>
        <div class="item">
        <div class="item-details">
            <span class="item-name">
                <?php echo esc_html($plugin->name) ?>
            </span><!-- item-name -->
            <span class="item-buttons">
                <a class="download" target="_blank" href="<?php echo esc_url($plugin->download_link); ?>">
                    <?php esc_html_e( 'Download Now', 'ig-pricing-table' ); ?>
                </a>
            </span><!-- item-buttons -->
        </div><!-- item-details -->
        </div><!-- item -->
            <?php }
        }
    }
}
else {
    // Error object returned
        echo esc_html__('An error has occurred', 'ig-pricing-table');
}
    ?>
        </div><!-- ig-boxed -->
    </div><!-- ig-col2 -->
</div><!-- ig-plugins -->
</div><!-- ig-free-resources -->
