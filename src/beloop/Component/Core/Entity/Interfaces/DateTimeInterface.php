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

namespace beloop\Component\Core\Entity\Interfaces;

use DateTime;

/**
 * Interface DateTimeInterface.
 */
interface DateTimeInterface
{
    /**
     * Set locally created at value.
     *
     * @param DateTime $createdAt Created at value
     *
     * @return $this Self object
     */
    public function setCreatedAt(DateTime $createdAt);

    /**
     * Return created_at value.
     *
     * @return DateTime
     */
    public function getCreatedAt();

    /**
     * Set locally updated at value.
     *
     * @param DateTime $updatedAt Updated at value
     *
     * @return $this Self object
     */
    public function setUpdatedAt(DateTime $updatedAt);

    /**
     * Return updated_at value.
     *
     * @return DateTime
     */
    public function getUpdatedAt();
}
