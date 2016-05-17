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

namespace Beloop\Component\Core\EventDispatcher\Abstracts;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class AbstractEventDispatcher
{
    /**
     * @var EventDispatcherInterface
     *
     * EventDispatcher
     */
    protected $eventDispatcher;
    
    /**
     * Construct method.
     *
     * @param EventDispatcherInterface $eventDispatcher Event Dispatcher
     */
    public function __construct(EventDispatcherInterface $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
    }
}