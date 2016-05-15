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

namespace Beloop\Component\Course\Entity\Abstracts;

use Beloop\Component\Course\Entity\Abstracts\AbstractModule;
use Beloop\Component\Course\Entity\Interfaces\ExternalModuleInterface;

/**
 * Class ExternalModule
 */
abstract class ExternalModule extends AbstractModule implements ExternalModuleInterface
{
    private $url;

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     * @return $this Self object
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }
}