<?php

/**
 * @author Jan Cinert
 */

require_once __DIR__ . '/vendor/autoload.php';


$apiClient = new \LNC\DropshippingCZApiClient\ApiClient();
$apiClient->setToken('xxx');

$service = new \LNC\DropshippingCZApiClient\Service\ProductsService($apiClient);

$response = $service->get('yyy');

var_dump($response);

