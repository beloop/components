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

namespace Beloop\Component\Course\Entity;

use Beloop\Component\Course\Entity\Abstracts\AbstractModule;

class Page extends AbstractModule
{
    /**
     * Module type
     */
    const TYPE = 'regular_page';

    /**
     * @var string
     *
     * Page description
     */
    protected $description;

    /**
     * @var string
     * 
     * Page content
     */
    protected $content;

    /**
     * @return mixed
     */
    public function getType()
    {
        return static::TYPE;
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
     * @return $this Self object
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     * @return $this Self object
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }
}