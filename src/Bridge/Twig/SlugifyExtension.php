<?php

declare(strict_types=1);

/**
 * This file is part of cocur/slugify.
 *
 * (c) Florian Eckerstorfer <florian@eckerstorfer.co>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Cocur\Slugify\Bridge\Twig;

use Cocur\Slugify\SlugifyInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

/**
 * SlugifyExtension
 *
 * @package    cocur/slugify
 * @subpackage bridge
 * @author     Florian Eckerstorfer <florian@eckerstorfer.co>
 * @copyright  2012-2015 Florian Eckerstorfer
 * @license    http://www.opensource.org/licenses/MIT The MIT License
 */
class SlugifyExtension extends AbstractExtension
{
    /**
     * Constructor.
     *
     *
     * @codeCoverageIgnore
     */
    public function __construct(private SlugifyInterface $slugify)
    {
    }

    /**
     * Returns the Twig functions of this extension.
     *
     * @return TwigFilter[]
     */
    public function getFilters(): array
    {
        return [
            new TwigFilter('slugify', [$this, 'slugifyFilter']),
        ];
    }

    /**
     * Slugify filter.
     *
     * @param string      $string
     * @param string|null $separator
     */
    public function slugifyFilter($string, $separator = null): string
    {
        return $this->slugify->slugify($string, $separator);
    }

    /**
     * get Name
     */
    public function getName(): string
    {
        return 'SlugifyExtension';
    }
}
