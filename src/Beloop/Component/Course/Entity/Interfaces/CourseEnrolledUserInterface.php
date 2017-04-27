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

namespace Beloop\Component\Course\Entity\Interfaces;

use Doctrine\Common\Collections\Collection;

use Beloop\Component\Core\Entity\Interfaces\DateTimeInterface;
use Beloop\Component\Core\Entity\Interfaces\EnabledInterface;
use Beloop\Component\Course\Entity\Interfaces\CourseInterface;
use Beloop\Component\User\Entity\Interfaces\UserInterface;

/**
 * Interface CourseEnrolledUserInterface
 */
interface CourseEnrolledUserInterface
    extends
    DateTimeInterface,
    EnabledInterface
{
    /**
     * @return DateTime
     */
    public function getEnrollmentDate();

    /**
     * @return DateTime
     */
    public function getEndDate();

    /**
     * @return UserInterface
     */
    public function getUser();

    /**
     * @return Self
     */
    public function setUser(UserInterface $user);

    /**
     * @return CourseInterface
     */
    public function getCourse();

    /**
     * @return Self
     */
    public function setCourse(CourseInterface $course);
}
