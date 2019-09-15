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

namespace Beloop\Component\Core\Factory\Traits;

/**
 * Trait EntityNamespaceTrait.
 */
trait EntityNamespaceTrait
{
    /**
     * @var string
     *
     * Entity namespace
     */
    private $entityNamespace;

    /**
     * Set Entity Namespace.
     *
     * @param string $entityNamespace Entity namespace
     *
     * @return $this Self object
     */
    public function setEntityNamespace($entityNamespace)
    {
        $this->entityNamespace = $entityNamespace;

        return $this;
    }

    /**
     * Get entity Namespace.
     *
     * @return string Entity Namespace
     */
    public function getEntityNamespace()
    {
        return $this->entityNamespace;
    }
}
