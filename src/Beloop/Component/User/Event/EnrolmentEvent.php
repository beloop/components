<?php

/*
 * This file is part of the Beloop package.
 *
 * Copyright (c) 2017 AHDO Studio B.V.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Feel free to edit as you please, and have fun.
 *
 * @author Arkaitz Garro <arkaitz.garro@gmail.com>
 */

namespace Beloop\Component\User\Event;

use Symfony\Component\EventDispatcher\Event;

use Beloop\Component\Course\Entity\Interfaces\CourseInterface;
use Beloop\Component\User\Entity\Interfaces\AbstractUserInterface;

/**
 * Class EnrolmentEvent
 */
final class EnrolmentEvent extends Event
{
    /**
     * @var AbstractUserInterface
     *
     * User
     */
    private $user;

    /**
     * @var CourseInterface
     *
     * User
     */
    private $course;

    /**
     * Construct method.
     *
     * @param AbstractUserInterface $user   User
     * @param CourseInterface       $course Course
     */
    public function __construct(AbstractUserInterface $user, CourseInterface $course)
    {
        $this->user = $user;
        $this->course = $course;
    }

    /**
     * Get user.
     *
     * @return AbstractUserInterface User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Get course.
     *
     * @return CourseInterface Course
     */
    public function getCourse()
    {
        return $this->course;
    }
}
