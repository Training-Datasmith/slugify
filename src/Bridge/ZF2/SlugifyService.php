<?php

declare(strict_types=1);

namespace Cocur\Slugify\Bridge\ZF2;

use Cocur\Slugify\Slugify;
use Zend\ServiceManager\ServiceManager;

/**
 * Class SlugifyService
 * @package    cocur/slugify
 * @subpackage bridge
 * @license    http://www.opensource.org/licenses/MIT The MIT License
 */
class SlugifyService
{
    /**
     * @param ServiceManager $sm
     */
    public function __invoke($sm): Slugify
    {
        $config = $sm->get('Config');

        $options  = $config[Module::CONFIG_KEY]['options'] ?? [];
        $provider = $config[Module::CONFIG_KEY]['provider'] ?? null;

        return new Slugify($options, $provider);
    }
}
