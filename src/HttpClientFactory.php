<?php

/**
 * @author Jan Cinert
 */

namespace LNC\DropshippingCZApiClient;

use Http\Client\Common\Plugin;
use Http\Client\Common\Plugin\AuthenticationPlugin;
use Http\Client\Common\Plugin\ErrorPlugin;
use Http\Client\Common\PluginClient;
use Http\Client\HttpClient;
use Http\Discovery\HttpClientDiscovery;
use Http\Message\Authentication\BasicAuth;

class HttpClientFactory
{
    /**
     * Build the HTTP client to talk with the API.
     *
     * @param string $token token for the application on the API
     * @param Plugin[] $plugins List of additional plugins to use
     * @param HttpClient $client Base HTTP client
     *
     * @return HttpClient
     */
    public static function create($token = null, $username = null, $password = null, array $plugins = [], HttpClient $client = null)
    {
        if (!$client) {
            $client = HttpClientDiscovery::find();
        }

        $plugins[] = new ErrorPlugin();

        if ($token !== null) {
            $plugins[] = new Plugin\HeaderDefaultsPlugin([
                'Authorization' => $token
            ]);;
        }
        if ($username !== null) {
            $plugins[] = new AuthenticationPlugin(
                new BasicAuth(
                    $username,
                    $password
                )
            );
        }

        return new PluginClient(
            $client,
            $plugins
        );
    }
}