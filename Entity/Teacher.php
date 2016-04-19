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

namespace Beloop\Component\User\Entity;

use Beloop\Component\Course\Entity\Interfaces\CourseInterface;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Security\Core\Role\Role;

use Beloop\Component\User\Entity\Abstracts\AbstractUser;
use Beloop\Component\User\Entity\Interfaces\TeacherInterface;

class Teacher extends AbstractUser implements TeacherInterface
{
    /**
     * User roles.
     *
     * @return string[] Roles
     */
    public function getRoles()
    {
        return [
            new Role('ROLE_TEACHER'),
        ];
    }

    /**
     * @return Collection
     */
    public function getCourses()
    {
        // TODO: Implement getCourses() method.
    }

    /**
     * @param Collection $courses
     * @return $this Self object
     */
    public function setCourses(Collection $courses)
    {
        // TODO: Implement setCourses() method.
    }

    /**
     * @param CourseInterface $lesson
     * @return $this Self object
     */
    public function addLesson(CourseInterface $lesson)
    {
        // TODO: Implement addLesson() method.
    }

    /**
     * @param CourseInterface $lesson
     * @return $this Self object
     */
    public function removeLesson(CourseInterface $lesson)
    {
        // TODO: Implement removeLesson() method.
    }
}