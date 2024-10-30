<?php
add_action( 'admin_print_scripts-post-new.php', 'ig_pricing_table_admin_script', 11 );
add_action( 'admin_print_scripts-post.php', 'ig_pricing_table_admin_script', 11 );

function ig_pricing_table_admin_script() {
    global $post_type;
    if( 'ig_pricing_table' == $post_type )
    wp_enqueue_style( 'ig-pricing-table', plugin_dir_url( __FILE__ ) . '../css/admin.css' );
}

// COLUMN
add_filter('manage_ig_pricing_table_posts_columns', 'ig_pricing_table_columns');
function ig_pricing_table_columns($defaults){
    $defaults['ig_pricing_table_shortcode'] = __('Shortcode');
    return $defaults;
}
//render the column
add_action('manage_ig_pricing_table_posts_custom_column', 'ig_pricing_table_custom_columns', 5, 2);
function ig_pricing_table_custom_columns($column_name, $post_id){
    if($column_name === 'ig_pricing_table_shortcode'){
            echo '[ig-pricing-table id="' .  get_the_ID() . '"]';
    } }

/*Meta Box*/
function ig_pricing_table_first_get_meta( $value ) {
    global $post;

    $field = get_post_meta( $post->ID, $value, true );
    if ( ! empty( $field ) ) {
        return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
    } else {
        return false;
    }
}

function ig_pricing_table_first_add_meta_box() {
    add_meta_box(
        'ig_pricing_table_first-ig-pricing-table-first',
        '<span class="num">01</span> <span class="title">'. esc_html__( 'IG Pricing Table First', 'ig_pricing_table_first' ) .'</span>',
        'ig_pricing_table_first_html',
        'ig_pricing_table',
        'normal',
        'default'
    );
}
add_action( 'add_meta_boxes', 'ig_pricing_table_first_add_meta_box' );

function ig_pricing_table_first_html( $post) {
    wp_nonce_field( '_ig_pricing_table_first_nonce', 'ig_pricing_table_first_nonce' );
    $number="first";
    include('ig-pricing-table-form.php');?>
    
<?php
}

function ig_pricing_table_first_save( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! isset( $_POST['ig_pricing_table_first_nonce'] ) || ! wp_verify_nonce( $_POST['ig_pricing_table_first_nonce'], '_ig_pricing_table_first_nonce' ) ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    if ( isset( $_POST['ig_pricing_table_first_active'] ) )
        update_post_meta( $post_id, 'ig_pricing_table_first_active', esc_attr( $_POST['ig_pricing_table_first_active'] ) );
    else
        update_post_meta( $post_id, 'ig_pricing_table_first_active', null );
    if ( isset( $_POST['ig_pricing_table_first_title'] ) )
        update_post_meta( $post_id, 'ig_pricing_table_first_title', esc_attr( $_POST['ig_pricing_table_first_title'] ) );
    if ( isset( $_POST['ig_pricing_table_first_short_description'] ) )
        update_post_meta( $post_id, 'ig_pricing_table_first_short_description', esc_attr( $_POST['ig_pricing_table_first_short_description'] ) );
    if ( isset( $_POST['ig_pricing_table_first_price'] ) )
        update_post_meta( $post_id, 'ig_pricing_table_first_price', esc_attr( $_POST['ig_pricing_table_first_price'] ) );
    if ( isset( $_POST['ig_pricing_table_first_features'] ) )
        update_post_meta( $post_id, 'ig_pricing_table_first_features', esc_attr( $_POST['ig_pricing_table_first_features'] ) );
    if ( isset( $_POST['ig_pricing_table_first_button_label'] ) )
        update_post_meta( $post_id, 'ig_pricing_table_first_button_label', esc_attr( $_POST['ig_pricing_table_first_button_label'] ) );
    if ( isset( $_POST['ig_pricing_table_first_button_url'] ) )
        update_post_meta( $post_id, 'ig_pricing_table_first_button_url', esc_attr( $_POST['ig_pricing_table_first_button_url'] ) );
    if ( isset( $_POST['ig_pricing_table_first_featured'] ) )
        update_post_meta( $post_id, 'ig_pricing_table_first_featured', esc_attr( $_POST['ig_pricing_table_first_featured'] ) );
    else
        update_post_meta( $post_id, 'ig_pricing_table_first_featured', null );
}
add_action( 'save_post', 'ig_pricing_table_first_save' );

