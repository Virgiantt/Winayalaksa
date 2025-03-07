<?php

function activity_log($userID, $loginAt,$loggedOutAt, $activityName,$verificationAt,$updateAt,$deleteAt,$token='')
{
    $expiredAt = '';
    $CI = &get_instance();
    $CI->load->library('user_agent');
    if ($CI->agent->is_browser())
    {
            $agent = $CI->agent->agent_string();
    }
    elseif ($CI->agent->is_robot())
    {
            $agent = $CI->agent->robot();
    }
    elseif ($CI->agent->is_mobile())
    {
            $agent = $CI->agent->mobile();
    }
    else
    {
            $agent = 'Unidentified User Agent';
    }

   if ($loginAt != false) {
       $loginAt = date("Y-m-d H:i:s");
       $expiredAt = date("Y-m-d H:i:s", strtotime('+5 hours'));
   }

   if ($loggedOutAt != false) {
        $loggedOutAt =  date("Y-m-d H:i:s");
   }
   if ($verificationAt != false) {
       $verificationAt =  date("Y-m-d H:i:s");
   }
   if ($verificationAt != false) {
    $verificationAt =  date("Y-m-d H:i:s");
    }
    if ($updateAt != false) {
        $updateAt =  date("Y-m-d H:i:s");
    }
    
    if ($deleteAt != false) {
        $deleteAt =  date("Y-m-d H:i:s");
    }

    $uid =  guidv4();
    $ip = $CI->input->ip_address();

    $param['activityID'] = $uid;
    $param['sessionID'] = $token;
    $param['userID'] = $userID;
    $param['userAgent'] = $agent; 
    $param['ipAddr'] = $ip; 
    $param['loggedInAt'] = $loginAt; 
    $param['expiredAt'] =  $expiredAt;
    $param['loggedOutAt'] = $loggedOutAt;
    $param['activityName'] = $activityName; 
    $param['createdAt'] = date("Y-m-d H:i:s");
    $param['verificationAt'] = $verificationAt; 
    $param['updateAt'] = $updateAt;
    $param['deleteAt'] = $deleteAt;


    //load model log
    $CI->load->model('log_model');

    //save to database
    $CI->log_model->save_log($param);

    // date_default_timezone_set('Asia/Kolkata');
    // $date = date(DATE_RFC3339);

    // if ($role == 1) {
    //     if ($loginAt == true) {
    //     $url = $CI->config->item('kemendikbud_url').$uid."/partners/".$userID."/users/".$userID."/events/logged_in";
    //     }else{
    //         $url = $CI->config->item('kemendikbud_url').$uid."/partners/".$userID."/users/".$userID."/events/logged_out";
    //     }

    //     // print_r($url);exit;

    //     $field = '{
    //         "client": {
    //             "userAgent": "'.$agent.'",
    //             "ipAddress": "'.$ip.'",
    //             "laborum33": true,
    //             "in024": "id sint occaecat"
    //         },
    //         "occurredAt": "'.$date.'",
    //         "sentAt": "'.$date.'",
    //         "sit6": 75870566.74449939
    //     }';
    
    // }
            
           

    


    // $ch = curl_init();
	// 	$cert_dir = APPPATH . "certificate/";
	// 	// $cert_dir = $_SERVER['DOCUMENT_ROOT'].'/api/app/certificate/';
	// 	curl_setopt_array($ch, array(
	// 		CURLOPT_URL => $url,
	// 		CURLOPT_RETURNTRANSFER => true,
	// 		CURLOPT_SSL_VERIFYHOST => false,
	// 		CURLOPT_SSL_VERIFYPEER => false, 
	// 		CURLOPT_SSLCERT => $cert_dir . 'datascrip.dev.siplah.kemdikbud.go.id.crt',
	// 		CURLOPT_SSLKEY => $cert_dir . 'datascrip.dev.siplah.kemdikbud.go.id.key',
	// 		CURLOPT_CAINFO => $cert_dir.'ca.crt',
	// 		CURLOPT_SSLKEYPASSWD => 'DSiplah2021',
	// 		CURLOPT_POST => true,
	// 		CURLOPT_CUSTOMREQUEST => 'POST',
	// 		CURLOPT_HTTPHEADER => [
	// 			'Content-Type: application/json',
	// 		],
    //         CURLOPT_POSTFIELDS =>$field,
	// 	  CURLOPT_FOLLOWLOCATION => true,
	// 	));

	// 	$response = curl_exec($ch);
	// 	// return $response;
	// 	$response = json_decode($response, true);
	// 	if (curl_errno($ch) > 0) {
	// 		$response = curl_error($ch);
	// 	}
	// 	curl_close($ch);
    //     print_r($response);exit;



}

function guidv4($data = null)
{
    // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
    $data = $data ?? random_bytes(16);
    assert(strlen($data) == 16);

    // Set version to 0100
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    // Set bits 6-7 to 10
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

    // Output the 36 character UUID.
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

function getUserAgent(){

    $CI = &get_instance();
    $CI->load->library('user_agent');
    if ($CI->agent->is_browser())
    {
            $agent = $CI->agent->agent_string();
    }
    elseif ($CI->agent->is_robot())
    {
            $agent = $CI->agent->robot();
    }
    elseif ($CI->agent->is_mobile())
    {
            $agent = $CI->agent->mobile();
    }
    else
    {
            $agent = 'Unidentified User Agent';
    }

    return $agent;


}