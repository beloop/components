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
use beloop\Component\Core\Entity\Interfaces\PositionInterface;

/**
 * Interface ModuleInterface
 */
interface ModuleInterface
    extends
    IdentifiableInterface,
    PositionInterface,
    DateTimeInterface,
    EnabledInterface
{
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
    public function getUrl();

    /**
     * @param mixed $url
     * @return $this Self object
     */
    public function setUrl($url);

    /**
     * @return mixed
     */
    public function getIcon();

    /**
     * @param mixed $icon
     * @return $this Self object
     */
    public function setIcon($icon);

    /**
     * @return LessonInterface
     */
    public function getLesson();

    /**
     * @param LessonInterface $lesson
     * @return $this Self object
     */
    public function setLesson(LessonInterface $lesson);

    /**
     * Module is accessible by today
     */
    public function isAvailable();
}