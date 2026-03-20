<?php

declare (strict_types=1);
/**
 * This file is part of cocur/slugify.
 *
 * (c) Florian Eckerstorfer <florian@eckerstorfer.co>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Cocur\Slugify\Bridge\Laravel;

use Illuminate\Support\Facades\Facade;
/**
 * SlugifyFacade
 *
 * @package    cocur/slugify
 * @subpackage bridge
 * @author     Florian Eckerstorfer <florian@eckerstorfer.co>
 * @author     Colin Viebrock
 * @copyright  2012-2014 Florian Eckerstorfer
 * @license    http://www.opensource.org/licenses/MIT The MIT License
 */
class Slugify_Facade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     *
     * @codeCoverageIgnore
     */
    protected static function get_facade_accessor(): string
    {
        return 'slugify';
    }
}