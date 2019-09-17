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

use DateInterval;
use DateTime;
use Serializable;

use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

use Beloop\Component\Core\Entity\Traits\DateTimeTrait;
use Beloop\Component\Core\Entity\Traits\EnabledTrait;
use Beloop\Component\Core\Entity\Traits\IdentifiableTrait;
use Beloop\Component\Core\Entity\Traits\PositionTrait;

use Beloop\Component\Course\Entity\Abstracts\Module;
use Beloop\Component\Course\Entity\Interfaces\CourseInterface;
use Beloop\Component\Course\Entity\Interfaces\LessonInterface;
use Beloop\Component\Course\Entity\Interfaces\ModuleInterface;

use Beloop\Component\User\Entity\Interfaces\UserInterface;

/**
 * Course lesson representation
 */
class Lesson implements LessonInterface, Serializable
{
    use IdentifiableTrait,
        EnabledTrait,
        DateTimeTrait,
        PositionTrait;

    protected $name;
    protected $slug;
    protected $description;
    protected $modules;
    protected $offsetInDays;
    protected $demo;

    protected $course;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
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
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param mixed $slug
     * @return $this Self object
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
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
     * @return ArrayCollection
     */
    public function getModules()
    {
        return $this->modules;
    }

    /**
     * @param Collection $modules
     * @return $this Self object
     */
    public function setModules(Collection $modules)
    {
        $this->modules = $modules;
        return $this;
    }

    /**
     * @param ModuleInterface $module
     * @return $this Self object
     */
    public function addModule(ModuleInterface $module)
    {
        if (!$this->modules->contains($module)) {
            $this->modules->add($module);
        }

        return $this;
    }

    /**
     * @param ModuleInterface $module
     * @return $this Self object
     */
    public function removeModule(ModuleInterface $module)
    {
        $this
            ->modules
            ->removeElement($module);

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCourse()
    {
        return $this->course;
    }

    /**
     * @param CourseInterface $course
     * @return $this Self object
     */
    public function setCourse(CourseInterface $course)
    {
        $this->course = $course;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOffsetInDays()
    {
        return $this->offsetInDays;
    }

    /**
     * @param int $days
     * @return $this Self object
     */
    public function setOffsetInDays($days)
    {
        $this->offsetInDays = $days;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDemo()
    {
        return $this->demo;
    }

    /**
     * @param mixed $demo
     */
    public function setDemo($demo)
    {
        $this->demo = $demo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function isDemo()
    {
        return $this->demo === true;
    }

    public function isAvailableForUser(UserInterface $user) {
      $today = new DateTime();
      $courseIsAvailable = $this->course->isAvailableForUser($user);

      return $this->isDemo() || ($courseIsAvailable && $this->getStartDate($user) <= $today);
    }

    public function getStartDate(UserInterface $user) {
      $enrollment = $this->course->getEnrollmentForUser($user);
      $enrollmentDate = clone $enrollment->getEnrollmentDate();
      return $enrollmentDate->add(new DateInterval('P' . $this->offsetInDays . 'D'));
    }

    public function serialize() {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'offsetInDays' => $this->offsetInDays,
            'enabled' => $this->enabled,
            'modules' => count($this->modules),
            'courseId' => $this->course->getId(),
        ];
    }

    public function unserialize($serialized) {}

    /**
     * Clone lesson
     */
    public function __clone()
    {
        if ($this->id) {
            $this->setId(null);

            // Clone modules
            $modules = $this->getModules();
            $this->modules = new ArrayCollection();
            foreach ($modules as $module) {
                $moduleClone = clone $module;
                $moduleClone->setLesson($this);
                $this->addModule($moduleClone);
            }
        }
    }

}
