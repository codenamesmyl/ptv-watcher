<?php  
/*
 *	Plugin Name: PlaysTV Watcher
 *	Description: Provides both widgets and shortcodes to help display PlaysTV videos on websites.
 *	Version: 1.0
 *	Author: Jessica Harley
 *	Author URI: http://www.apricoder.com
 *	License: GPL2
 *
*/

$plugin_url = WP_PLUGIN_URL . '/ptv-watcher';
$options = array();

function ptv_watcher_menu() {
    add_options_page(
        'PlaysTV Watcher',
        'PlaysTV Watcher',
        'manage_options',
        'ptv-watcher',
        'ptv_watcher_options_page'
    );
}

add_action('admin_menu', 'ptv_watcher_menu');

function ptv_watcher_options_page(){
    // security check
    if (!current_user_can('manage_options' )){
        wp_die('You do not have access to view this page.');
    }

    global $plugin_url;
    global $options;

    if (isset($_POST['ptv_watcher_form_submitted'])){
        $hidden_field = esc_html($_POST['ptv_watcher_form_submitted']);

        if($hidden_field == 'Y') {
            $ptv_watcher_search = esc_html($_POST['ptv_watcher_search']);
            $ptv_watcher_appid = esc_html($_POST['ptv_watcher_appid']);
            $ptv_watcher_apikey = esc_html($_POST['ptv_watcher_apikey']);

            $ptv_watcher_results = ptv_watcher_get_results($ptv_watcher_search, $ptv_watcher_appid, $ptv_watcher_apikey);

            $options['ptv_watcher_search'] = $ptv_watcher_search;
            $options['ptv_watcher_appid'] = $ptv_watcher_appidy;
            $options['ptv_watcher_apikey'] = $ptv_watcher_apikey;
            $options['last_updated'] = time();

            $options['ptv_watcher_results'] = $ptv_watcher_results;

            update_option('ptv_watcher_videos', $options);
        }
    }

    $options = get_option('ptv_watcher_videos');

    if ($options != ''){
        $ptv_watcher_search = $options['ptv_watcher_search'];
        $ptv_watcher_appid = $options['ptv_watcher_appid'];
        $ptv_watcher_apikey = $options['ptv_watcher_apikey'];
    }
    require('inc/options-page-wrapper.php');
}

function ptv_watcher_get_results($ptv_watcher_search, $ptv_watcher_apikey){

    $json_feed_url = 'https://api.plays.tv/data/v1/videos/search?appid=' . $ptv_watcher_appid . '&appkey=' . $ptv_watcher_apikey . '&' . $ptv_watcher_search;

    $json_feed = wp_remote_get($json_feed_url);

    $ptv_watcher_results = json_decode($json_feed['body']);

    var_dump($ptv_watcher_results);

    return $ptv_watcher_results;

}
function ptv_watcher_backend_styles() {
    wp_enqueue_style('ptv_watcher_backend_css', plugins_url('ptv-watcher/ptv-watcher.css'));
}

add_action('admin_head', 'ptv_watcher_backend_styles');

?>