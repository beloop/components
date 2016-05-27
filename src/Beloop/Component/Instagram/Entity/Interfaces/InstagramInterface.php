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

namespace Beloop\Component\Instagram\Entity\Interfaces;

use Beloop\Component\Core\Entity\Interfaces\DateTimeInterface;
use Beloop\Component\Core\Entity\Interfaces\EnabledInterface;
use Beloop\Component\Core\Entity\Interfaces\IdentifiableInterface;
use Beloop\Component\Core\Entity\Interfaces\ImageInterface;

interface InstagramInterface
    extends
    IdentifiableInterface,
    EnabledInterface,
    ImageInterface,
    DateTimeInterface
{
    /**
     * @return string
     */
    public function getTitle();

    /**
     * @param string $title
     */
    public function setTitle($title);

    /**
     * @return mixed
     */
    public function getDescription();

    /**
     * @param mixed $description
     */
    public function setDescription($description);
}