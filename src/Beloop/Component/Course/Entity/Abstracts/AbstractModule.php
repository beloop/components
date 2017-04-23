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

namespace Beloop\Component\Course\Entity\Abstracts;

use DateTime;

use Beloop\Component\Core\Entity\Traits\DateTimeTrait;
use Beloop\Component\Core\Entity\Traits\EnabledTrait;
use Beloop\Component\Core\Entity\Traits\IdentifiableTrait;
use Beloop\Component\Core\Entity\Traits\PositionTrait;
use Beloop\Component\Course\Entity\Interfaces\LessonInterface;
use Beloop\Component\Course\Entity\Interfaces\ModuleInterface;
use Beloop\Component\User\Entity\Interfaces\UserInterface;

/**
 * Class Module
 */
abstract class AbstractModule implements ModuleInterface
{
    use IdentifiableTrait,
        EnabledTrait,
        DateTimeTrait,
        PositionTrait;

    private $name;
    private $icon;

    private $lesson;

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
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * @param mixed $icon
     * @return $this Self object
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLesson()
    {
        return $this->lesson;
    }

    /**
     * @param LessonInterface $lesson
     * @return $this Self object
     */
    public function setLesson(LessonInterface $lesson)
    {
        $this->lesson = $lesson;
        return $this;
    }

    /**
     * Module is accessible by today
     */
    public function isAvailableForUser(UserInterface $user) {
      return $this->lesson->isAvailableForUser($user);
    }

    /**
     * Get module course
     */
    public function getCourse()
    {
        return $this->getLesson()->getCourse();
    }

    /**
     * Clone module
     */
    public function __clone()
    {
        if ($this->id) {
            $this->setId(null);
        }
    }

    abstract public function getType();
}
