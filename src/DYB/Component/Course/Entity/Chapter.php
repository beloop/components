<?php

/*
 * This file is part of the DYB package.
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

namespace DYB\Component\Course\Entity;

use \DateTime;

use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

use DYB\Component\Core\Entity\Traits\DateTimeTrait;
use DYB\Component\Core\Entity\Traits\EnabledTrait;
use DYB\Component\Core\Entity\Traits\IdentifiableTrait;
use DYB\Component\Core\Entity\Traits\OrderTrait;

/**
 * Course chapter representation
 */
class Chapter
{
    use IdentifiableTrait,
        EnabledTrait,
        DateTimeTrait,
        OrderTrait;

    protected $name;
    protected $slug;
    protected $description;
    protected $modules;
    protected $startDate;

    /**
     * Course constructor.
     */
    public function __construct()
    {
        $this->modules = new ArrayCollection();
        $this->startDate = new DateTime();
        $this->order = 1;
        $this->enable();
    }

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
    public function addModule(Module $module)
    {
        if (!$this->modules->contains($module)) {
            $this->modules->add($module);
        }

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


}