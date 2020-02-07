<?php 

namespace App\Helpers;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\RequestOptions;

class GuzzleMidtrans
{
	public static function post($parameter = [], $base_url, $url, $token)
	{
		$headers = [
			'headers' => [
				'Content-Type' => 'application/json',
				'Accept' => 'application/json',
				'Authorization'=> 'Basic '.$token,
			],
			'json' => $parameter
		];

		try {
			$client = new \GuzzleHttp\Client(['base_uri' => $base_url]);
			$response = $client->request('POST', $url, $headers);
		} catch (RequestException $exception) {
			$response = $exception->getResponse();
		}

		if(!is_null($response)){
			$result = [
				'status_code' => $response->getStatusCode(),
				'data' => json_decode($response->getBody()->getContents())
			];
			return $result;
		} else echo 'API DOWN';
	}

	public static function postapi($parameter = [], $base_url, $url, $token = null)
	{
		$headers = [
			'headers' => [
				'Content-Type' => 'application/json',
				'Accept' => 'application/json',
				'Authorization'=> 'BEARER '.$token,
			],
			'json' => $parameter
		];

		try {
			$client = new \GuzzleHttp\Client(['base_uri' => $base_url]);
			$response = $client->request('POST', $url, $headers);
		} catch (RequestException $exception) {
			$response = $exception->getResponse();
		}

		if(!is_null($response)){
			$result = [
				'status_code' => $response->getStatusCode(),
				'data' => json_decode($response->getBody()->getContents())
			];
			return $result;
		} else {
			abort(404,'API Error ! '.$base_url.$url);
			echo "API Error ".$base_url.$url;
		}
	}

    public static function pushnotif($title, $message, $token, $data){
        // $id = "finadzPZVUg:APA91bHyKdWFSVESuH2nbqmEPH73GROkIlsS1F14xtSNtygVc0freyOxaiNPGcF3JLzBWNP0kstPBqOWub4Z3QBOH9uluNZ_Adn6e5cms7jMJ0aXZKBOTA14x-E8nhvifPCWFtc-OlWp";
        $title = $title;
        $message = $message;
        
        $base_url = 'https://fcm.googleapis.com/fcm/';
        $url = 'send';

        $fields = array (
                'registration_ids' => array (
                        $token
                ),
                'notification' => array (
                        "title" => $title,
                        "body" => $message,
				),
				'data' => $data
        );

        $headers = [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'key=AIzaSyAcnoLyZTuyY4iJmTtjbGFU_fXDWIUPh3E'
            ],
            'json' => $fields
        ];

		try {
			$client = new \GuzzleHttp\Client(['base_uri' => $base_url]);
			$response = $client->request('POST', $url, $headers);
		} catch (RequestException $exception) {
			$response = $exception->getResponse();
		}

		if(!is_null($response)){
			$result = [
				'status_code' => $response->getStatusCode(),
				'data' => json_decode($response->getBody()->getContents())
			];
			return $result;
        } else return redirect()->route('error.apidown');

    }

	

	public static function put($parameter = [], $base_url, $url, $token, $db_name)
	{
		if ($db_name == null) {
			$headers = [
				'headers' => [
					'Authorization' => 'Bearer '.$token
				],
				'form_params' => $parameter
			];
		}else if($db_name != null){
			$headers = [
				'headers' => [
					'Authorization' => 'Bearer '.$token,
					'dbname' => $db_name
				],
				'form_params' => $parameter
			];
		}else{
			$headers = [
				'form_params' => $parameter
			];
		}

		try {
			$client = new \GuzzleHttp\Client(['base_uri' => $base_url]);
			$response = $client->request('PUT', $url, $headers);
		} catch (RequestException $exception) {
			$response = $exception->getResponse();
		}

		if(!is_null($response)){
			$result = [
				'status_code' => $response->getStatusCode(),
				'data' => json_decode($response->getBody()->getContents())
			];
			return $result;
		} else return redirect()->route('error.apidown');
	}

	public static function del($parameter = [], $base_url, $url, $token, $db_name)
	{
		$headers = [
			'headers' => [
				'Authorization' => 'Bearer '.$token,
				'dbname' => $db_name
			],
		];

		try {
			$client = new \GuzzleHttp\Client(['base_uri' => $base_url]);
			$response = $client->request('DELETE', $url, $headers);
		} catch (RequestException $exception) {
			$response = $exception->getResponse();
		}

		if(!is_null($response)){
			$result = [
				'status_code' => $response->getStatusCode(),
				'data' => json_decode($response->getBody()->getContents())
			];
			return $result;
		} else return redirect()->route('error.apidown');
	}

	public static function get($parameter, $base_url, $url, $token, $db_name)
	{
		$param = http_build_query($parameter); 
		$parameter = $url."?".$param;
		
		if ($db_name == null) {
			$auth = [
				'headers' => [
					'Authorization' => 'Bearer '.$token
				]
			];
		}else if($db_name != null){
			$auth = [
				'headers' => [
					'Authorization' => 'Bearer '.$token,
					'dbname' => $db_name
				]
			];
		}else{
			$auth = [];
		}

		try {
	     	$client = new \GuzzleHttp\Client(['base_uri' => $base_url]);
	     	$response = $client->request('GET', $parameter, $auth);
		} catch (RequestException $exception) {
			$response = $exception->getResponse();
		}

		if(!is_null($response)){
			$result = [
				'status_code' => $response->getStatusCode(),
				'data' => json_decode($response->getBody()->getContents())
			];
			return $result;
		} else return redirect()->route('error.apidown');
	}

	public static function getapi($parameter, $base_url, $url, $token = null)
	{
		$param = http_build_query($parameter); 
		$parameter = $url."?".$param;

		if ($token != null) {
			$auth = [
				'headers' => [
					'Authorization' => 'Bearer '.$token
				]
			];
		}else{
			$auth = [];
		}

		try {
	     	$client = new \GuzzleHttp\Client(['base_uri' => $base_url]);
	     	$response = $client->request('GET', $parameter, $auth);
		} catch (RequestException $exception) {
			$response = $exception->getResponse();
		}
		
		if(!is_null($response)){
			$result = [
				'status_code' => $response->getStatusCode(),
				'data' => json_decode($response->getBody()->getContents())
			];
			return $result;
		} else {
			abort(404,'API Error ! '.$base_url.$url);
			echo "API Error ".$base_url.$url;
		}
	}

	public static function getaccelary($parameter, $base_url, $url, $token, $db_name)
	{
		$param = http_build_query($parameter); 
		$parameter = $url;
		
		$auth = [];
		
		try {
	     	$client = new \GuzzleHttp\Client(['base_uri' => $base_url]);
	     	$response = $client->request('GET', $parameter, $auth);
		} catch (RequestException $exception) {
			$response = $exception->getResponse();
		}
	}

	public static function sendToken($parameter = [], $base_url = '', $url = '')
	{
		$auth = [
			'form_params' => $parameter
		];
		
		try {
			$client = new \GuzzleHttp\Client(['base_uri' => $base_url]);
			$response = $client->request('POST', $url, $auth);
		} catch (RequestException $exception) {
			$response = $exception->getResponse();
		}
		
		if(!is_null($response)){
			return $response;
		} else return redirect()->route('error.apidown');
	}

	public static function getContents($response)
	{
		$data = $response->getBody()->getContents();
		return json_decode($data);
	}

	/**
	* Get parameter API Value for internal
	* param array('value', 'condition')
	* recieve condition =, !=, <=, >=, like
	* not acceptable  for beetwen
	* return string
	*/
	public static function getParamValue($parameter)
	{
		return implode(',', $parameter);
	}
}