/*
    Usage: ig_pricing_table_first_get_meta( 'ig_pricing_table_first_active' )
    Usage: ig_pricing_table_first_get_meta( 'ig_pricing_table_first_title' )
    Usage: ig_pricing_table_first_get_meta( 'ig_pricing_table_first_short_description' )
    Usage: ig_pricing_table_first_get_meta( 'ig_pricing_table_first_price' )
    Usage: ig_pricing_table_first_get_meta( 'ig_pricing_table_first_features' )
    Usage: ig_pricing_table_first_get_meta( 'ig_pricing_table_first_button_label' )
    Usage: ig_pricing_table_first_get_meta( 'ig_pricing_table_first_button_url' )
    Usage: ig_pricing_table_first_get_meta( 'ig_pricing_table_first_featured' )
*/
function ig_pricing_table_second_get_meta( $value ) {
    global $post;

    $field = get_post_meta( $post->ID, $value, true );
    if ( ! empty( $field ) ) {
        return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
    } else {
        return false;
    }
}

function ig_pricing_table_second_add_meta_box() {
    add_meta_box(
        'ig_pricing_table_second-ig-pricing-table-second',
        '<span class="num">02</span> <span class="title">'. esc_html__( 'IG Pricing Table Second', 'ig_pricing_table_second' ) .'</span>',
        'ig_pricing_table_second_html',
        'ig_pricing_table',
        'normal',
        'default'
    );
}
add_action( 'add_meta_boxes', 'ig_pricing_table_second_add_meta_box' );

function ig_pricing_table_second_html( $post) {
    wp_nonce_field( '_ig_pricing_table_second_nonce', 'ig_pricing_table_second_nonce' );
    $number="second";
    include('ig-pricing-table-form.php');?>
<?php
}

function ig_pricing_table_second_save( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! isset( $_POST['ig_pricing_table_second_nonce'] ) || ! wp_verify_nonce( $_POST['ig_pricing_table_second_nonce'], '_ig_pricing_table_second_nonce' ) ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    if ( isset( $_POST['ig_pricing_table_second_active'] ) )
        update_post_meta( $post_id, 'ig_pricing_table_second_active', esc_attr( $_POST['ig_pricing_table_second_active'] ) );
    else
        update_post_meta( $post_id, 'ig_pricing_table_second_active', null );
    if ( isset( $_POST['ig_pricing_table_second_title'] ) )
        update_post_meta( $post_id, 'ig_pricing_table_second_title', esc_attr( $_POST['ig_pricing_table_second_title'] ) );
    if ( isset( $_POST['ig_pricing_table_second_short_description'] ) )
        update_post_meta( $post_id, 'ig_pricing_table_second_short_description', esc_attr( $_POST['ig_pricing_table_second_short_description'] ) );
    if ( isset( $_POST['ig_pricing_table_second_price'] ) )
        update_post_meta( $post_id, 'ig_pricing_table_second_price', esc_attr( $_POST['ig_pricing_table_second_price'] ) );
    if ( isset( $_POST['ig_pricing_table_second_features'] ) )
        update_post_meta( $post_id, 'ig_pricing_table_second_features', esc_attr( $_POST['ig_pricing_table_second_features'] ) );
    if ( isset( $_POST['ig_pricing_table_second_button_label'] ) )
        update_post_meta( $post_id, 'ig_pricing_table_second_button_label', esc_attr( $_POST['ig_pricing_table_second_button_label'] ) );
    if ( isset( $_POST['ig_pricing_table_second_button_url'] ) )
        update_post_meta( $post_id, 'ig_pricing_table_second_button_url', esc_attr( $_POST['ig_pricing_table_second_button_url'] ) );
    if ( isset( $_POST['ig_pricing_table_second_featured'] ) )
        update_post_meta( $post_id, 'ig_pricing_table_second_featured', esc_attr( $_POST['ig_pricing_table_second_featured'] ) );
    else
        update_post_meta( $post_id, 'ig_pricing_table_second_featured', null );
}
add_action( 'save_post', 'ig_pricing_table_second_save' );

