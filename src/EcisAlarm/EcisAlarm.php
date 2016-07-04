<?php

namespace EcisAlarm;

use GuzzleHttp\Client;

class EcisAlarm {
	protected $defaults = [
		'reciever'	=> '',
		'data'		=> []
	];
	
	public function __construct(array $data, $reciever){
		$defaults = $this->defaults;
		$defaults['reciever'] = $reciever;
		$defaults['data'] = $data;
	}

	public function send(){
		$client = new Client();
		$defaults = $this->defaults;
		$client->request(
			'POST',
			$defaults['reciever'],
			[
				'json' =>$defaults['data'],
				'headers'	=> [
					'Accept' => 'application/vnd.tosslab.jandi-v2+json',
					'Content-Type' => 'application/json'
				]
			]
		);
	}
}