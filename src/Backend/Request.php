<?php

namespace Heise\Shariff\Backend;


abstract class Request
{

    protected $client;

    public function __construct()
    {
        $this->client = new \Guzzle\Http\Client();
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
}
