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

namespace beloop\Component\Core\Entity\Traits;

/**
 * Trait for DateTime common variables and methods.
 */
trait DateTimeTrait
{
    /**
     * @var \DateTime
     *
     * Created at
     */
    protected $createdAt;

    /**
     * @var \DateTime
     *
     * Updated at
     */
    protected $updatedAt;

    /**
     * Set locally created at value.
     *
     * @param \DateTime $createdAt Created at value
     *
     * @return $this Self object
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Return created_at value.
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set locally updated at value.
     *
     * @param \DateTime $updatedAt Updated at value
     *
     * @return $this Self object
     */
    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Return updated_at value.
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Method triggered by LifeCycleEvent.
     * Sets or updates $this->updatedAt.
     */
    public function loadUpdateAt()
    {
        $this->setUpdatedAt(new \DateTime());
    }
}