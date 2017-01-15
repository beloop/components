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
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class ScoreRetriever
{
    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @var string
     *
     * Typeform API key
     */
    protected $apiKey;

    /**
     * @var string
     *
     * Typeform endpoint
     */
    protected $endpoint;

    /**
     * ScoreRetriever constructor.
     * @param LoggerInterface $logger
     * @param Client $client
     */
    public function __construct(LoggerInterface $logger, Client $client, $apiKey)
    {
        $this->logger = $logger;
        $this->client = $client;
        $this->apiKey = $apiKey;

        $this->base_url = $client->getConfig('base_uri')->__toString();
    }

    public function getScoreFromUID($uid, $email) {
        $data = $this->getAllResponsesFromUID($uid);

        foreach ($data->responses as $response) {
            if ($response->hidden->email === $email) {
                return $response->answers->score;
            }
        }

        return null;
    }

    private function getAllResponsesFromUID($uid) {
        try {
            $response = $this->client->get($this->base_url.$uid, [
                'query' => ['key' => $this->apiKey, 'completed' => true],
                'exceptions' => true
            ]);
        } catch (\Exception $ex) {
            $this->logger->error($ex->getMessage());
            die($ex->getMessage());
        }

        return json_decode($response->getBody());
    }
}