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

namespace Beloop\Bundle\SquarespaceBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ProxyController
 */
class ProxyController extends Controller
{
    const COOKIE_JAR = 'sq_api.cookie_jar';

    /**
     * @var SessionInterface
     */
    protected $session;

    /**
     * Squarespace API proxy
     *
     * @Route(
     *      path = "/api/census/RecordHit",
     *      methods = {"POST"}
     * )
     *
     * @Route(
     *      path = "/api/form/FormSubmissionKey",
     *      methods = {"POST"}
     * )
     *
     * @Route(
     *      path = "/api/form/SaveFormSubmission",
     *      methods = {"POST"}
     * )
     */
    public function apiProxyAction(Request $request)
    {
        $client = $this->get('guzzle.client.api_squarespace');
        $authenticationService = $this->get('beloop.squarespace.authentication_service');

        $response = $client->post(
            $request->getPathInfo(),
            [
                'query' => $request->query->all(),
                'form_params' => $request->request->all(),
                'cookies' => $authenticationService->jar
            ]
        );

        return new Response($response->getBody(), $response->getStatusCode());
    }
}