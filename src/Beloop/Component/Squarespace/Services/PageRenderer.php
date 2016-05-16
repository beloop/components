<?php

/*
 * This file is part of the Beloop package.
 *
 * Copyright (c) 2016 AHDO Studio B.V.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Feel free to edit as you please, and have fun.
 *
 * @author Arkaitz Garro <arkaitz.garro@gmail.com>
 */

namespace Beloop\Component\Squarespace\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;
use Psr\Http\Message\UriInterface;

use Symfony\Component\HttpFoundation\Response;

use Beloop\Component\Squarespace\Entity\SquarespacePage;

class PageRenderer
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var string
     *
     * Squarespace password
     */
    protected $password;

    /**
     * @var string
     *
     * Squarespace base URL
     */
    protected $base_url;

    /**
     * @var string
     *
     * Squarespace host
     */
    protected $host;

    /**
     * PageRenderer constructor.
     * @param Client $client
     * @param $password
     */
    public function __construct(Client $client, $password)
    {
        $this->client = $client;
        $this->password = $password;

        $this->base_url = $client->getConfig('base_uri')->__toString();
        $this->host =  $client->getConfig('base_uri')->getHost();
    }

    /**
     * 
     * @param SquarespacePage $page
     * @return mixed
     */
    public function render(SquarespacePage $page)
    {
        $jar = new CookieJar;
        $response = $this->client->get(
            $this->extractResourceFromUri($this->base_url, $page->getUrl()),
            ['exceptions' => false, 'cookies' => $jar]
        );

        if ($response->getStatusCode() === Response::HTTP_UNAUTHORIZED) {
            $crumb = $jar->toArray()[0]['Value'];

            try {
                $this->client->post('/api/auth/visitor/site', array(
                        'query' => ['crumb' => $crumb],
                        'exceptions' => true,
                        'cookies' => $jar,
                        'headers' => [
                            'Content-Type' => 'application/json',
                            'Host' => $this->host,
                            'Origin' => $this->base_url,
                            'Referer' => $page->getUrl(),
                        ],
                        'body' => json_encode(['password' => $this->password])
                    )
                );

                $response = $this->client->get(
                    $this->extractResourceFromUri($this->base_url, $page->getUrl()),
                    ['exceptions' => false, 'cookies' => $jar]
                );
            } catch (\Exception $ex) {
                die($ex->getMessage());
            }
        }

        return $this->buildAbsolutePaths($this->client->getConfig('base_uri'), $response->getBody());
    }

    /**
     * Extract resource from URL
     *
     * @param $base_url
     * @param $url
     * @return mixed
     */
    private function extractResourceFromUri($base_url, $url)
    {
        return str_replace($base_url, '', $url);
    }

    /**
     * Convert relative paths into absolute paths
     *
     * @param $uri
     * @param $body
     * @return mixed
     */
    private function buildAbsolutePaths($uri, $body)
    {
        // Make link references absolute
        // $body = preg_replace('/href="\/([a-z])/', 'href="' . $uri->__toString() . '/$1', $body);

        // Make sources references absolute
        // $body = preg_replace('/src="\/([a-z])/', 'href="' . $uri->__toString() . '/$1', $body);

        return $body;
    }
}