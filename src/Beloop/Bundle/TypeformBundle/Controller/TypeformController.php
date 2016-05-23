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

namespace Beloop\Bundle\TypeformBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

use Mmoreram\ControllerExtraBundle\Annotation\Entity as EntityAnnotation;

use Beloop\Component\Typeform\Entity\TypeformQuiz;

class TypeformController  extends Controller
{
    /**
     * View typeform form module
     *
     * @param TypeformQuiz $quiz
     * @return array
     *
     * @Route(
     *      path = "/course/{code}/typeform-quiz/{id}",
     *      name = "beloop_view_module_typeform_quiz",
     *      methods = {"GET"}
     * )
     *
     * @Template
     *
     * @EntityAnnotation(
     *      class = {
     *          "factory" = "beloop.factory.typeform_quiz",
     *          "method" = "create",
     *          "static" = false
     *      },
     *      name = "quiz",
     *      mapping = {
     *          "id" = "~id~"
     *      },
     *      mappingFallback = true
     * )
     */
    public function viewTypeformQuizAction(TypeformQuiz $quiz)
    {
        $user = $this->getUser();

        $userEnrolled = $quiz->getCourse()->getEnrolledUsers()->contains($user);

        if (!$userEnrolled) {
            throw $this->createNotFoundException('The course does not exist');
        }

        if (!$quiz->isAvailable()) {
            throw $this->createNotFoundException('The course does not exist');
        }

        $course = $quiz->getCourse();

        $renderUrl = $this->generateUrl(
            'beloop_render_module_typeform_quiz',
            ['code' => $course->getCode(), 'id' => $quiz->getId()],
            UrlGeneratorInterface::ABSOLUTE_URL
        );

        return [
            'section' => 'my-courses',
            'user' => $user,
            'course' => $course,
            'module' => $quiz,
        ];
    }

    /**
     * Render quiz
     *
     * @param TypeformQuiz $quiz
     * @return array
     *
     * @Route(
     *      path = "/course/{code}/typeform-quiz/render/{id}",
     *      name = "beloop_render_module_typeform_quiz",
     *      methods = {"GET"}
     * )
     *
     * @EntityAnnotation(
     *      class = {
     *          "factory" = "beloop.factory.typeform_quiz",
     *          "method" = "create",
     *          "static" = false
     *      },
     *      name = "quiz",
     *      mapping = {
     *          "id" = "~id~"
     *      },
     *      mappingFallback = true
     * )
     */
    public function renderTypeformQuizAction(TypeformQuiz $quiz)
    {
        $user = $this->getUser();

        $userEnrolled = $quiz->getCourse()->getEnrolledUsers()->contains($user);

        if (!$userEnrolled) {
            throw $this->createNotFoundException('The course does not exist');
        }

        if (!$quiz->isAvailable()) {
            throw $this->createNotFoundException('The course does not exist');
        }

        $content = $this->get('beloop.typeform.page_renderer')->render($quiz);

        return new Response($content);
    }
}