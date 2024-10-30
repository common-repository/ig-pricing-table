<?php
// Register Custom Post Type
function ig_pricing_table_post_type() {

    $labels = array(
        'name'                => _x( 'Pricing Tables', 'Post Type General Name', 'ig-pricing-table' ),
        'singular_name'       => _x( 'Pricing Table', 'Post Type Singular Name', 'ig-pricing-table' ),
        'menu_name'           => __( 'Pricing Table', 'ig-pricing-table' ),
        'name_admin_bar'      => __( 'Pricing Table', 'ig-pricing-table' ),
        'parent_item_colon'   => __( 'Parent Pricing Table:', 'ig-pricing-table' ),
        'all_items'           => __( 'All Pricing Tables', 'ig-pricing-table' ),
        'add_new_item'        => __( 'Add New Pricing Table', 'ig-pricing-table' ),
        'add_new'             => __( 'Add New', 'ig-pricing-table' ),
        'new_item'            => __( 'New Pricing Table', 'ig-pricing-table' ),
        'edit_item'           => __( 'Edit Pricing Table', 'ig-pricing-table' ),
        'update_item'         => __( 'Update Pricing Table', 'ig-pricing-table' ),
        'view_item'           => __( 'View Pricing Table', 'ig-pricing-table' ),
        'search_items'        => __( 'Search Pricing Table', 'ig-pricing-table' ),
        'not_found'           => __( 'Not found', 'ig-pricing-table' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'ig-pricing-table' ),
    );
    $rewrite = array(
        'slug'                => 'pricing-table',
        'with_front'          => true,
        'pages'               => false,
        'feeds'               => false,
    );
    $args = array(
        'label'               => __( 'Pricing Table', 'ig-pricing-table' ),
        'description'         => __( 'Simple and clean pricing table', 'ig-pricing-table' ),
        'labels'              => $labels,
        'supports'            => array( 'custom-fields','title', ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-plus',
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => true,
        'publicly_queryable'  => true,
        'rewrite'             => $rewrite,
        'capability_type'     => 'post',
    );
    register_post_type( 'ig_pricing_table', $args );
    flush_rewrite_rules();
}
add_action( 'init', 'ig_pricing_table_post_type', 0 );
/* END */
?>
