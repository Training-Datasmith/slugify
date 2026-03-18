<?php

declare(strict_types=1);

namespace Cocur\Slugify\Bridge\ZF2;

use Cocur\Slugify\Slugify;
use Zend\View\HelperPluginManager;

/**
 * Class SlugifyViewHelperFactory
 * @package    cocur/slugify
 * @subpackage bridge
 * @license    http://www.opensource.org/licenses/MIT The MIT License
 */
class SlugifyViewHelperFactory
{
    /**
     * @param HelperPluginManager $vhm
     */
    public function __invoke($vhm): \Cocur\Slugify\Bridge\ZF2\SlugifyViewHelper
    {
        /** @var Slugify $slugify */
        $slugify = $vhm->getServiceLocator()->get(Slugify::class);

        return new SlugifyViewHelper($slugify);
    }
}
