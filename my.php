<?php
session_start();



	 function sendMessage(){
		$content = array(
			"en" => 'English Message'
			);
		
		$fields = array(
			'app_id' => "909cedf8-f3fa-49df-91cf-78628ec184ff",
			//'include_player_ids' => array("c9b0c914d0b5acb24a2aa91f4139bc51"),
			'include_player_ids' => array("4855310b-5dc3-4a43-b6fc-5fb952df031c"),
			'data' => array("foo" => "bar"),
			'contents' => $content
		);
		
		$fields = json_encode($fields);
		
    	print("\nJSON sent:\n");
    	print($fields);
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
												   'Authorization: Basic NGEwMGZmMjItY2NkNy0xMWUzLTk5ZDUtMDAwYzI5NDBlNjJj'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

		$response = curl_exec($ch);
		curl_close($ch);
		
		return $response;
	} 
	//echo "dsfdfsf";die;
	$response = sendMessage();
	$return["allresponses"] = $response;
	$return = json_encode( $return);
	
	print("\n\nJSON received:\n");
	print($return);
	print("\n"); 
?>