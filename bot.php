<?php
require 'src/Class.php';

$curl = new curl;
touch("spotify.txt");

function post($curl, $init, $url, $data, $header, $ua, $email){
	
	$curl->init_curl($init, $url);
	$curl->set_header($init, $header);
	$curl->curl_data($init, $data);
	$curl->set_ua($init, $ua);
	$start = $curl->start_curl($init);
	
	$decStart = json_decode($start);
	
	if(!empty($decStart->username)){
		return ".[+] Generate Account Success\nEmail: ".$email."@gmail.com\nPassword: ".$email."\n\n";
	
		}else{
			return ".[-] Generate Account Failed\n";
			}
	
	}

$banner = "\e[36;1m                                                                                 
                                                                                 
           #         ######   
           #    #             
  ######   #    #  ########## 
           #    #  #        # 
           #######        ##  
##########      #       ##    
                #     ##      
                              
                                                                                 
[#] Spotify Accounts Creator [#]    
                                   
Author : Amzah S                  
Team   : IndoSec x Cilacap Security Cyber Team          
Github : https//github.com/LulNazi666/\n\n\e[0;1m";
                                                                                 
                                                                                                                                                                 
sleep(3);
echo $banner;
sleep(2);
echo "Number Of Accounts : ";
$count = trim(fgets(STDIN));
$string = "AbCdEfFghHijJkklmnUtyahj0123456789";

	$id = 1;
	for($i=0; $i < $count; $i++){
		$email = substr(str_shuffle($string), 0, 10);
	
		$init = curl_init();
		$url = "https://spclient.wg.spotify.com/signup/public/v1/account/";
		$ua = "Spotify/8.5.47 Android/28 (vivo 1904)";
		$header = ["spotify-app-version:8.5.47", "x-client-id:9a8d2f0ce77a4e248bb71fefcb557637", "app-platform:Android", "content-type:application/x-www-form-urlencoded"];
		$data = "birth_month=3&email=".$email."@gmail.com&key=142b583129b2df829de3656f9eb484e6&name=".$email."&password=".$email."&platform=Android-ARM&iagree=true&gender=male&password_repeat=".$email."&creation_point=client_mobile&birth_year=1996&birth_day=3";
		$result =  $id++.post($curl, $init, $url, $data, $header, $ua, $email);
		
		if(preg_match("|Success|", $result)){
			echo $result;
			$o = fopen("spotify.txt", 'a');
			fwrite($o, $email."@gmail.com|".$email."\n");
			fclose($o);
			}else{
				echo $result;
				}
	}
