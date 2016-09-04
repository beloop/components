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
     * @return DateTime
     */
    public function getStartDate();

    /**
     * @param DateTime $startDate
     * @return $this Self object
     */
    public function setStartDate($startDate);

    /**
     * @return DateTime
     */
    public function getEndDate();

    /**
     * @param DateTime $endDate
     * @return $this Self object
     */
    public function setEndDate($endDate);

    /**
     * Course is accessible by today
     */
    public function isAvailable();

    /**
     * @return Collection
     */
    public function getEnrolledUsers();

    /**
     * @param Collection $enrolledUsers
     * @return $this Self object
     */
    public function setEnrolledUsers(Collection $enrolledUsers);

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