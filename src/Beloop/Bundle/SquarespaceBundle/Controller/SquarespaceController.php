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
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

use Mmoreram\ControllerExtraBundle\Annotation\Entity as EntityAnnotation;

use Beloop\Component\Squarespace\Entity\SquarespacePage;

class SquarespaceController extends Controller
{
    /**
     * View squarespace page module
     *
     * @param SquarespacePage $page
     * @return array
     *
     * @Route(
     *      path = "/course/{code}/sq-page/{id}",
     *      name = "beloop_view_module_squarespace_page",
     *      methods = {"GET"}
     * )
     *
     * @Template
     *
     * @EntityAnnotation(
     *      class = {
     *          "factory" = "beloop.factory.squarespace_page",
     *          "method" = "create",
     *          "static" = false
     *      },
     *      name = "page",
     *      mapping = {
     *          "id" = "~id~"
     *      },
     *      mappingFallback = true
     * )
     */
    public function viewSquarespacePageAction(SquarespacePage $page)
    {
        $user = $this->getUser();
        $course = $page->getCourse();

        // Extra checks if user is not TEACHER or ADMIN
        if (
            false === $this->get('security.authorization_checker')->isGranted('ROLE_TEACHER') &&
            false === $course->isDemo()
        ) {
            $userEnrolled = $course->getEnrolledUsers()->contains($user);

            if (!$userEnrolled) {
                throw $this->createNotFoundException('The course does not exist');
            }

            if (!$page->isAvailableForUser($user)) {
                throw $this->createNotFoundException('The course does not exist');
            }
        }

        $renderUrl = $this->generateUrl(
            'beloop_render_module_squarespace_page',
            ['code' => $course->getCode(), 'id' => $page->getId()],
            UrlGeneratorInterface::ABSOLUTE_URL
        );

        return [
            'section' => $course->isDemo() ? 'public-courses' : 'my-courses',
            'user' => $user,
            'course' => $course,
            'module' => $page,
            'renderUrl' => $renderUrl
        ];
    }

    /**
     * Render password protected page
     *
     * @param SquarespacePage $page
     * @return array
     *
     * @Route(
     *      path = "/course/{code}/sq-page/render/{id}",
     *      name = "beloop_render_module_squarespace_page",
     *      methods = {"GET"}
     * )
     *
     * @EntityAnnotation(
     *      class = {
     *          "factory" = "beloop.factory.squarespace_page",
     *          "method" = "create",
     *          "static" = false
     *      },
     *      name = "page",
     *      mapping = {
     *          "id" = "~id~"
     *      },
     *      mappingFallback = true
     * )
     */
    public function renderSquarespacePageAction(SquarespacePage $page)
    {
        $user = $this->getUser();
        $course = $page->getCourse();

        // Extra checks if user is not TEACHER or ADMIN
        if (
            false === $this->get('security.authorization_checker')->isGranted('ROLE_TEACHER') &&
            false === $course->isDemo()
        ) {
            $userEnrolled = $course->getEnrolledUsers()->contains($user);

            if (!$userEnrolled) {
                throw $this->createNotFoundException('The course does not exist');
            }

            if (!$page->isAvailableForUser($user)) {
                throw $this->createNotFoundException('The course does not exist');
            }
        }

        $content = $this->get('beloop.squarespace.page_renderer')->render($page);

        return new Response($content);
    }
}
