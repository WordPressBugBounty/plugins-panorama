<?php

/**
 * Plugin Name: Panorama
 * Description: A lite Weight Plugin that helps you, Easily display panoramic 360 degree images / videos into WordPress Website in Post, Page, Widget Area using shortCode. 
 * Plugin URI:  https://wordpress.org/plugins/
 * Version:    1.2.1
 * Author: bPlugins
 * Author URI: http://abuhayatpolash.com
 * License: GPLv3
 * Text Domain: panorama-viewer
 * Domain Path:  /languages
 */
// Security check
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
if ( function_exists( 'panorama_fs' ) ) {
    panorama_fs()->set_basename( false, __FILE__ );
} else {
    if ( !function_exists( 'panorama_fs' ) ) {
        // ... Freemius integration snippet ...
        function panorama_fs() {
            global $panorama_fs;
            if ( !isset( $panorama_fs ) ) {
                if ( !defined( 'WP_FS__PRODUCT_8824_MULTISITE' ) ) {
                    define( 'WP_FS__PRODUCT_8824_MULTISITE', true );
                }
                // Include Freemius SDK.
                require_once dirname( __FILE__ ) . '/freemius/start.php';
                $panorama_fs = fs_dynamic_init( array(
                    'id'             => '8824',
                    'slug'           => 'panorama',
                    'type'           => 'plugin',
                    'public_key'     => 'pk_a112d1d1d66d3b480dbea5690d3ff',
                    'is_premium'     => false,
                    'premium_suffix' => 'Pro',
                    'has_addons'     => false,
                    'has_paid_plans' => true,
                    'trial'          => array(
                        'days'               => 7,
                        'is_require_payment' => false,
                    ),
                    'menu'           => array(
                        'slug'       => 'edit.php?post_type=bppiv-image-viewer',
                        'first-path' => 'edit.php?post_type=bppiv-image-viewer&page=bppiv-support',
                    ),
                    'is_live'        => true,
                ) );
            }
            return $panorama_fs;
        }

        // Init Freemius.
        panorama_fs();
        // Signal that SDK was initiated.
        do_action( 'panorama_fs_loaded' );
    }
    // ... Your plugin's main file logic ...
    /* Plugin Initialization */
    define( 'BPPIV_PLUGIN_DIR', plugin_dir_url( __FILE__ ) );
    define( 'BPPIV_VERSION', ( isset( $_SERVER['HTTP_HOST'] ) && $_SERVER['HTTP_HOST'] === 'localhost' ? time() : '1.2.1' ) );
    defined( 'BPPIV_PATH' ) or define( 'BPPIV_PATH', plugin_dir_path( __FILE__ ) );
    defined( 'BPPIV__FILE__' ) or define( 'BPPIV__FILE__', __FILE__ );
    add_action( 'plugin_loaded', 'bppiv_textdomain' );
    function bppiv_textdomain() {
        load_textdomain( 'panorama-viewer', BPPIV_PLUGIN_DIR . 'languages' );
    }

    add_action( 'init', 'onInit' );
    function onInit() {
        register_block_type( __DIR__ . '/build/blocks/parent' );
        register_block_type( __DIR__ . '/build/blocks/image-360' );
        register_block_type( __DIR__ . '/build/blocks/image-3d' );
        register_block_type( __DIR__ . '/build/blocks/video' );
        register_block_type( __DIR__ . '/build/blocks/video-360' );
        register_block_type( __DIR__ . '/build/blocks/google-street' );
        register_block_type( __DIR__ . '/build/blocks/gallery' );
        register_block_type( __DIR__ . '/build/blocks/tour' );
        register_block_type( __DIR__ . '/build/blocks/gutenberg-block' );
    }

    add_action( 'wp_ajax_panoramaPremiumChecker', 'panoramaPremiumChecker' );
    add_action( 'wp_ajax_nopriv_panoramaPremiumChecker', 'panoramaPremiumChecker' );
    add_action( 'admin_init', 'registerSettings' );
    add_action( 'rest_api_init', 'registerSettings' );
    add_action( 'admin_enqueue_scripts', 'demoEnqueueScripts' );
    function panoramaIsPremium() {
        return panorama_fs()->can_use_premium_code();
    }

    function panoramaPremiumChecker() {
        $nonce = sanitize_text_field( $_POST['_wpnonce'] ?? null );
        if ( !wp_verify_nonce( $nonce, 'wp_rest' ) ) {
            wp_send_json_error( 'Invalid Request' );
        }
        wp_send_json_success( [
            'isPipe' => panoramaIsPremium(),
        ] );
    }

    function registerSettings() {
        register_setting( 'panoramaUtils', 'panoramaUtils', [
            'show_in_rest'      => [
                'name'   => 'panoramaUtils',
                'schema' => [
                    'type' => 'string',
                ],
            ],
            'type'              => 'string',
            'default'           => wp_json_encode( [
                'nonce' => wp_create_nonce( 'wp_ajax' ),
            ] ),
            'sanitize_callback' => 'sanitize_text_field',
        ] );
    }

    function demoEnqueueScripts(  $screen  ) {
        if ( $screen == 'bppiv-image-viewer_page_bppiv-support' ) {
            wp_enqueue_script(
                'ppiv-demo',
                BPPIV_PLUGIN_DIR . 'build/demo.js',
                [
                    'react',
                    'react-dom',
                    "wp-api",
                    "wp-util"
                ],
                BPPIV_VERSION
            );
            wp_enqueue_style(
                'ppiv-demo',
                BPPIV_PLUGIN_DIR . 'build/demo.css',
                [],
                BPPIV_VERSION
            );
        }
        wp_enqueue_script(
            'ppiv-shortCodeAsset-js',
            BPPIV_PLUGIN_DIR . 'build/shortCodeAsset.js',
            [],
            BPPIV_VERSION
        );
        wp_enqueue_style(
            'ppiv-shortCodeAsset-css',
            BPPIV_PLUGIN_DIR . 'build/shortCodeAsset.css',
            [],
            BPPIV_VERSION
        );
    }

    //  FRAMEWORK + OTHER INCLUDES
    require_once 'inc/csf/codestar-framework.php';
    require_once 'admin/ads/submenu.php';
    $init_file = BPPIV_PATH . 'inc/Init.php';
    if ( file_exists( $init_file ) ) {
        require_once $init_file;
    }
    if ( class_exists( 'BPPIV\\Init' ) ) {
        \BPPIV\Init::instance();
    }
    function bppiv_get_woo_template(  $template  ) {
        $path = BPPIV_PATH . 'inc/Woocommerce/template/' . $template;
        if ( file_exists( $path ) ) {
            require $path;
        }
    }

    // get values from csf
    function bppiv_isset(  $array  ) {
        return function (
            $key1,
            $isBoolean = false,
            $default = false,
            $key2 = ''
        ) use($array) {
            if ( isset( $array[$key1][$key2] ) ) {
                return ( $isBoolean ? (bool) $array[$key1][$key2] : $array[$key1][$key2] );
            }
            if ( isset( $array[$key1] ) ) {
                return ( $isBoolean ? (bool) $array[$key1] : $array[$key1] );
            }
            return $default;
        };
    }

    require_once 'shortcode.php';
    //free version
    if ( panorama_fs()->is_free_plan() ) {
        require_once 'inc/metabox-options-free.php';
    }
}