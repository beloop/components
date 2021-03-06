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

use Doctrine\Common\Collections\Collection;

use Beloop\Component\Core\Entity\Interfaces\DateTimeInterface;
use Beloop\Component\Core\Entity\Interfaces\EnabledInterface;
use Beloop\Component\Core\Entity\Interfaces\IdentifiableInterface;
use Beloop\Component\Core\Entity\Interfaces\ImageInterface;
use Beloop\Component\Course\Entity\Interfaces\CourseInterface;
use Beloop\Component\Instagram\Entity\Interfaces\CommentInterface;

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

    /**
     * @return CourseInterface
     */
    public function getCourse();

    /**
     * @param CourseInterface $course
     */
    public function setCourse(CourseInterface $course);

    /**
     * @return Collection
     */
    public function getComments();

    /**
     * @param Collection $comments
     * @return $this Self object
     */
    public function setComments(Collection $comments);

    /**
     * @param CommentInterface $comment
     * @return $this Self object
     */
    public function addComment(CommentInterface $comment);

    /**
     * @param CommentInterface $comment
     * @return $this Self object
     */
    public function removeComment(CommentInterface $comment);
}