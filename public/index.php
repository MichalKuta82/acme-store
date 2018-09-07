<?php

require_once __DIR__ . '/../bootstrap/init.php';

//$app_name = getenv('APP_NAME');

//echo $app_name;

use Illuminate\Database\Capsule\Manager as Capsule;

$user = Capsule::table('categories')->get();
//var_dump($user->toArray());

