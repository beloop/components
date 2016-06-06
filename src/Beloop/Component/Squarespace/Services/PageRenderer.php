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

use Symfony\Component\HttpFoundation\Response;

use Beloop\Component\Squarespace\Entity\SquarespacePage;
use Beloop\Component\Squarespace\Services\AuthenticationService;

class PageRenderer
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var AuthenticationService
     */
    protected $authenticationService;

    /**
     * @var string
     *
     * Squarespace base URL
     */
    protected $base_url;

    /**
     * PageRenderer constructor.
     * @param Client $client
     * @param AuthenticationService $authenticationService
     */
    public function __construct(Client $client, AuthenticationService $authenticationService)
    {
        $this->client = $client;
        $this->authenticationService = $authenticationService;

        $this->base_url = $client->getConfig('base_uri')->__toString();
    }

    /**
     *
     * @param SquarespacePage $page
     * @return mixed
     */
    public function render(SquarespacePage $page)
    {
        $response = $this->client->get(
            $this->extractResourceFromUri($this->base_url, $page->getUrl()),
            ['exceptions' => false, 'cookies' => $this->authenticationService->jar]
        );

        if ($response->getStatusCode() === Response::HTTP_UNAUTHORIZED) {
            $this->authenticationService->authenticate();

            $response = $this->client->get(
                $this->extractResourceFromUri($this->base_url, $page->getUrl()),
                ['exceptions' => false, 'cookies' => $this->authenticationService->jar]
            );
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
        // $body = preg_replace('/src=".*"/', 'src=""', $body);

        return $body;
    }

}