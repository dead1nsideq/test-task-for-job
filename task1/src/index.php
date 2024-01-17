<?php
require_once '../vendor/autoload.php';

use App\Csv;
use App\Json;


$data = [
    [
        'country_name' => 'USA',
        'country_code' => 'US',
        'city_name' => 'New York',
        'lat' => '40.7127753',
        'lng' => '-74.0059728',
    ],
    [
        'country_name' => 'USA',
        'country_code' => 'US',
        'city_name' => 'Los Angeles',
        'lat' => '34.0522342',
        'lng' => '-118.2436849',
    ],
    [
        'country_name' => 'Philippines',
        'country_code' => 'PH',
        'city_name' => 'Manila',
        'lat' => '14.5995124',
        'lng' => '120.9842195',
    ],
    [
        'country_name' => 'Philippines',
        'country_code' => 'PH',
        'city_name' => 'Cebu',
        'lat' => '10.3156993',
        'lng' => '123.8854377',
    ]
];


$headers = ["Country name", " Country code","Lat", " Long"];



$csv_custom_headers = new Csv('./results/result_custom_headers.csv',$data);

$csv_custom_headers->setCustomHeaders($headers);

$csv_custom_headers->convert();

$json_custom_headers = new Json('./results/result_custom_headers.csv');

print_r('Output for json_custom_headers' . PHP_EOL);
print_r($json_custom_headers->convert());
print_r(PHP_EOL);
$csv_without_headers = new Csv('./results/result_no_custom_headers.csv',$data);

$csv_without_headers->convert();

$json_without_headers = new Json('./results/result_no_custom_headers.csv');

print_r('----------------------------------' . PHP_EOL);
print_r('Output for json_no_custom_headers' . PHP_EOL);
print_r($json_without_headers->convert());