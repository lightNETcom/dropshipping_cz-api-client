<?php

/**
 * @author Jan Cinert
 */

namespace LNC\DropshippingCZApiClient;

class ServiceBase
{
    protected $apiClient;

    public function __construct(ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
    }
}
