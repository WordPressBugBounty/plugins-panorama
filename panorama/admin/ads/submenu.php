<?php

add_action( 'admin_enqueue_scripts', 'bppiv_enqueue_custom_admin_style' );

function bppiv_enqueue_custom_admin_style() {
    wp_register_style( 'bppiv_admin_custom_css', plugin_dir_url(__FILE__) . 'style.css', false, BPPIV_VERSION );
    wp_enqueue_style( 'bppiv_admin_custom_css' );
}

add_action('admin_menu', 'bppiv_support_page');

function bppiv_support_page(){
    add_submenu_page(
        'edit.php?post_type=bppiv-image-viewer',
        'Demo and Help',
        'Demo and Help', 
        'manage_options', 
        'bppiv-support',
        'bppiv_dashboard_page_callback'
    );
}

function renderTemplate($content){
			$parseBlocks = parse_blocks($content);
			return render_block($parseBlocks[0]);
}

function bppiv_dashboard_page_callback(){
    $dashboardData = [
        "version" => BPPIV_VERSION,
        "logo"	=> 'https://ps.w.org/panorama/assets/icon-256x256.png?rev=2644641',
        "isPremium" => panoramaIsPremium(),
    ];

    $img3d = BPPIV_PLUGIN_DIR . 'public/assets/img/panorama-3d.jpg';
    $img360 = BPPIV_PLUGIN_DIR . 'public/assets/img/panorama-360.jpg';
    $imgtour = BPPIV_PLUGIN_DIR . 'public/assets/img/panorama-tour.jpg';
    $img1 = BPPIV_PLUGIN_DIR . 'public/assets/img/p1.jpg';
    $img2 = BPPIV_PLUGIN_DIR . 'public/assets/img/p2.jpg';
    $img3 = BPPIV_PLUGIN_DIR . 'public/assets/img/p3.jpg';
    $img4 = BPPIV_PLUGIN_DIR . 'public/assets/img/p4.jpg';
    $video = BPPIV_PLUGIN_DIR . 'public/assets/video/panorama-video.mp4';

    ?>
        <style>
            #wpfooter {
                position: relative;
            }
        </style>

        <div id="ppivAdminDashboard" data-dashboard="<?php echo esc_attr( wp_json_encode( $dashboardData )  ); ?>">
            <div class="renderDashboard"></div>
                <div class="templates" style="visibility: hidden;">
                        <div class="image-3d">
                            <?php echo renderTemplate('<!-- wp:panorama/image-3d {
                            "imageUrl":"'.$img3d.'",
                            "options":{
                                "autoRotate":true,
                                "autoRotateSpeed":0.3,
                                "autoRotateInactivityDelay":3000,
                                "hideDefaultCtrl":false,
                                "initialView":true,
                                "initialPosition":{"x":-57.81867801975812,"y":8.722165569992336,"z":-121.7926237496228},
                                "isDeviceMotion":true
                            }
                            } /-->'); ?>
                        </div>    
                        <div class="image-360">
                            <?php echo renderTemplate('<!-- wp:panorama/image-360 {
                            "imageUrl":"'.$img360.'",
                            "options":{
                                "isRotate": true,
                                "autoRotateSpeed": 2,
                                "autoRotateInactivityDelay": 3000,
                                "hideDefaultCtrl": false,
                                "initialView": true,
                                "initialViewPosition":{
                                "pitch": 0,
                                "yaw": 0,
                                "hfov": 120
                                },
                                "autoLoad": true,
                                "draggable": true,
                                "compass": true,
                                "titleAuthor":true,
                                "title":"360° Image",
                                "author":"bPlugins",
                                "mouseZoom": true,
                                "disableKeyboardCtrl": false,
                                "doubleClickZoom": true}
                            } /-->'); ?>
                        </div>
                        <div class="video">
                            <?php echo renderTemplate('<!-- wp:panorama/video {
                            "videoUrl":"'.$video.'",
                            "options":{"autoplay":false,"muted":false,"loop":true,"controlBar":true,"fullscreen":true,"setting":true,"video":true,"initialView":false,"initialPosition":{"x":0,"y":0,"z":120}}} /-->'); ?>
                        </div>
                        <div class="video-360">
                            <?php echo renderTemplate('<!-- wp:panorama/video-360 {
                                "videoUrl":"'.$video.'",
                                "options":{
                                    "autoplay": true,
                                    "loop": true,
                                    "play": true,
                                    "progress": true,
                                    "volume": true,
                                    "remainingTime":true,
                                    "pip":true,
                                    "fullscreen":true,
                                    "playbackSpeed":true
                                }
                            } /-->'); ?>
                        </div>
                        <div class="gallery">
                            <?php echo renderTemplate('<!-- wp:panorama/gallery {
                            "galleries":[
                                            {
                                                "img":"'.$img1.'",
                                                "isSetVideo":false,
                                                "video":"'.$video.'"
                                            },
                                            {
                                                "img":"'.$img2.'",
                                                "isSetVideo":true,
                                                "video":"'.$video.'"
                                            },
                                            {
                                                "img":"'.$img3.'",
                                                "isSetVideo":true,
                                                "video":"'.$video.'"
                                            },
                                            {
                                                "img":"'.$img4.'",
                                                "isSetVideo":true,
                                                "video":"'.$video.'"
                                            },
                                            {
                                                "img":"'.$img360.'",
                                                "isSetVideo":true,
                                                "video":"'.$video.'"
                                            }
                                        ],
                                        "galleryLimit":4
                                    } /-->'); ?>
                        </div>
                        <div class="tour-360">
                            <?php echo renderTemplate('<!-- wp:panorama/tour {
                            "tour_360":[
                                        {
                                            "tour_id":"house",
                                            "tour_img":"'.$img3.'",
                                            "tourTitleAuthor":true,
                                            "title":"Spring House or Dairy",
                                            "author":"bPlugins",
                                            "tour_hotSpot":true,
                                            "hotSpot_txt":"Spring House",
                                            "target_id":"house2",
                                            "default_data":true
                                        },
                                        {
                                            "tour_id":"house2",
                                            "tour_img":"'.$img1.'",
                                            "tourTitleAuthor":true,
                                            "title":"Wonderful House",
                                            "author":"Shamim",
                                            "tour_hotSpot":true,
                                            "hotSpot_txt":"Wonderful House",
                                            "target_id":"house",
                                            "default_data":false
                                        }
                                    ],
                                "options":{
                                        "isRotate":true,
                                        "autoRotateSpeed":2,
                                        "autoRotateInactivityDelay":3000,
                                        "hideDefaultCtrl":false,
                                        "initialView":false,
                                        "initialViewPosition":{"pitch":0,"yaw":0,"hfov":120},
                                        "autoLoad":true,
                                        "draggable":true,
                                        "compass":true,
                                        "mouseZoom":true,
                                        "disableKeyboardCtrl":false,
                                        "doubleClickZoom":true
                                    }
                            } /-->'); ?>
                        </div>
                        <div class="google-street">
                            <?php echo renderTemplate('<!-- wp:panorama/google-street {
                                "panoId":"JmSoPsBPhqWvaBmOqfFzgA",
                                "options":{
                                    "autoRotate":true,
                                    "autoRotateSpeed":0.3,
                                    "autoRotateActivationDuration":3000,
                                    "hideDefaultCtrl":false,
                                    "draggble_mouseZoom":true,
                                    "initialView":true,
                                    "initialPosition":{"x":-124.31274009531661,"y":-8.949999999999973,"z":52.141720819264854}
                                }
                            } /-->'); ?>
                        </div>
                        
                </div>
            </div>
        </div>
    <?php
}







