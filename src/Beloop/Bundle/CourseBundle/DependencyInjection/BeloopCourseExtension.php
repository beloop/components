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

namespace Beloop\Bundle\CourseBundle\DependencyInjection;

use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

use Beloop\Bundle\CoreBundle\DependencyInjection\Abstracts\AbstractExtension;
use Beloop\Bundle\CoreBundle\DependencyInjection\Interfaces\EntitiesOverridableExtensionInterface;

/**
 * This is the class that loads and manages your bundle configuration.
 */
class BeloopCourseExtension extends AbstractExtension implements EntitiesOverridableExtensionInterface
{
    /**
     * @var string
     *
     * Extension name
     */
    const EXTENSION_NAME = 'beloop_course';

    /**
     * Get the Config file location.
     *
     * @return string Config file location
     */
    public function getConfigFilesLocation()
    {
        return __DIR__ . '/../Resources/config';
    }

    /**
     * Return a new Configuration instance.
     *
     * If object returned by this method is an instance of
     * ConfigurationInterface, extension will use the Configuration to read allpurchasable_pack
     * bundle config definitions.
     *
     * Also will call getParametrizationValues method to load some config values
     * to internal parameters.
     *
     * @return ConfigurationInterface Configuration file
     */
    protected function getConfigurationInstance()
    {
        return new Configuration(static::EXTENSION_NAME);
    }

    /**
     * Load Parametrization definition.
     *
     * return array(
     *      'parameter1' => $config['parameter1'],
     *      'parameter2' => $config['parameter2'],
     *      ...
     * );
     *
     * @param array $config Bundles config values
     *
     * @return array Parametrization values
     */
    protected function getParametrizationValues(array $config)
    {
        return [
            'beloop.entity.course.class' => $config['mapping']['course']['class'],
            'beloop.entity.course.mapping_file' => $config['mapping']['course']['mapping_file'],
            'beloop.entity.course.manager' => $config['mapping']['course']['manager'],
            'beloop.entity.course.enabled' => $config['mapping']['course']['enabled'],

            'beloop.entity.course_enrolled_user.class' => $config['mapping']['course_enrolled_user']['class'],
            'beloop.entity.course_enrolled_user.mapping_file' => $config['mapping']['course_enrolled_user']['mapping_file'],
            'beloop.entity.course_enrolled_user.manager' => $config['mapping']['course_enrolled_user']['manager'],
            'beloop.entity.course_enrolled_user.enabled' => $config['mapping']['course_enrolled_user']['enabled'],

            'beloop.entity.lesson.class' => $config['mapping']['lesson']['class'],
            'beloop.entity.lesson.mapping_file' => $config['mapping']['lesson']['mapping_file'],
            'beloop.entity.lesson.manager' => $config['mapping']['lesson']['manager'],
            'beloop.entity.lesson.enabled' => $config['mapping']['lesson']['enabled'],

            'beloop.entity.abstract_module.class' => $config['mapping']['abstract_module']['class'],
            'beloop.entity.abstract_module.mapping_file' => $config['mapping']['abstract_module']['mapping_file'],
            'beloop.entity.abstract_module.manager' => $config['mapping']['abstract_module']['manager'],
            'beloop.entity.abstract_module.enabled' => $config['mapping']['abstract_module']['enabled'],

            'beloop.entity.page.class' => $config['mapping']['page']['class'],
            'beloop.entity.page.mapping_file' => $config['mapping']['page']['mapping_file'],
            'beloop.entity.page.manager' => $config['mapping']['page']['manager'],
            'beloop.entity.page.enabled' => $config['mapping']['page']['enabled'],
        ];
    }

    /**
     * Config files to load.
     *
     * @param array $config Configuration
     *
     * @return array Config files
     */
    public function getConfigFiles(array $config)
    {
        return [
            'directors',
            'factories',
            'objectManagers',
            'repositories',
            'services',
        ];
    }

    /**
     * Get entities overrides.
     *
     * Result must be an array with:
     * index: Original Interface
     * value: Parameter where class is defined.
     *
     * @return array Overrides definition
     */
    public function getEntitiesOverrides()
    {
        return [
            'Beloop\Component\Course\Entity\Interfaces\CourseInterface' => 'beloop.entity.course.class',
            'Beloop\Component\Course\Entity\Interfaces\LessonInterface' => 'beloop.entity.lesson.class',
            'Beloop\Component\Course\Entity\Interfaces\ModuleInterface' => 'beloop.entity.abstract_module.class',
        ];
    }

    /**
     * Returns the extension alias, same value as extension name.
     *
     * @return string The alias
     */
    public function getAlias()
    {
        return static::EXTENSION_NAME;
    }
}
