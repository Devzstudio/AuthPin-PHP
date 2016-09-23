<?php
/*
AuthPin Integration Class 
Developer : Devzstudio
Date : 23-09-2016
Details : https://authpin.com/developer
Version : 1.0
License : GNU GENERAL PUBLIC LICENSE
*/
class AuthPin
{
  protected $api;	
  protected $url = "https://www.authpin.com/api";
  
  public function __construct($api)
  {
		$this->api = $api;
  }
  public function sendData($data,$url)
  {
  	    $postData = '';
   		foreach($data as $k => $v) 
  	 	{ 
    	   $postData .= $k.'='.$v.'&'; 
   		}
	    rtrim($postData, '&'); 
		
		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL, $url);
		curl_setopt($ch,CURLOPT_POST, count($postData));
		curl_setopt($ch,CURLOPT_POSTFIELDS, $postData);	
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		$result = curl_exec($ch);	
		curl_close($ch);	
		return $result;
  }
  public function register($email)
  {
    	$data = array(
		   "email" => $email
		);       
		$url = $this->url.'/register/'.$this->api;
	    $result = $this->sendData($data,$url);
		$json_result = json_decode($result,true);
 		return $json_result['qrcode'];
	}
	public function verify($code,$email)
	{
		$data = array(
		   "email" => $email,
		   "code" => $code,
		);       
		$url = $this->url.'/verify/'.$this->api;
	    $result = $this->sendData($data,$url);
		$json_result = json_decode($result,true);
  		return $json_result['status'];
	}
	public function sendOTP($phone,$countrycode)
	{
		$data = array(
		   "country" => $countrycode,
		   "phone" => $phone,
		);       
	
		$url = $this->url.'/otp/'.$this->api;
	    $result = $this->sendData($data,$url);
		$json_result = json_decode($result,true);
	 
 		return $json_result['hash'];
		
	}
	public function verifyotp($code,$hash)
	{
		$data = array(
		   "hash" => $hash,
		   "code" => $code,
		);       
		$url = $this->url.'/otp/verify/'.$this->api;
	    $result = $this->sendData($data,$url);
		$json_result = json_decode($result,true);
  		return $json_result['status'];
	}
}
?>
