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
namespace Cocur\Slugify\Bridge\Twig;

use Cocur\Slugify\Slugify_Interface;
use Twig\Extension\Abstract_Extension;
use Twig\Twig_Filter;
/**
 * SlugifyExtension
 *
 * @package    cocur/slugify
 * @subpackage bridge
 * @author     Florian Eckerstorfer <florian@eckerstorfer.co>
 * @copyright  2012-2015 Florian Eckerstorfer
 * @license    http://www.opensource.org/licenses/MIT The MIT License
 */
class Slugify_Extension extends Abstract_Extension
{
    /**
     * Constructor.
     *
     *
     * @codeCoverageIgnore
     */
    public function __construct(private Slugify_Interface $slugify)
    {
    }
    /**
     * Returns the Twig functions of this extension.
     *
     * @return TwigFilter[]
     */
    public function get_filters(): array
    {
        return [new Twig_Filter('slugify', [$this, 'slugifyFilter'])];
    }
    /**
     * Slugify filter.
     *
     * @param string      $string
     * @param string|null $separator
     */
    public function slugify_filter($string, $separator = null): string
    {
        return $this->slugify->slugify($string, $separator);
    }
    /**
     * get Name
     */
    public function get_name(): string
    {
        return 'SlugifyExtension';
    }
}