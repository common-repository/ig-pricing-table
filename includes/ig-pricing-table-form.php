<?php 
if ($number=='first'){
    $active = ig_pricing_table_first_get_meta( 'ig_pricing_table_first_active' );
    $title = ig_pricing_table_first_get_meta( 'ig_pricing_table_first_title' );
    $desc = ig_pricing_table_first_get_meta( 'ig_pricing_table_first_short_description' );
    $price = ig_pricing_table_first_get_meta( 'ig_pricing_table_first_price' );
    $features = ig_pricing_table_first_get_meta( 'ig_pricing_table_first_features' );
    $label  = ig_pricing_table_first_get_meta( 'ig_pricing_table_first_button_label' );
    $url  = ig_pricing_table_first_get_meta( 'ig_pricing_table_first_button_url' );
    $featured  = ig_pricing_table_first_get_meta( 'ig_pricing_table_first_featured' );
}
if ($number=='second'){
    $active = ig_pricing_table_second_get_meta( 'ig_pricing_table_second_active' );
    $title = ig_pricing_table_second_get_meta( 'ig_pricing_table_second_title' );
    $desc = ig_pricing_table_second_get_meta( 'ig_pricing_table_second_short_description' );
    $price = ig_pricing_table_second_get_meta( 'ig_pricing_table_second_price' );
    $features = ig_pricing_table_second_get_meta( 'ig_pricing_table_second_features' );
    $label  = ig_pricing_table_second_get_meta( 'ig_pricing_table_second_button_label' );
    $url  = ig_pricing_table_second_get_meta( 'ig_pricing_table_second_button_url' );
    $featured  = ig_pricing_table_second_get_meta( 'ig_pricing_table_second_featured' );
}
if ($number=='third'){
    $active = ig_pricing_table_third_get_meta( 'ig_pricing_table_third_active' );
    $title = ig_pricing_table_third_get_meta( 'ig_pricing_table_third_title' );
    $desc = ig_pricing_table_third_get_meta( 'ig_pricing_table_third_short_description' );
    $price = ig_pricing_table_third_get_meta( 'ig_pricing_table_third_price' );
    $features = ig_pricing_table_third_get_meta( 'ig_pricing_table_third_features' );
    $label  = ig_pricing_table_third_get_meta( 'ig_pricing_table_third_button_label' );
    $url  = ig_pricing_table_third_get_meta( 'ig_pricing_table_third_button_url' );
    $featured  = ig_pricing_table_third_get_meta( 'ig_pricing_table_third_featured' );
}
if ($number=='fourth'){
    $active = ig_pricing_table_fourth_get_meta( 'ig_pricing_table_fourth_active' );
    $title = ig_pricing_table_fourth_get_meta( 'ig_pricing_table_fourth_title' );
    $desc = ig_pricing_table_fourth_get_meta( 'ig_pricing_table_fourth_short_description' );
    $price = ig_pricing_table_fourth_get_meta( 'ig_pricing_table_fourth_price' );
    $features = ig_pricing_table_fourth_get_meta( 'ig_pricing_table_fourth_features' );
    $label  = ig_pricing_table_fourth_get_meta( 'ig_pricing_table_fourth_button_label' );
    $url  = ig_pricing_table_fourth_get_meta( 'ig_pricing_table_fourth_button_url' );
    $featured  = ig_pricing_table_fourth_get_meta( 'ig_pricing_table_fourth_featured' );
}
?>
<div class="section group active">
        <div class="col span_2_of_4">
                <input type="checkbox" name="ig_pricing_table_<?php echo $number;?>_active" id="ig_pricing_table_<?php echo $number;?>_active" value="active" <?php echo ( $active === 'active' ) ? 'checked' : ''; ?>>
                <label for="ig_pricing_table_<?php echo $number;?>_active"><?php esc_html_e( 'Active?', 'ig-pricing-table' ); ?></label>
        </div>
        <div class="col span_2_of_4">
            <?php esc_html_e( 'Check this option to show the pricing table', 'ig-pricing-table' ); ?>
        </div>
    </div>

    <div class="section group">
        <div class="col span_2_of_4">
            <label for="ig_pricing_table_<?php echo $number;?>_title">
                <?php esc_html_e( 'Title', 'ig-pricing-table' ); ?>
            </label><br>
            <input type="text" name="ig_pricing_table_<?php echo $number;?>_title" id="ig_pricing_table_<?php echo $number;?>_title" value="<?php echo $title; ?>">
        </div>
        <div class="col span_2_of_4">
            <label for="ig_pricing_table_<?php echo $number;?>_short_description">
                <?php esc_html_e( 'Short description', 'ig-pricing-table' ); ?>
            </label><br>
            <input type="text" name="ig_pricing_table_<?php echo $number;?>_short_description" id="ig_pricing_table_<?php echo $number;?>_short_description" value="<?php echo $desc; ?>">
        </div>
    </div>

    <div class="section group">
        <div class="col span_2_of_4">
            <label for="ig_pricing_table_<?php echo $number;?>_price">
                <?php esc_html_e( 'Price', 'ig-pricing-table' ); ?>
            </label><br>
            <input type="text" name="ig_pricing_table_<?php echo $number;?>_price" id="ig_pricing_table_<?php echo $number;?>_price" value="<?php echo $price; ?>">
        </div>
    </div>

    <div class="section group">
        <div class="col span_2_of_4">
            <label for="ig_pricing_table_<?php echo $number;?>_features">
                <?php esc_html_e( 'Features', 'ig-pricing-table' ); ?>
            </label><br>
            <textarea name="ig_pricing_table_<?php echo $number;?>_features" id="ig_pricing_table_<?php echo $number;?>_features" cols="68" rows="14" ><?php echo $features; ?></textarea>
        </div>
        <div class="col span_2_of_4">
        <strong><?php esc_html_e( 'Documentation'); ?></strong>
            <p><?php esc_html_e( 'Write each features one per line'); ?></p>
            <?php echo '<span class="dashicons dashicons-yes"></span> '.esc_html__( 'Add images (not recommended)', 'ig-pricing-table' ).'<br/><span style="color:#bbb;">&lt;img src="http://yoursite.com/yourimage.png"/&gt;</span><br/><br/><span class="dashicons dashicons-yes"></span> '.esc_html__( 'Add links', 'ig-pricing-table' ).'<br/><span style="color:#bbb;">&lt;a href="http://yoursite.com"&gt;Go to yoursite.com&lt;/a&gt;</span><br/><br/><span class="dashicons dashicons-yes"></span> '.esc_html__( 'Add bold text', 'ig-pricing-table' ).'<br/><span style="color:#bbb;">&lt;strong&gt;Something <strong>important</strong>&lt;/strong&gt;</span><br/><br/><span class="dashicons dashicons-yes"></span> '.esc_html__( 'Show feature as unavailable', 'ig-pricing-table' ).' <br/><span style="color:#bbb;">&lt;span class="none"&gt;My feature&lt;/span&gt;</span>';?>
        </div>
    </div>

    <div class="section group">
        <div class="col span_2_of_4">
            <label for="ig_pricing_table_<?php echo $number;?>_button_label">
                <?php esc_html_e( 'Button label', 'ig-pricing-table' ); ?>
            </label><br>
            <input type="text" name="ig_pricing_table_<?php echo $number;?>_button_label" id="ig_pricing_table_<?php echo $number;?>_button_label" value="<?php echo $label; ?>">
        </div>
        <div class="col span_2_of_4">
            <label for="ig_pricing_table_<?php echo $number;?>_button_url">
                <?php esc_html_e( 'Button url', 'ig-pricing-table' ); ?>
            </label><br>
            <input type="text" name="ig_pricing_table_<?php echo $number;?>_button_url" id="ig_pricing_table_<?php echo $number;?>_button_url" value="<?php echo $url; ?>">
        </div>
    </div>

    <div class="featured" >
        <input type="checkbox" name="ig_pricing_table_<?php echo $number;?>_featured" id="ig_pricing_table_<?php echo $number;?>_featured" value="featured" <?php echo ( $featured === 'featured' ) ? 'checked' : ''; ?>>
        <label for="ig_pricing_table_<?php echo $number;?>_featured">
            <?php esc_html_e( 'Featured', 'ig-pricing-table>' ); ?>
        </label>
    </div>