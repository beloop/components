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
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class AuthenticationService
{
    const COOKIE_JAR = 'sq_page_renderer.cookie_jar';

    /**
     * Make cookie jar public, so it can be updated on every request
     * @var CookieJar
     */
    public $jar;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @var SessionInterface
     */
    protected $session;

    /**
     * @var string
     *
     * Squarespace password
     */
    protected $password;

    /**
     * @var string
     *
     * Squarespace host
     */
    protected $host;

    /**
     * @var string
     *
     * Squarespace base URL
     */
    protected $base_url;

    /**
     * AuthenticationService constructor.
     * @param LoggerInterface $logger
     * @param SessionInterface $session
     * @param Client $client
     * @param $password
     */
    public function __construct(LoggerInterface $logger, SessionInterface $session, Client $client, $password)
    {
        $this->logger = $logger;
        $this->client = $client;
        $this->session = $session;
        $this->password = $password;
        $this->jar = $this->session->get(static::COOKIE_JAR, new CookieJar());

        $this->host =  $client->getConfig('base_uri')->getHost();
        $this->base_url = $client->getConfig('base_uri')->__toString();
    }

    /**
     * Authenticate against Squarespace
     */
    public function authenticate()
    {
        $crumb = $this->getCrumbVaue();

        try {
            $this->client->post('/api/auth/visitor/site', array(
                    'query' => ['crumb' => $crumb],
                    'exceptions' => true,
                    'cookies' => $this->jar,
                    'headers' => [
                        'Content-Type' => 'application/json',
                        'Host' => $this->host,
                        'Origin' => $this->base_url,
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

    private function getCrumbVaue() {
        foreach ($this->jar->toArray() as $cookie) {
            if(strtolower($cookie['Name']) === 'crumb') {
                return $cookie['Value'];
            }
        }
    }
}