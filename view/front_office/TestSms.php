<?php
require __DIR__ . '../../../../projet-web-2A/twilio-php-main/src/Twilio/autoload.php';
use Twilio\Rest\Client;
// In production, these should be environment variables.
$account_sid = 'AC91a50383419acdf7cadecda20c603b66';
$auth_token = 'cac2f531d3fbc24a0b1afd4bac6b3392';
$twilio_number = "+18787288349"; // Twilio number you own
$client = new Client($account_sid, $auth_token);
// Below, substitute your cell phone
$client->messages->create(
    '+21655448828',  
    [
        'from' => $twilio_number,
        'body' => 'un nouveau blog a été ajouté !'
    ] 
);
