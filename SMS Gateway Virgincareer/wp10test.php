<?php

/**
 * The plugin file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://virgincareer.lk
 * @since             1.0.0
 * @package           Virgin SMS
 *
 * @wordpress-plugin
 	* Plugin Name: Virgin-SMS 
	* Plugin URI: https://virgincareer.com/services/
	* Author: Virgincareer production (Pvt) Ltd
	* Author URI: https://virgincareer.com/
	* Version: 1.0.0
	* Text Domain: Virgin SMS
	* Description: An SMS gateway to send sms to user's mobile numbers using "Virgincareer production" provided user credintials
 */


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'Virgin SMS', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp10test-activator.php
 */
function activate_wp10test() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp10test-activator.php';
	Wp10Test_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp10test-deactivator.php
 */
function deactivate_wp10test() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp10test-deactivator.php';
	Wp10Test_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp10test' );
register_deactivation_hook( __FILE__, 'deactivate_wp10test' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp10test.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wp10test() {

	$plugin = new Wp10Test();
	$plugin->run();

}
run_wp10test();


function send_sms($phone , $order)
{

     $curl = curl_init();


        $sender_id = get_option( 'virgin_username' );
        $SMSmessage = get_option( 'message_text' );
        $token = get_option( 'virgin_password' );

        $SMSmessage= $SMSmessage.' '.$order.' Thank you!';

     //$ad_phone='0712331533';
     
     $phone_number='0'.substr($phone,-9);

     $data = json_encode(array("Authorization:"=>' Bearer '.$token,"recipient" =>
     $phone_number,"sender_id" => $sender_id,"message" => $SMSmessage));

     curl_setopt_array($curl, array(
     CURLOPT_URL => 'https://sms.virgincareer.lk/api/v3/sms/send',
     CURLOPT_RETURNTRANSFER => true,
     CURLOPT_ENCODING => '',
     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
     CURLOPT_CUSTOMREQUEST => 'POST',
     CURLOPT_POSTFIELDS => $data,
     CURLOPT_HTTPHEADER => array(
     'Authorization: Bearer '.$token,
     'Accept:application/json',
     ),
     ));

    curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);
    curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
    $response = curl_exec($curl);
    curl_close($curl);


}


// [alert_out]   use this left side code on a wordpress editor page to run the php