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

namespace Beloop\Component\User\EventDispatcher;

use Beloop\Component\User\BeloopUserEvents;
use Beloop\Component\Core\EventDispatcher\Abstracts\AbstractEventDispatcher;
use Beloop\Component\Course\Entity\Interfaces\CourseInterface;
use Beloop\Component\User\Entity\Interfaces\AbstractUserInterface;
use Beloop\Component\User\Event\EnrolmentEvent;
use Beloop\Component\User\EventDispatcher\Interfaces\EnrolmentEventDispatcherInterface;

/**
 * Class EnrolmentEventDispatcher
 */
class EnrolmentEventDispatcher extends AbstractEventDispatcher implements EnrolmentEventDispatcherInterface
{
    /**
     * Dispatch enrolment event.
     *
     * @param AbstractUserInterface $user   User
     * @param CourseInterface       $course Course
     *
     * @return $this Self object
     */
    public function dispatchOnEnrolmentEvent(AbstractUserInterface $user, CourseInterface $course)
    {
        $event = new EnrolmentEvent($user, $course);
        $this
            ->eventDispatcher
            ->dispatch(
                BeloopUserEvents::COURSE_ENROLMENT,
                $event
            );
    }
}
