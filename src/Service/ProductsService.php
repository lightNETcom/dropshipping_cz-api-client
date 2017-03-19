<?php

/**
 * @author Jan Cinert
 */

namespace LNC\DropshippingCZApiClient\Service;

use LNC\DropshippingCZApiClient\Response\Error;
use LNC\DropshippingCZApiClient\ServiceBase;

class ProductsService extends ServiceBase
{
    /**
     * @param int $eshopId
     * @param int|null $limit
     * @param int|null $offset
     *
     * @return array|Error
     */
    public function get($eshopId, $limit = null, $offset = null)
    {
        $params = array(
            'eshop_id' => $eshopId,
            'limit' => $limit,
            'offset' => $offset,
        );

        $response = $this->apiClient->sendRequest(
            'GET',
            'products',
            $params
        );

        if (!isset($response['data'])) {
            return new Error($response);
        }

        $list = array();

        foreach ($response['data'] as $item) {
            $list[] = $item;
        }

        return $list;
    }
}