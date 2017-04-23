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
use Beloop\Component\Core\Entity\Interfaces\PositionInterface;
use Beloop\Component\User\Entity\Interfaces\UserInterface;

/**
 * Interface LessonInterface
 */
interface LessonInterface
    extends
    IdentifiableInterface,
    PositionInterface,
    DateTimeInterface,
    EnabledInterface
{
    /**
     * @return mixed
     */
    public function getSlug();

    /**
     * @param mixed $slug
     * @return $this Self object
     */
    public function setSlug($slug);

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
    public function getModules();

    /**
     * @param Collection $modules
     * @return $this Self object
     */
    public function setModules(Collection $modules);

    /**
     * @param ModuleInterface $module
     * @return $this Self object
     */
    public function addModule(ModuleInterface $module);

    /**
     * @param ModuleInterface $module
     * @return $this Self object
     */
    public function removeModule(ModuleInterface $module);

    /**
     * @return mixed
     */
    public function getOffsetInDays();

    /**
     * @param int $days
     * @return $this Self object
     */
    public function setOffsetInDays($days);

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
     * Lesson is accessible by today
     */
    public function isAvailableForUser(UserInterface $user);
}