/*
    Usage: ig_pricing_table_second_get_meta( 'ig_pricing_table_second_active' )
    Usage: ig_pricing_table_second_get_meta( 'ig_pricing_table_second_title' )
    Usage: ig_pricing_table_second_get_meta( 'ig_pricing_table_second_short_description' )
    Usage: ig_pricing_table_second_get_meta( 'ig_pricing_table_second_price' )
    Usage: ig_pricing_table_second_get_meta( 'ig_pricing_table_second_features' )
    Usage: ig_pricing_table_second_get_meta( 'ig_pricing_table_second_button_label' )
    Usage: ig_pricing_table_second_get_meta( 'ig_pricing_table_second_button_url' )
    Usage: ig_pricing_table_second_get_meta( 'ig_pricing_table_second_featured' )
*/
function ig_pricing_table_third_get_meta( $value ) {
    global $post;

    $field = get_post_meta( $post->ID, $value, true );
    if ( ! empty( $field ) ) {
        return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
    } else {
        return false;
    }
}

function ig_pricing_table_third_add_meta_box() {
    add_meta_box(
        'ig_pricing_table_third-ig-pricing-table-third',
        '<span class="num">03</span> <span class="title">'. esc_html__( 'IG Pricing Table Third', 'ig_pricing_table_third' ) .'</span>',
        'ig_pricing_table_third_html',
        'ig_pricing_table',
        'normal',
        'default'
    );
}
add_action( 'add_meta_boxes', 'ig_pricing_table_third_add_meta_box' );

function ig_pricing_table_third_html( $post) {
    wp_nonce_field( '_ig_pricing_table_third_nonce', 'ig_pricing_table_third_nonce' );
    $number="third";
    include('ig-pricing-table-form.php');?>
<?php
}

function ig_pricing_table_third_save( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! isset( $_POST['ig_pricing_table_third_nonce'] ) || ! wp_verify_nonce( $_POST['ig_pricing_table_third_nonce'], '_ig_pricing_table_third_nonce' ) ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    if ( isset( $_POST['ig_pricing_table_third_active'] ) )
        update_post_meta( $post_id, 'ig_pricing_table_third_active', esc_attr( $_POST['ig_pricing_table_third_active'] ) );
    else
        update_post_meta( $post_id, 'ig_pricing_table_third_active', null );
    if ( isset( $_POST['ig_pricing_table_third_title'] ) )
        update_post_meta( $post_id, 'ig_pricing_table_third_title', esc_attr( $_POST['ig_pricing_table_third_title'] ) );
    if ( isset( $_POST['ig_pricing_table_third_short_description'] ) )
        update_post_meta( $post_id, 'ig_pricing_table_third_short_description', esc_attr( $_POST['ig_pricing_table_third_short_description'] ) );
    if ( isset( $_POST['ig_pricing_table_third_price'] ) )
        update_post_meta( $post_id, 'ig_pricing_table_third_price', esc_attr( $_POST['ig_pricing_table_third_price'] ) );
    if ( isset( $_POST['ig_pricing_table_third_features'] ) )
        update_post_meta( $post_id, 'ig_pricing_table_third_features', esc_attr( $_POST['ig_pricing_table_third_features'] ) );
    if ( isset( $_POST['ig_pricing_table_third_button_label'] ) )
        update_post_meta( $post_id, 'ig_pricing_table_third_button_label', esc_attr( $_POST['ig_pricing_table_third_button_label'] ) );
    if ( isset( $_POST['ig_pricing_table_third_button_url'] ) )
        update_post_meta( $post_id, 'ig_pricing_table_third_button_url', esc_attr( $_POST['ig_pricing_table_third_button_url'] ) );
    if ( isset( $_POST['ig_pricing_table_third_featured'] ) )
        update_post_meta( $post_id, 'ig_pricing_table_third_featured', esc_attr( $_POST['ig_pricing_table_third_featured'] ) );
    else
        update_post_meta( $post_id, 'ig_pricing_table_third_featured', null );
}
add_action( 'save_post', 'ig_pricing_table_third_save' );

/*
    Usage: ig_pricing_table_third_get_meta( 'ig_pricing_table_third_active' )
    Usage: ig_pricing_table_third_get_meta( 'ig_pricing_table_third_title' )
    Usage: ig_pricing_table_third_get_meta( 'ig_pricing_table_third_short_description' )
    Usage: ig_pricing_table_third_get_meta( 'ig_pricing_table_third_price' )
    Usage: ig_pricing_table_third_get_meta( 'ig_pricing_table_third_features' )
    Usage: ig_pricing_table_third_get_meta( 'ig_pricing_table_third_button_label' )
    Usage: ig_pricing_table_third_get_meta( 'ig_pricing_table_third_button_url' )
    Usage: ig_pricing_table_third_get_meta( 'ig_pricing_table_third_featured' )
*/
function ig_pricing_table_fourth_get_meta( $value ) {
    global $post;

    $field = get_post_meta( $post->ID, $value, true );
    if ( ! empty( $field ) ) {
        return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
    } else {
        return false;
    }
}

