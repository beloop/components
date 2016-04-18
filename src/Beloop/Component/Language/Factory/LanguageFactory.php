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

namespace Beloop\Component\Language\Factory;

use Beloop\Component\Core\Factory\Abstracts\AbstractFactory;

/**
 * Class LanguageFactory.
 */
class LanguageFactory extends AbstractFactory
{
    /**
     * Creates an instance of a simple language.
     *
     * This method must return always an empty instance for related entity
     *
     * @return LanguageInterface Empty entity
     */
    public function create()
    {
        /**
         * @var LanguageInterface $language
         */
        $classNamespace = $this->getEntityNamespace();
        $language = new $classNamespace();
        
        $language->setEnabled(true);

        return $language;
    }
}