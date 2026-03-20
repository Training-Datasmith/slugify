<?php

declare (strict_types=1);
namespace Cocur\Slugify\Bridge\ZF2;

use Zend\Module_Manager\Feature\Service_Provider_Interface;
use Zend\Module_Manager\Feature\View_Helper_Provider_Interface;
/**
 * Class Module
 * @package    cocur/slugify
 * @subpackage bridge
 * @license    http://www.opensource.org/licenses/MIT The MIT License
 */
class Module implements Service_Provider_Interface, View_Helper_Provider_Interface
{
    public const CONFIG_KEY = 'cocur_slugify';
    /**
     * Expected to return \Zend\ServiceManager\Config object or array to
     * seed such an object.
     *
     * @return array<string,array<string,string>>
     */
    public function get_service_config(): array
    {
        return ['factories' => [\Cocur\Slugify\Slugify::class => \Cocur\Slugify\Bridge\ZF2\Slugify_Service::class], 'aliases' => ['slugify' => \Cocur\Slugify\Slugify::class]];
    }
    /**
     * Expected to return \Zend\ServiceManager\Config object or array to
     * seed such an object.
     *
     * @return array<string,array<string,string>>|\Zend\ServiceManager\Config
     */
    public function get_view_helper_config(): array
    {
        return ['factories' => ['slugify' => \Cocur\Slugify\Bridge\ZF2\Slugify_View_Helper_Factory::class]];
    }
}