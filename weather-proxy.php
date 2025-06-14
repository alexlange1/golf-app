<?php
header('Content-Type: application/json');
require_once 'config.php';

$lat = '41.3851';
$lon = '2.1734';
$apiKey = OPENWEATHER_API_KEY;
$url = "https://api.openweathermap.org/data/3.0/onecall?lat=$lat&lon=$lon&units=metric&appid=$apiKey";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($http_code !== 200 || !$response) {
    echo json_encode(['error' => 'Failed to fetch weather data', 'http_code' => $http_code, 'response' => $response]);
    exit;
}

$data = json_decode($response, true);
// Prepare a compatible response for the frontend
$result = [
    'main' => [
        'temp' => $data['current']['temp'],
        'feels_like' => $data['current']['feels_like'],
        'humidity' => $data['current']['humidity'],
    ],
    'wind' => [
        'speed' => $data['current']['wind_speed'],
    ],
    'clouds' => [
        'all' => $data['current']['clouds'],
    ],
    'hourly' => []
];
if (isset($data['hourly'])) {
    foreach (array_slice($data['hourly'], 0, 8) as $hour) {
        $result['hourly'][] = [
            'dt' => $hour['dt'],
            'temp' => $hour['temp'],
            'icon' => $hour['weather'][0]['icon'],
            'main' => $hour['weather'][0]['main'],
        ];
    }
}
echo json_encode($result); 