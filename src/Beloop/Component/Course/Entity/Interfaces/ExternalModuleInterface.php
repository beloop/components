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
use Beloop\Component\Course\Entity\Interfaces\ModuleInterface;

/**
 * Interface ExternalModuleInterface
 */
interface ExternalModuleInterface
    extends
    ModuleInterface,
    IdentifiableInterface,
    PositionInterface,
    DateTimeInterface,
    EnabledInterface
{
    /**
     * @return mixed
     */
    public function getType();

    /**
     * @return mixed
     */
    public function getUrl();

    /**
     * @param mixed $url
     * @return $this Self object
     */
    public function setUrl($url);
}