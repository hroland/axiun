<?php

	include('page.html');

	$analytics_url = 'https://analytics-api.rolandhorvath.hu/v1/track/@roland/axiun';

	$analytics_url .= '?showIP=true&showUA=true';
	$ch = curl_init($analytics_url);
	curl_setopt($ch, CURLOPT_HTTPHEADER, ['X-Forwarded-For: ' . ($_SERVER['HTTP_CLIENT_IP'] ?? $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR']), 'User-Agent: ' . $_SERVER['HTTP_USER_AGENT']]);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // hides output
	curl_exec($ch);
	curl_close($ch);

?>