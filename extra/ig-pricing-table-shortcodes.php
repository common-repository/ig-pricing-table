<?php
/****
IG PRICING TABLE SHORTCODES
****/
function ig_pricing_table_shortcode( $atts ) {
    // Attributes
    extract( shortcode_atts(
        array(
            'id' => '',
            ), $atts )
    );
    // Start
    ob_start();
        $query = new WP_Query( array (
        'post_type' => 'ig_pricing_table',
        'post__in' => array($id)
        ) );
?>
<?php
    $color = get_option('ig_pricing_table_color_scheme');
?>
<div class="ig-pricing-table <?php if ($color== 1 ) { echo "normal"; } elseif ($color== 2 ) { echo "clean"; } elseif ($color== 3 ) { echo "dark"; } elseif ($color== 4 ) { echo "green"; } elseif ($color== 5 ) { echo "blue"; } elseif ($color== 6 ) { echo "aqua"; };?> ">
   <?php if ( $query->have_posts() ) {
        while ( $query->have_posts() ) : $query->the_post();
    ?>
<?php
    $firstactive = ig_pricing_table_first_get_meta('ig_pricing_table_first_active');
    $secondactive = ig_pricing_table_second_get_meta('ig_pricing_table_second_active');
    $thirdactive = ig_pricing_table_third_get_meta('ig_pricing_table_third_active');
    $fourthactive = ig_pricing_table_fourth_get_meta('ig_pricing_table_fourth_active');
    
?>
        <div class="pricing-table first <?php if ($firstactive) {echo "active";}; ?> <?php if ($secondactive) { echo "half"; } ?> <?php if ($thirdactive) { echo "third"; } ?> <?php if ($fourthactive) { echo "fourth"; } ?>">
            <?php if (ig_pricing_table_first_get_meta( 'ig_pricing_table_first_featured' )) {
                echo '<div class="featured">&#9733;</div>';
            } ?>
            <div class="header">
            <div class="title">
                <h3><?php echo ig_pricing_table_first_get_meta( 'ig_pricing_table_first_title' );?></h3>
            </div>
            <div class="description">
            <?php echo ig_pricing_table_first_get_meta( 'ig_pricing_table_first_short_description' );?>
            </div>
            <div class="price">
            <?php echo ig_pricing_table_first_get_meta( 'ig_pricing_table_first_price' );?>
            </div>
            </div>
            <div class="features">
                <?php
                $features = ig_pricing_table_first_get_meta( 'ig_pricing_table_first_features' );
                $list = str_replace("\n","<br /><hr class='divider'>", $features);
                echo html_entity_decode($list);
                ?>
            </div>
            <div class="button-label">
            <a class="button-link" href="<?php echo esc_url(ig_pricing_table_first_get_meta( 'ig_pricing_table_first_button_url' ));?>">
                <?php echo ig_pricing_table_first_get_meta( 'ig_pricing_table_first_button_label' );?>
            </a>
            </div>
        </div>

        <div class="pricing-table second <?php if ($secondactive) { echo "half active"; } ?> <?php if ($thirdactive) { echo "third"; } ?> <?php if ($fourthactive) { echo "fourth"; } ?>">
        <?php if (ig_pricing_table_second_get_meta( 'ig_pricing_table_second_featured' )) {
                    echo '<div class="featured">&#9733;</div>';
            } ?>
            <div class="header">
            <div class="title">
                <h3><?php echo ig_pricing_table_second_get_meta( 'ig_pricing_table_second_title' );?></h3>
            </div>
            <div class="description">
            <?php echo ig_pricing_table_second_get_meta( 'ig_pricing_table_second_short_description' );?>
            </div>
            <div class="price">
            <?php echo ig_pricing_table_second_get_meta( 'ig_pricing_table_second_price' );?>
            </div>
            </div>
            <div class="features">
                <?php
                $features = ig_pricing_table_second_get_meta( 'ig_pricing_table_second_features' );
                $list = str_replace("\n","<br /><hr class='divider'>", $features);
                echo html_entity_decode($list);
                ?>
            </div>
            <div class="button-label">
            <a class="button-link" href="<?php echo esc_url(ig_pricing_table_second_get_meta( 'ig_pricing_table_second_button_url' ));?>">
                <?php echo ig_pricing_table_second_get_meta( 'ig_pricing_table_second_button_label' );?>
            </a>
            </div>
        </div>

        <div class="pricing-table third <?php if ($thirdactive) { echo "active"; } ?> <?php if ($fourthactive) { echo "fourth"; } ?>">
            <?php if (ig_pricing_table_third_get_meta( 'ig_pricing_table_third_featured' )) {
                echo '<div class="featured">&#9733;</div>';
            } ?>
            <div class="header">
            <div class="title">
                <h3><?php echo ig_pricing_table_second_get_meta( 'ig_pricing_table_third_title' );?></h3>
            </div>
            <div class="description">
            <?php echo ig_pricing_table_third_get_meta( 'ig_pricing_table_third_short_description' );?>
            </div>
            <div class="price">
            <?php echo ig_pricing_table_third_get_meta( 'ig_pricing_table_third_price' );?>
            </div>
            </div>
            <div class="features">
                <?php
                $features = ig_pricing_table_third_get_meta( 'ig_pricing_table_third_features' );
                $list = str_replace("\n","<br /><hr class='divider'>", $features);
                echo html_entity_decode($list);
                ?>
            </div>
            <div class="button-label">
            <a class="button-link" href="<?php echo esc_url(ig_pricing_table_third_get_meta( 'ig_pricing_table_third_button_url' ));?>">
                <?php echo ig_pricing_table_third_get_meta( 'ig_pricing_table_third_button_label' );?>
            </a>
            </div>
        </div>

        <div class="pricing-table fourth <?php if ($fourthactive) { echo "active"; } ?>">
            <?php if (ig_pricing_table_fourth_get_meta( 'ig_pricing_table_fourth_featured' )) {
                echo '<div class="featured">&#9733;</div>';
            } ?>
            <div class="header">
            <div class="title">
                <h3><?php echo ig_pricing_table_second_get_meta( 'ig_pricing_table_fourth_title' );?></h3>
            </div>
            <div class="description">
            <?php echo ig_pricing_table_fourth_get_meta( 'ig_pricing_table_fourth_short_description' );?>
            </div>
            <div class="price">
            <?php echo ig_pricing_table_fourth_get_meta( 'ig_pricing_table_fourth_price' );?>
            </div>
            </div>
            <div class="features">
                <?php
                $features = ig_pricing_table_fourth_get_meta( 'ig_pricing_table_fourth_features' );
                $list = str_replace("\n","<br /><hr class='divider'>", $features);
                echo html_entity_decode($list);
                ?>
            </div>
            <div class="button-label">
            <a class="button-link" href="<?php echo esc_url(ig_pricing_table_fourth_get_meta( 'ig_pricing_table_fourth_button_url' ));?>">
                <?php echo ig_pricing_table_fourth_get_meta( 'ig_pricing_table_fourth_button_label' );?>
            </a>
            </div>
        </div>

    <?php endwhile; ?>
    <?php  wp_reset_postdata(); ?>
</div>
    <?php $cleanvar = ob_get_clean();
    return $cleanvar;
    }
}
add_shortcode( 'ig-pricing-table', 'ig_pricing_table_shortcode' );
