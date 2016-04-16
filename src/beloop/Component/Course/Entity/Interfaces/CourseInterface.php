<?php

/*
 * This file is part of the beloop package.
 *
 * Copyright (c) 2016 beloop Studio B.V.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Feel free to edit as you please, and have fun.
 *
 * @author Arkaitz Garro <arkaitz.garro@gmail.com>
 */

namespace beloop\Component\Course\Entity\Interfaces;

use Doctrine\Common\Collections\Collection;

use beloop\Component\Core\Entity\Interfaces\IdentifiableInterface;
use beloop\Component\Core\Entity\Interfaces\DateTimeInterface;
use beloop\Component\Core\Entity\Interfaces\EnabledInterface;

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
     * @return Collection
     */
    public function getLessons();

    /**
     * @param Collection $lessons
     * @return $this Self object
     */
    public function setLessons(Collection $lessons);

    /**
     * @param Lesson $lesson
     * @return $this Self object
     */
    public function addLesson(LessonInterface $lesson);

    /**
     * @param Lesson $lesson
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
}