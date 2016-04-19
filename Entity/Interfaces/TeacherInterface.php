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

namespace Beloop\Component\User\Entity\Interfaces;

use Doctrine\Common\Collections\Collection;

use Beloop\Component\Course\Entity\Interfaces\CourseInterface;

interface TeacherInterface extends AbstractUserInterface
{
    /**
     * @return Collection
     */
    public function getCourses();

    /**
     * @param Collection $courses
     * @return $this Self object
     */
    public function setCourses(Collection $courses);

    /**
     * @param CourseInterface $lesson
     * @return $this Self object
     */
    public function addLesson(CourseInterface $lesson);

    /**
     * @param CourseInterface $lesson
     * @return $this Self object
     */
    public function removeLesson(CourseInterface $lesson);
}