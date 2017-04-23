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

namespace Beloop\Component\Course\Entity\Interfaces;

use Doctrine\Common\Collections\Collection;

use Beloop\Component\Core\Entity\Interfaces\IdentifiableInterface;
use Beloop\Component\Core\Entity\Interfaces\DateTimeInterface;
use Beloop\Component\Core\Entity\Interfaces\EnabledInterface;
use Beloop\Component\User\Entity\Interfaces\UserInterface;

/**
 * Interface CourseInterface
 */
interface CourseInterface
    extends
    IdentifiableInterface,
    DateTimeInterface,
    EnabledInterface
{
    /**
     * @return mixed
     */
    public function getCode();

    /**
     * @param mixed $code
     * @return $this Self object
     */
    public function setCode($code);

    /**
     * @return mixed
     */
    public function getName();

    /**
     * @param mixed $name
     * @return $this Self object
     */
    public function setName($name);

    /**
     * @return mixed
     */
    public function getDescription();

    /**
     * @param mixed $description
     * @return $this Self object
     */
    public function setDescription($description);

    /**
     * @return mixed
     */
    public function getDemo();

    /**
     * @param mixed $demo
     */
    public function setDemo($demo);

    /**
     * @return mixed
     */
    public function isDemo();

    /**
     * @return Collection
     */
    public function getLessons();

    /**
     * @param Collection $lessons
     * @return $this Self object
     */
    public function setLessons(Collection $lessons);

    /**
     * @param LessonInterface $lesson
     * @return $this Self object
     */
    public function addLesson(LessonInterface $lesson);

    /**
     * @param LessonInterface $lesson
     * @return $this Self object
     */
    public function removeLesson(LessonInterface $lesson);

    /**
     * Course is accessible for given user
     * @param UserInterface $user
     */
    public function isAvailableForUser(UserInterface $user);

    /**
     * Get enrollment data for a given user
     * @param UserInterface $user
     */
    public function getEnrollmentForUser(UserInterface $user);

    /**
     * Get course start date given a user
     * @param  UserInterface $user
     * @return DateTime
     */
    public function getStartDate(UserInterface $user);

    /**
     * Get course end date given a user
     * @param  UserInterface $user
     * @return DateTime
     */
    public function getEndDate(UserInterface $user);

    /**
     * @return Collection
     */
    public function getEnrollments();

    /**
     * @param Collection $enrollments
     * @return $this Self object
     */
    public function setEnrollments(Collection $enrollments);

    /**
     * @param UserInterface $user
     * @return $this Self object
     */
    public function enrollUser(UserInterface $user);

    /**
     * @param UserInterface $user
     * @return $this Self object
     */
    public function unEnrollUser(UserInterface $user);
}
