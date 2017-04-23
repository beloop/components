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

namespace Beloop\Component\Course\Entity;

use DateInterval;
use DateTime;
use Serializable;

use Beloop\Component\Core\Entity\Traits\DateTimeTrait;
use Beloop\Component\Core\Entity\Traits\EnabledTrait;
use Beloop\Component\Core\Entity\Traits\IdentifiableTrait;
use Beloop\Component\Course\Entity\Interfaces\CourseEnrolledUserInterface;

/**
 * Class CourseEnrolledUser entity.
 */
class CourseEnrolledUser implements CourseEnrolledUserInterface, Serializable
{
    use IdentifiableTrait,
        EnabledTrait,
        DateTimeTrait;

    protected $user;
    protected $course;
    protected $enrollmentDate;
    protected $endDate;

    /**
     * CourseEnrolledUser constructor.
     */
    public function __construct()
    {
        $this->enrollmentDate = new DateTime();
        $this->endDate = (new DateTime())->add(DateInterval::createFromDateString("6 months"));
    }

    public function getEnrollmentDate() {
      return $this->enrollmentDate;
    }

    public function getEndDate() {
      return $this->endDate;
    }

    public function getUser() {
      return $this->user;
    }

    public function getCourse() {
      return $this->course;
    }

    public function serialize() {
        return [
            'user_id' => $this->user->getId(),
            'course_id' => $this->course->getId(),
            'enrollmentDate' => $this->enrollmentDate->getTimestamp() * 1000,
            'endDate' => $this->endDate->getTimestamp() * 1000,
            'enabled' => $this->enabled
        ];
    }

    public function unserialize($serialized) {}
}
