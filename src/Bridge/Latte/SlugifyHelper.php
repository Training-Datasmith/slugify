<?php

namespace Cocur\Slugify\Bridge\Latte;

use Cocur\Slugify\SlugifyInterface;

/**
 * SlugifyHelper
 *
 * @package    cocur/slugify
 * @subpackage bridge
 * @author     Lukáš Unger <looky.msc@gmail.com>
 * @license    http://www.opensource.org/licenses/MIT The MIT License
 */
class SlugifyHelper
{
    /**
     * @codeCoverageIgnore
     */
    public function __construct(private SlugifyInterface $slugify)
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
