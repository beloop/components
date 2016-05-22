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

namespace Beloop\Bundle\UserBundle\DependencyInjection;

use Symfony\Component\Config\Definition\ConfigurationInterface;

use Beloop\Bundle\CoreBundle\DependencyInjection\Abstracts\AbstractExtension;
use Beloop\Bundle\CoreBundle\DependencyInjection\Interfaces\EntitiesOverridableExtensionInterface;

/**
 * This is the class that loads and manages your bundle configuration.
 */
class BeloopUserExtension extends AbstractExtension implements EntitiesOverridableExtensionInterface
{
    /**
     * @var string
     *
     * Extension name
     */
    const EXTENSION_NAME = 'beloop_user';

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
            'beloop.entity.abstract_user.class' => $config['mapping']['abstract_user']['class'],
            'beloop.entity.abstract_user.mapping_file' => $config['mapping']['abstract_user']['mapping_file'],
            'beloop.entity.abstract_user.manager' => $config['mapping']['abstract_user']['manager'],
            'beloop.entity.abstract_user.enabled' => $config['mapping']['abstract_user']['enabled'],

            'beloop.entity.user.class' => $config['mapping']['user']['class'],
            'beloop.entity.user.mapping_file' => $config['mapping']['user']['mapping_file'],
            'beloop.entity.user.manager' => $config['mapping']['user']['manager'],
            'beloop.entity.user.enabled' => $config['mapping']['user']['enabled'],
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
            'eventDispatchers',
            'factories',
            'objectManagers',
            'providers',
            'repositories',
            'services',
            'wrappers',
        ];
    }

    /**
     * @return array
     */
    public function getEntitiesOverrides()
    {
        return [
            'Beloop\Component\User\Entity\Interfaces\UserInterface' => 'beloop.entity.user.class',
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