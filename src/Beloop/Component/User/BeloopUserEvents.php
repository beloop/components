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

namespace Beloop\Component\User;

/**
 * Class BeloopUserEvents
 */
final class BeloopUserEvents
{
    /**
     * This event is fired when customer wants to remember his password.
     *
     * event.name : password.remember
     * event.class : PasswordRememberEvent
     */
    const PASSWORD_REMEMBER = 'password.remember';

    /**
     * This event is fired when customer wants to recover his password.
     *
     * event.name : password.recover
     * event.class : PasswordRecoverEvent
     */
    const PASSWORD_RECOVER = 'password.recover';

    /**
     * This event is fired when a user is registered.
     *
     * event.name : user.register
     * event.class : UserRegisterEvent
     */
    const USER_REGISTER = 'user.register';

    /**
     * This event is fired when a user is enroled in a course.
     *
     * event.name : user.enrolment
     * event.class : EnrolmentEvent
     */
    const COURSE_ENROLMENT = 'user.enrolment';
}
