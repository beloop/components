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

namespace Beloop\Component\Instagram\Entity;

use Beloop\Component\Core\Entity\Traits\DateTimeTrait;
use Beloop\Component\Core\Entity\Traits\EnabledTrait;
use Beloop\Component\Core\Entity\Traits\IdentifiableTrait;
use Beloop\Component\Instagram\Entity\Interfaces\CommentInterface;
use Beloop\Component\Instagram\Entity\Interfaces\InstagramInterface;
use Beloop\Component\User\Entity\Interfaces\UserInterface;

/**
 * Class Comment entity.
 */
class Comment implements CommentInterface
{
    use IdentifiableTrait,
        EnabledTrait,
        DateTimeTrait;

    /**
     * @var string
     *
     * Image text
     */
    protected $text;

    /**
     * @var InstagramInterface
     */
    protected $image;

    /**
     * @var UserInterface
     */
    protected $user;

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return $this
     */
    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return InstagramInterface
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param InstagramInterface $image
     * @return $this
     */
    public function setImage(InstagramInterface $image)
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param UserInterface $user
     * @return $this
     */
    public function setUser(UserInterface $user)
    {
        $this->user = $user;

        return $this;
    }
}