<?php

declare (strict_types=1);
namespace Cocur\Slugify\Bridge\ZF2;

use Cocur\Slugify\Slugify;
use Zend\View\Helper_Plugin_Manager;
/**
 * Class SlugifyViewHelperFactory
 * @package    cocur/slugify
 * @subpackage bridge
 * @license    http://www.opensource.org/licenses/MIT The MIT License
 */
class Slugify_View_Helper_Factory
{
    /**
     * @param HelperPluginManager $vhm
     */
    public function __invoke($vhm): \Cocur\Slugify\Bridge\ZF2\Slugify_View_Helper
    {
        /** @var Slugify $slugify */
        $slugify = $vhm->get_service_locator()->get(Slugify::class);
        return new Slugify_View_Helper($slugify);
    }
}