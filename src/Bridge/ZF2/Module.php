<?php

declare(strict_types=1);

namespace Cocur\Slugify\Bridge\ZF2;

use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\ModuleManager\Feature\ViewHelperProviderInterface;

/**
 * Class Module
 * @package    cocur/slugify
 * @subpackage bridge
 * @license    http://www.opensource.org/licenses/MIT The MIT License
 */
class Module implements ServiceProviderInterface, ViewHelperProviderInterface
{
    public const CONFIG_KEY = 'cocur_slugify';

    /**
     * Expected to return \Zend\ServiceManager\Config object or array to
     * seed such an object.
     *
     * @return array<string,array<string,string>>
     */
    public function getServiceConfig(): array
    {
        return [
            'factories' => [
                \Cocur\Slugify\Slugify::class => \Cocur\Slugify\Bridge\ZF2\SlugifyService::class,
            ],
            'aliases' => [
                'slugify' => \Cocur\Slugify\Slugify::class,
            ],
        ];
    }

    /**
     * Expected to return \Zend\ServiceManager\Config object or array to
     * seed such an object.
     *
     * @return array<string,array<string,string>>|\Zend\ServiceManager\Config
     */
    public function getViewHelperConfig(): array
    {
        return [
            'factories' => [
                'slugify' => \Cocur\Slugify\Bridge\ZF2\SlugifyViewHelperFactory::class,
            ],
        ];
    }
}
