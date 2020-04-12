<?php

error_reporting(-1);
ini_set('display_errors', 'On');

// Get the PHP helper library from twilio.com/docs/php/install
require_once 'Twilio/autoload.php'; // Loads the library
use Twilio\Rest\Client;

$sid = 'YouSid';
$token = 'YourToken';
$client = new Client($sid, $token);

// Array of tendigit phone numbers and names.
// Only those who're on this list can use the broadaster.
// All allowed messages will go to all numbers on this list.
$employees = array(
    "1234567890"=>"Name",
    "1234567890"=>"Name"
);

$message = $_REQUEST['Body'];
$from_number = preg_replace("/[^0-9]/", '', $_REQUEST['From']);
echo $from_number;
// file_put_contents('./received.log', print_r($_REQUEST) , FILE_APPEND | LOCK_EX); // Optional logging for testing.

if ( in_array( $from_number, $employees) || array_key_exists($from_number, $employees) ) {
    foreach ( $employees as $number => $name) {
        $body = array(
            'from' => '+1 234-567-8901', # Your Twilo number
            'body' =>  $employees[$from_number] . ": " . $message
        );
        $client->messages->create($number, $body);
        file_put_contents('./sent.log', $from_number . " " . $name . " " . $message "\n", FILE_APPEND | LOCK_EX); // Optional logging for testing.
    }
}

echo "";

?>
