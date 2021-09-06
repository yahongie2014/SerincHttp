<?php

namespace SerincHttp;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class HttpClient
{
    public $url;
    public $uri;
    public $headers = [];
    public $urlParams = [];
    public $client;

    /**
     * HttpClient constructor.
     * @param $url
     */
    public function __construct($url)
    {
        $this->client = new Client(['base_uri' => $url]);
    }

    /**
     * @return mixed
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @param string $uri
     * @return $this
     */
    public function setUri(string $uri)
    {
        $this->uri = $uri;

        return $this;
    }

    /**
     * @param array $headers
     * @return $this
     */
    public function setHeaders($headers = [])
    {
        $this->headers = $headers;

        return $this;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @param array $params
     */
    public function addToHeaders(array $params)
    {
        $headers = $this->getHeaders();

        $this->headers = array_merge($headers, $params);
    }

    /**
     * @param $params
     * @return $this
     */
    public function setUrlParams($params)
    {
        $params = is_array($params) ? $params : func_get_args();
        $this->urlParams = $params;

        return $this;
    }

    /**
     * @return mixed|string
     */
    public function getUriWithUrlParams()
    {
        return ($this->urlParams) ? $this->getUri() . '/' . implode('/', $this->urlParams) : $this->getUri();
    }

    /**
     * @param $method
     * @param array $body
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function request($method, $body = [])
    {
        $uri = $this->getUriWithUrlParams();

        try {
            $response = $this->client->request($method,
                $uri, [
                    'headers' => $this->getHeaders(),
                    'json' => $body
                ]
            );

            return json_decode($response->getBody()->getContents());

        } catch (RequestException $e) {
            return json_decode($e->getResponse()->getBody()->getContents());
        }
    }

    public function requestWithMultipart($method, $body = [])
    {
        $uri = $this->getUriWithUrlParams();

        try {
            $response = $this->client->request(
                $method,
                $uri,
                [
                    'headers' => $this->getHeaders(),
                    'multipart' => $body,
                ]
            );

            return json_decode($response->getBody()->getContents());

        } catch (RequestException $e) {
            return json_decode($e->getResponse()->getBody()->getContents());
        }
    }
}
