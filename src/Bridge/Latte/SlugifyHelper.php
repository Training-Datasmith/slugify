<?php

declare (strict_types=1);
namespace Cocur\Slugify\Bridge\Latte;

use Cocur\Slugify\Slugify_Interface;
/**
 * SlugifyHelper
 *
 * @package    cocur/slugify
 * @subpackage bridge
 * @author     Lukáš Unger <looky.msc@gmail.com>
 * @license    http://www.opensource.org/licenses/MIT The MIT License
 */
class Slugify_Helper
{
    /**
     * @codeCoverageIgnore
     */
    public function __construct(private Slugify_Interface $slugify)
    {
    }
    /**
     * @param string|null $separator
     *
     */
    public function slugify(string $string, array|string|null $separator = null): string
    {
        return $this->slugify->slugify($string, $separator);
    }
}