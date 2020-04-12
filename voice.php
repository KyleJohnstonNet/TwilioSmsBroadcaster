<?php

error_reporting(-1);
ini_set('display_errors', 'On');

// Get the PHP helper library from twilio.com/docs/php/install
require_once 'Twilio/autoload.php'; // Loads the library
use Twilio\Jwt\ClientToken;

$sid = 'YouSid';
$token = 'YourToken';

$response = '<?xml version="1.0" encoding="UTF-8"?>';
$response .= '<Response>';
$response .= '<Say voice="man">The XYZ distribution number does not currently support phone calls. Please text this the number instead.</Say>';
$response .= '</Response>';

print $response;

?>
