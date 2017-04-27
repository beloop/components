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

namespace Beloop\Component\User\EventDispatcher\Interfaces;

use Beloop\Component\Course\Entity\Interfaces\CourseInterface;
use Beloop\Component\User\Entity\Interfaces\AbstractUserInterface;

/**
 * Interface EnrolmentEventDispatcherInterface
 */
interface EnrolmentEventDispatcherInterface
{
    /**
     * Dispatch enrolment event.
     *
     * @param AbstractUserInterface $user   User
     * @param CourseInterface       $course Course
     *
     * @return $this Self object
     */
    public function dispatchOnEnrolmentEvent(
        AbstractUserInterface $user,
        CourseInterface $course
    );
}
