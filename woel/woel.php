/*
@package Woocom Order Email Log
@version 1.0
Plugin Name: Woocom Order Email Log
Description: Log Sent Email by Woocommerce in the Notes section of an order.
Author: Jaxson Keenes
Version: 1.0
License: GPLv3 or later.
Text Domain: woel
Domain Path: /lang
*/


if ( ! defined( 'ABSPATH' ) ) exit;


/**
 * Custom PHPMailer action callback
 */
function wpse_mail_action( $is_sent, $to, $cc, $bcc, $subject, $body, $from )
{
    do_action( 'wpse_mail_action', $is_sent, $to, $cc, $bcc, $subject, $body, $from );
    return $is_sent; // don't actually need this return!
}

/**
 * Setup a custom PHPMailer action callback
 */
add_action( 'phpmailer_init', function( $phpmailer )
{
    $phpmailer->action_function = 'wpse_mail_action';
} );