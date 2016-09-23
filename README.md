 <center><img src="https://authpin.com/brand/authpin-4.svg" width="902px" height="150px"></center>

# Installation
 * Obtain API Key from https://www.authpin.com<br>
 * Include authpin.class.php in your script. <br>
 * Check example.php for basic usage.<br>

 
 
# Usage

Include authpinclass.php class and create object <br>

```php
$api = "";
require_once(authpin.class.php);
$authpin = new AuthPin($api);
```

# Two-Factor Registeration

```php
// Returns the QR code. Your user can scan this QR using AuthPin app / Website.
$email = "dev@authpin.com";
echo $authpin->register($email);
```

# Two-Factor Verification

```php
$pin = "1234";
if($authpin->verify($pin,$email))
{
 echo "Valid Pin";
}
else 
{
 echo "Invalid Pin";
}
```

# SMS OTP

```php
// Send OTP to phone
// Hash will be returned after OTP send . You need to pass the hash to verify the SMS
$phone="9xxxxxxxxx";
$country = "IN";
$hash = $authpin->sendOTP($phone,$county);
```

# SMS OTP Verification


```php
$smscode = "1234";
if($authpin->verifyotp( $smscode , $hash))
{
 echo "Valid OTP";
}
else 
{
 echo "Invalid OTP";
}

```

# API Info

https://authpin.com/developer
