<?php 

$config['pusher'] = [
	'id' => env('pusher_app_id','1255796'),
	'cluster' => env('pusher_app_cluster','ap1'),
	'key' => env('pusher_key','66c29f4bbdc504ff9cb7'),
	'secret' => env('pusher_secret','7de697bf3a31ab2adb6a'),
	'encrypted' => env('pusher_encrypted')
];