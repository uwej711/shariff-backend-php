<?php

namespace Heise\Shariff\Backend;

use Guzzle\Http\Client;

abstract class Request
{
    /** @var Client */
    protected $client;

    /** @var array */
    protected $config;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    protected function createRequest($url, $method = 'GET', $options = array())
    {
        // $defaults = array('future' => true);

        $headers = null;
        $body = null;

        if (isset($options['json'])) {
            $headers['Content-Type'] = 'application/json';
            $body = json_encode($options['json']);
        }

        $req = $this->client->createRequest(
            $method,
            $url,
            $headers,
            $body
        );

        return $req;
    }

    public function setConfig(array $config)
    {
        $this->config = $config;
    }
}
