<?php

class curl {
	public $init;
	public $url;
	public $header;
	
	
		public function init_curl($init, $url){
			$this->init = $init;
			$this->url = $url;
			
			curl_setopt($this->init, CURLOPT_URL, $this->url);
			curl_setopt($this->init, CURLOPT_RETURNTRANSFER, TRUE);
			
			}

		
		public function curl_data($init, $data){
			$this->init = $init;
			curl_setopt($this->init, CURLOPT_POSTFIELDS, $data);
			}
		
		public function get_cookie($init, $cookie){
			$this->init = $init;
			curl_setopt($this->init, CURLOPT_COOKIEJAR, $cookie);
			}
		
		public function curl_header($init){
			$this->init = $init;
			curl_setopt($this->init, CURLOPT_HEADER, TRUE);
			}
		
		public function set_cookie($init, $cookie){
			$this->init = $init;
			curl_setopt($this->init, CURLOPT_COOKIEJAR, $cookie);
			}
			
		public function set_proxy($init, $proxy){
			$this->init = $init;
			curl_setopt($this->init, CURLOPT_PROXY, $proxy);
			curl_setopt($this->init, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS4);
			}
		
		public function start_curl($init){
			$this->init = $init;
			$gas = curl_exec($this->init);
			
			return $gas;
			
			}
			
		public function curl_setheader($init, $url, $header, $ua){
			$this->init_curl($init, $url, $ua);
			$this->set_header($init, $header);
			$this->set_ua($init, $ua);
			
			}
		
		public function set_header($init, $header){
			$this->init = $init;
			$this->header = $header;
			curl_setopt($this->init, CURLOPT_HTTPHEADER, $this->header);
			}
		
		public function set_ua($init, $ua){
			$this->init = $init;
			curl_setopt($this->init, CURLOPT_USERAGENT, $ua);
			}
			
		public function __destruct(){
			$init = $this->init;
				curl_close(curl_init());
			}
		
	}
	
?>