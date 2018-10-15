<?php

$router = new AltoRouter;

$router->map('GET', '/', 'App\Controllers\IndexController@show', 'home');
$router->map('GET', '/featured', 'App\Controllers\IndexController@featuredProducts', 'featured_products');
$router->map('GET', '/get-products', 'App\Controllers\IndexController@getProducts', 'get_products');
$router->map('POST', '/load-more', 'App\Controllers\IndexController@loadMoreProducts', 'load_more_products');

$router->map('GET', '/product/[i:id]', 'App\Controllers\ProductController@show', 'product');
$router->map('GET', '/product-details/[i:id]', 'App\Controllers\ProductController@get', 'product-details');

require_once __DIR__ . '/cart.php';
require_once __DIR__ . '/admin_routes.php';
require_once __DIR__ . '/auth.php';