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

use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Log\LoggerInterface;

use Beloop\Component\Squarespace\Entity\SquarespacePage;

class PageRenderer
{
    const COOKIE_JAR = 'sq_page_renderer.cookie_jar';

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @var SessionInterface
     */
    protected $session;

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
     * @var CookieJar
     */
    protected $jar;

    /**
     * PageRenderer constructor.
     * @param LoggerInterface $logger
     * @param Client $client
     * @param $password
     */
    public function __construct(LoggerInterface $logger, SessionInterface $session, Client $client, $password)
    {
        $this->logger = $logger;
        $this->session = $session;
        $this->client = $client;
        $this->password = $password;

        $this->jar = $this->session->get(static::COOKIE_JAR, new CookieJar());
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
        $response = $this->client->get(
            $this->extractResourceFromUri($this->base_url, $page->getUrl()),
            ['exceptions' => false, 'cookies' => $this->jar]
        );

        if ($response->getStatusCode() === Response::HTTP_UNAUTHORIZED) {
            $this->authenticate($page);

            $response = $this->client->get(
                $this->extractResourceFromUri($this->base_url, $page->getUrl()),
                ['exceptions' => false, 'cookies' => $this->jar]
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

    /**
     * Authenticate against Squarespace
     * @param SquarespacePage $page
     */
    private function authenticate(SquarespacePage $page)
    {
        $crumb = $this->jar->toArray()[0]['Value'];

        try {
            $this->client->post('/api/auth/visitor/site', array(
                    'query' => ['crumb' => $crumb],
                    'exceptions' => true,
                    'cookies' => $this->jar,
                    'headers' => [
                        'Content-Type' => 'application/json',
                        'Host' => $this->host,
                        'Origin' => $this->base_url,
                        'Referer' => $page->getUrl(),
                    ],
                    'body' => json_encode(['password' => $this->password])
                )
            );

            $this->session->set(static::COOKIE_JAR, $this->jar);
        } catch (\Exception $ex) {
            $this->logger->error($ex->getMessage());
            die($ex->getMessage());
        }
    }
}