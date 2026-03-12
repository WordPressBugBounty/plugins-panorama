<?php

add_action( 'admin_enqueue_scripts', 'custom_admin_style' );
add_action('admin_menu', 'bppiv_add_submenu_page');
add_action( 'admin_enqueue_scripts', 'adminEnqueueScripts' );

function custom_admin_style() {
    wp_register_style( 'bppiv_admin_custom_css', plugin_dir_url(__FILE__) . 'style.css', false, BPPIV_VERSION );
    wp_enqueue_style( 'bppiv_admin_custom_css' );
}

function bppiv_add_submenu_page(){
    add_submenu_page(
        'edit.php?post_type=bppiv-image-viewer',
        'Help & Demos',
        '<span style="color: #f18500; font-weight: 600;">Help & Demos</span>', 
        'manage_options', 
        'bppiv-support',
        'renderCurrentDashboardPage'
    );
}

function renderCurrentDashboardPage(){ ?>
    <div
        id='bppivCurrentDashboard'
        data-info='<?php echo esc_attr( wp_json_encode( [
            'version' => BPPIV_VERSION,
            'isPremium' => panoramaIsPremium(),
            'hasPro' => BPPIV_HAS_PRO,
             'licenseActiveNonce' => wp_create_nonce( 'bPlLicenseActivation' ),
             'nonce' => wp_create_nonce( 'bppiv_admin_nonce' ),
             'action' => 'bppivGetBlocks',
        ] ) ); ?>'
    ></div>
<?php }

function adminEnqueueScripts( $screen ) {

    if( $screen == 'bppiv-image-viewer_page_bppiv-support'){
        wp_enqueue_style( 'current-admin-dashboard', BPPIV_PLUGIN_DIR . 'build/admin-dashboard.css', [], BPPIV_VERSION );
        wp_enqueue_script( 'current-admin-dashboard', BPPIV_PLUGIN_DIR . 'build/admin-dashboard.js', [ 'react', 'react-dom', 'wp-util' ], BPPIV_VERSION, true );
    }

    $current = function_exists('get_current_screen') ? get_current_screen() : null;
    $post_type = $current && isset($current->post_type) ? $current->post_type : '';

    if ( in_array( $post_type, ['bppiv-image-viewer', 'virtual_tour', 'product_spot', 'product'], true ) ) {
        wp_enqueue_script('current-admin-post', BPPIV_PLUGIN_DIR . 'build/admin-post.js', [], BPPIV_VERSION);
        wp_enqueue_style('current-admin-post', BPPIV_PLUGIN_DIR . 'build/admin-post.css', [], BPPIV_VERSION);
    }
}


  






