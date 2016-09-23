<?php
// Your api code 
$api = "";
require_once(authpin.class.php);
$authpin = new AuthPin($api);

// Returns the QR code. Your user can scan this QR using AuthPin App / Website.
$email = "dev@authpin.com";
echo $authpin->register($email);

// User Pin Verification
$pin = "1234";
if($authpin->verify($pin,$email))
{
 echo "Valid Pin";
}
else 
{
 echo "Invalid Pin";
}


// Send OTP to phone
// Hash will be returned after OTP send . You need to pass the hash to verify the SMS
$phone="9xxxxxxxxx";
$country = "IN";
$hash = $authpin->sendOTP($phone,$county);

// Verify OTP Token
$smscode = "1234";
if($authpin->verifyotp( $smscode , $hash))
{
 echo "Valid OTP";
}
else 
{
 echo "Invalid OTP";
}

?>
