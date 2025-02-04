<?php 

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use  App\ApiCallHandler;

$data =  (new ApiCallHandler)->execute(
    'https://statsapi.mlb.com/api/v1/teams/135/roster?season=2025',
);

echo '<pre>';
var_dump($data);
echo '</pre>';