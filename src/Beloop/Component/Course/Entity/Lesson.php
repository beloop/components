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

use \DateTime;

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

/**
 * Course lesson representation
 */
class Lesson implements LessonInterface
{
    use IdentifiableTrait,
        EnabledTrait,
        DateTimeTrait,
        PositionTrait;

    protected $name;
    protected $slug;
    protected $description;
    protected $modules;
    protected $startDate;

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
     * @param Module $module
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
     * @param Module $module
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
     * @return DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param DateTime $startDate
     * @return $this Self object
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
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
     * @param Course $course
     * @return $this Self object
     */
    public function setCourse(CourseInterface $course)
    {
        $this->course = $course;
        return $this;
    }

    /**
     * Lesson is accessible by today
     */
    public function isAvailable()
    {
        $today = new DateTime();

        return $this->course->isAvailable() && $today >= $this->getStartDate();
    }

}