function ig_pricing_table_fourth_add_meta_box() {
    add_meta_box(
        'ig_pricing_table_fourth-ig-pricing-table-fourth',
        '<span class="num">04</span> <span class="title">'. esc_html__( 'IG Pricing Table Fourth', 'ig_pricing_table_fourth' ) .'</span>',
        'ig_pricing_table_fourth_html',
        'ig_pricing_table',
        'normal',
        'default'
    );
}
add_action( 'add_meta_boxes', 'ig_pricing_table_fourth_add_meta_box' );

function ig_pricing_table_fourth_html( $post) {
    wp_nonce_field( '_ig_pricing_table_fourth_nonce', 'ig_pricing_table_fourth_nonce' );
    $number="fourth";
    include('ig-pricing-table-form.php');?>
<?php
}

function ig_pricing_table_fourth_save( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! isset( $_POST['ig_pricing_table_fourth_nonce'] ) || ! wp_verify_nonce( $_POST['ig_pricing_table_fourth_nonce'], '_ig_pricing_table_fourth_nonce' ) ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    if ( isset( $_POST['ig_pricing_table_fourth_active'] ) )
        update_post_meta( $post_id, 'ig_pricing_table_fourth_active', esc_attr( $_POST['ig_pricing_table_fourth_active'] ) );
    else
        update_post_meta( $post_id, 'ig_pricing_table_fourth_active', null );
    if ( isset( $_POST['ig_pricing_table_fourth_title'] ) )
        update_post_meta( $post_id, 'ig_pricing_table_fourth_title', esc_attr( $_POST['ig_pricing_table_fourth_title'] ) );
    if ( isset( $_POST['ig_pricing_table_fourth_short_description'] ) )
        update_post_meta( $post_id, 'ig_pricing_table_fourth_short_description', esc_attr( $_POST['ig_pricing_table_fourth_short_description'] ) );
    if ( isset( $_POST['ig_pricing_table_fourth_price'] ) )
        update_post_meta( $post_id, 'ig_pricing_table_fourth_price', esc_attr( $_POST['ig_pricing_table_fourth_price'] ) );
    if ( isset( $_POST['ig_pricing_table_fourth_features'] ) )
        update_post_meta( $post_id, 'ig_pricing_table_fourth_features', esc_attr( $_POST['ig_pricing_table_fourth_features'] ) );
    if ( isset( $_POST['ig_pricing_table_fourth_button_label'] ) )
        update_post_meta( $post_id, 'ig_pricing_table_fourth_button_label', esc_attr( $_POST['ig_pricing_table_fourth_button_label'] ) );
    if ( isset( $_POST['ig_pricing_table_fourth_button_url'] ) )
        update_post_meta( $post_id, 'ig_pricing_table_fourth_button_url', esc_attr( $_POST['ig_pricing_table_fourth_button_url'] ) );
    if ( isset( $_POST['ig_pricing_table_fourth_featured'] ) )
        update_post_meta( $post_id, 'ig_pricing_table_fourth_featured', esc_attr( $_POST['ig_pricing_table_fourth_featured'] ) );
    else
        update_post_meta( $post_id, 'ig_pricing_table_fourth_featured', null );
}
add_action( 'save_post', 'ig_pricing_table_fourth_save' );

/*
    Usage: ig_pricing_table_fourth_get_meta( 'ig_pricing_table_fourth_active' )
    Usage: ig_pricing_table_fourth_get_meta( 'ig_pricing_table_fourth_title' )
    Usage: ig_pricing_table_fourth_get_meta( 'ig_pricing_table_fourth_short_description' )
    Usage: ig_pricing_table_fourth_get_meta( 'ig_pricing_table_fourth_price' )
    Usage: ig_pricing_table_fourth_get_meta( 'ig_pricing_table_fourth_features' )
    Usage: ig_pricing_table_fourth_get_meta( 'ig_pricing_table_fourth_button_label' )
    Usage: ig_pricing_table_fourth_get_meta( 'ig_pricing_table_fourth_button_url' )
    Usage: ig_pricing_table_fourth_get_meta( 'ig_pricing_table_fourth_featured' )
*/
