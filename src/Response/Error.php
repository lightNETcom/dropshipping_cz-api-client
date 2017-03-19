<?php

/**
 * @author Jan Cinert
 */

namespace LNC\DropshippingCZApiClient\Response;

class Error
{
    public $message;

    public function __construct($message)
    {
        $this->message = $message;
    }
}
