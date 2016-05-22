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

namespace Beloop\Bundle\TypeformBundle\DependencyInjection;

use Symfony\Component\Config\Definition\ConfigurationInterface;

use Beloop\Bundle\CoreBundle\DependencyInjection\Abstracts\AbstractExtension;
use Beloop\Bundle\CoreBundle\DependencyInjection\Interfaces\EntitiesOverridableExtensionInterface;

/**
 * This is the class that loads and manages your bundle configuration.
 */
class BeloopTypeformExtension extends AbstractExtension implements EntitiesOverridableExtensionInterface
{
    /**
     * @var string
     *
     * Extension name
     */
    const EXTENSION_NAME = 'beloop_typeform';

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
     * ConfigurationInterface, extension will use the Configuration to read all
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
            'beloop.entity.typeform_quiz.class' => $config['mapping']['typeform_quiz']['class'],
            'beloop.entity.typeform_quiz.mapping_file' => $config['mapping']['typeform_quiz']['mapping_file'],
            'beloop.entity.typeform_quiz.manager' => $config['mapping']['typeform_quiz']['manager'],
            'beloop.entity.typeform_quiz.enabled' => $config['mapping']['typeform_quiz']['enabled'],
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