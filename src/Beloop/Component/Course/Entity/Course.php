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

namespace Beloop\Component\Course\Entity;

use DateTime;
use Serializable;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use Beloop\Component\Core\Entity\Traits\DateTimeTrait;
use Beloop\Component\Core\Entity\Traits\EnabledTrait;
use Beloop\Component\Core\Entity\Traits\IdentifiableTrait;
use Beloop\Component\Core\Entity\Traits\ImageTrait;
use Beloop\Component\Course\Entity\Interfaces\CourseInterface;
use Beloop\Component\Course\Entity\Interfaces\CourseEnrolledUserInterface;
use Beloop\Component\Course\Entity\Interfaces\LessonInterface;
use Beloop\Component\Language\Entity\Traits\LanguageTrait;
use Beloop\Component\User\Entity\Interfaces\UserInterface;

/**
 * Class Course entity.
 */
class Course implements CourseInterface, Serializable
{
    use IdentifiableTrait,
        LanguageTrait,
        ImageTrait,
        EnabledTrait,
        DateTimeTrait;

    protected $code;
    protected $name;
    protected $description;
    protected $demo;

    protected $enrollments;
    protected $lessons;

    public function __construct()
    {
        $this->enrollments = new ArrayCollection();
        $this->lessons = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     * @return $this Self object
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getExtendedName()
    {
        return $this->code . ' - ' . $this->name;
    }

    /**
     * @param mixed $name
     * @return $this Self object
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     * @return $this Self object
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getDemo()
    {
        return $this->demo;
    }

    /**
     * @param boolean $demo
     */
    public function setDemo($demo)
    {
        $this->demo = $demo;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isDemo()
    {
        return $this->demo === true;
    }

    /**
     * Checks if the course is available for the given user.
     * The user is enrolled and enrolment period is valid.
     *
     * @param  UserInterface $user
     * @return boolean
     */
    public function isAvailableForUser(UserInterface $user) {
      $today = new DateTime();
      $enrollment = $this->getEnrollmentForUser($user);

      return $today >= $enrollment->getEnrollmentDate() && $today <= $enrollment->getEndDate();
    }

    /**
     * Finds the enrolment for the given user in this course.
     *
     * @param  UserInterface $user
     * @return CourseEnrolledUser
     */
    public function getEnrollmentForUser(UserInterface $user) {
      foreach ($this->enrollments as $enrollment) {
        if ($user->getId() === $enrollment->getUser()->getId()) {
          return $enrollment;
        }
      }
    }

    /**
     * Get course start date given a user
     * @param  UserInterface $user
     * @return DateTime
     */
    public function getStartDate(UserInterface $user) {
      return $this->getEnrollmentForUser($user)->getEnrollmentDate();
    }

    /**
     * Get course end date given a user
     * @param  UserInterface $user
     * @return DateTime
     */
    public function getEndDate(UserInterface $user) {
      return $this->getEnrollmentForUser($user)->getEndDate();
    }

    /**
     * @return Collection
     */
    public function getEnrollments()
    {
        return $this->enrollments;
    }

    /**
     * @param Collection $enrollments
     * @return $this Self object
     */
    public function setEnrollments(Collection $enrollments)
    {
        $this->enrollments = $enrollments;
        return $this;
    }

    /**
     * @param UserInterface $user
     * @return $this Self object
     */
    public function enrollUser(CourseEnrolledUserInterface $enrollment)
    {
        if (!$this->getEnrolledUsers()->contains($enrollment->getUser())) {
            $this->enrollments->add($enrollment);
        }

        return $this;
    }

    /**
     * @param UserInterface $user
     * @return $this Self object
     */
    public function unEnrollUser(CourseEnrolledUserInterface $enrollment)
    {
        throw new Exception('Implement user un-enrollment.');
        // $this
        //     ->enrolledUsers
        //     ->removeElement($user);

        // return $this;
    }

    /**
     * @return Collection
     */
    public function getLessons()
    {
        return $this->lessons;
    }

    /**
     * @param Collection $lessons
     * @return $this Self object
     */
    public function setLessons(Collection $lessons)
    {
        $this->lessons = $lessons;
        return $this;
    }

    /**
     * @param LessonInterface $lesson
     * @return $this Self object
     */
    public function addLesson(LessonInterface $lesson)
    {
        if (!$this->lessons->contains($lesson)) {
            $this->lessons->add($lesson);

            $lesson->setCourse($this);
        }

        return $this;
    }

    /**
     * @param LessonInterface $lesson
     * @return $this Self object
     */
    public function removeLesson(LessonInterface $lesson)
    {
        $this
            ->lessons
            ->removeElement($lesson);

        return $this;
    }

    /**
     * Get enrolled users
     * @return Collection
     */
    public function getEnrolledUsers() {
        $users = new ArrayCollection();
        foreach ($this->enrollments as $enrollment) {
            $users->add($enrollment->getUser());
        }

        return $users;
    }

    /**
     * Get course teachers
     * @return Collection
     */
    public function getTeachers() {
        $teachers = new ArrayCollection();
        foreach ($this->enrollments as $enrollment) {
            if ($enrollment->getUser()->hasRole('ROLE_TEACHER')) {
                $teachers->add($enrollment->getUser());
            }
        }

        return $teachers;
    }

    public function serialize() {
        return [
            'id' => $this->id,
            'code' => $this->code,
            'name' => $this->name,
            'description' => $this->description,
            'language' => $this->getLanguage()->getIso(),
            'demo' => $this->demo,
            'enabled' => $this->enabled,
            'enrollments' => count($this->enrollments),
            'lessons' => count($this->lessons),
        ];
    }

    public function unserialize($serialized) {}

    /**
     * Clone course
     */
    public function __clone()
    {
        if ($this->id) {
            $this->setId(null);
            $this->enrollments = new ArrayCollection();
            $this->code = 'CLONE-' . $this->code . '-' . rand();
            $this->name = 'CLONE ' . $this->name;

            // Clone lessons
            $lessons = $this->getLessons();
            $this->lessons = new ArrayCollection();
            foreach ($lessons as $lesson) {
                $lessonClone = clone $lesson;
                $lessonClone->setCourse($this);
                $this->addLesson($lessonClone);
            }
        }
    }
}
