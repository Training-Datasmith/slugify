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
namespace Cocur\Slugify\Bridge\Symfony;

use Symfony\Component\Dependency_Injection\Extension\Extension_Interface;
use Symfony\Component\Http_Kernel\Bundle\Bundle;
/**
 * CocurSlugifyBundle
 *
 * @package    cocur/slugify
 * @subpackage bridge
 * @author     Florian Eckerstorfer <florian@eckerstorfer.co>
 * @copyright  2012-2014 Florian Eckerstorfer
 * @license    http://www.opensource.org/licenses/MIT The MIT License
 */
class Cocur_Slugify_Bundle extends Bundle
{
    public function get_container_extension(): Extension_Interface
    {
        return new Cocur_Slugify_Extension();
    }
}