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
use Beloop\Component\Instagram\Entity\Interfaces\InstagramInterface;

interface CommentInterface
    extends
    IdentifiableInterface,
    EnabledInterface,
    DateTimeInterface
{
    /**
     * @return string
     */
    public function getText();

    /**
     * @param string $text
     */
    public function setText($text);

    /**
     * @return InstagramInterface
     */
    public function getImage();

    /**
     * @param InstagramInterface $image
     */
    public function setImage(InstagramInterface $image);
}