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

use Doctrine\Common\Collections\Collection;

use Beloop\Component\Core\Entity\Traits\DateTimeTrait;
use Beloop\Component\Core\Entity\Traits\EnabledTrait;
use Beloop\Component\Core\Entity\Traits\IdentifiableTrait;
use Beloop\Component\Core\Entity\Traits\ImageTrait;
use Beloop\Component\Instagram\Entity\Interfaces\CommentInterface;
use Beloop\Component\Instagram\Entity\Interfaces\InstagramInterface;
use Beloop\Component\User\Entity\Interfaces\UserInterface;

/**
 * Class Instagram entity.
 */
class Instagram implements InstagramInterface
{
    use IdentifiableTrait,
        ImageTrait,
        EnabledTrait,
        DateTimeTrait;

    /**
     * @var string
     *
     * Image title
     */
    protected $title;

    /**
     * @var string
     *
     * Image description
     */
    protected $description;

    /**
     * @var User
     */
    protected $user;

    /**
     * @var Collection
     */
    protected $comments;

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
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
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

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

    /**
     * @return Collection
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param Collection $comments
     * @return $this Self object
     */
    public function setComments(Collection $comments)
    {
        $this->comments = $comments;
        return $this;
    }

    /**
     * @param CommentInterface $comment
     * @return $this Self object
     */
    public function addComment(CommentInterface $comment)
    {
        if (!$this->comments->contains($comment)) {
            $this->comments->add($comment);

            $comment->setImage($this);
        }

        return $this;
    }

    /**
     * @param CommentInterface $comment
     * @return $this Self object
     */
    public function removeComment(CommentInterface $comment)
    {
        $this
            ->comments
            ->removeElement($comment);

        return $this;
    }
}