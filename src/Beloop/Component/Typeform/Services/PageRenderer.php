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

namespace Beloop\Component\Typeform\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;

use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Log\LoggerInterface;

use Beloop\Component\Typeform\Entity\TypeformQuiz;

class PageRenderer
{
    const COOKIE_JAR = 'typeform_quiz_renderer.cookie_jar';

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
     * Typeform base URL
     */
    protected $base_url;

    /**
     * @var string
     *
     * Typeform host
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
     */
    public function __construct(LoggerInterface $logger, SessionInterface $session, Client $client)
    {
        $this->logger = $logger;
        $this->session = $session;
        $this->client = $client;

        $this->jar = $this->session->get(static::COOKIE_JAR, new CookieJar());
        $this->base_url = $client->getConfig('base_uri')->__toString();
        $this->host =  $client->getConfig('base_uri')->getHost();
    }

    /**
     *
     * @param TypeformQuiz $quiz
     * @return mixed
     */
    public function render(TypeformQuiz $quiz)
    {
        die('Implement renderer');
    }
}