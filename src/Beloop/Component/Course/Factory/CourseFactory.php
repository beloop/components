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

namespace Beloop\Component\Course\Factory;

use DateInterval;
use DateTime;

use Doctrine\Common\Collections\ArrayCollection;

use Beloop\Component\Core\Factory\Abstracts\AbstractFactory;
use Beloop\Component\Language\Factory\LanguageFactory;

/**
 * Factory for Course entities.
 */
class CourseFactory extends AbstractFactory
{
    private $languageFactory;

    public function __construct(LanguageFactory $languageFactory)
    {
        $this->languageFactory = $languageFactory;
    }

    /**
     * Creates an instance of an entity.
     *
     * Queries should be implemented in a repository class
     *
     * This method must always return an empty instance of the related Entity
     * and must initialize it in a consistent state
     *
     * @return object Empty entity
     */
    public function create()
    {
        $language = $this->languageFactory->create();

        $now = new DateTime();
        $end = (new DateTime())->add(DateInterval::createFromDateString("6 months"));

        /**
         * @var Course $course
         */
        $classNamespace = $this->getEntityNamespace();
        $course = new $classNamespace();

        $course
            ->setLessons(new ArrayCollection())
            ->setStartDate($now)
            ->setEndDate($end)
            ->setLanguage($language)
            ->enable()
            ->setCreatedAt($now);

        return $course;
    }
}