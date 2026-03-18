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

namespace Cocur\Slugify\Bridge\Plum;

use Cocur\Slugify\Slugify;
use Cocur\Slugify\SlugifyInterface;
use Plum\Plum\Converter\ConverterInterface;

/**
 * SlugifyConverter
 *
 * @package   Cocur\Slugify\Bridge\Plum
 * @author    Florian Eckerstorfer <florian@eckerstorfer.co>
 * @copyright 2015 Florian Eckerstorfer
 */
class SlugifyConverter implements ConverterInterface
{
    private ?\Cocur\Slugify\SlugifyInterface $slugify;

    /**
     * @param SlugifyInterface|null $slugify
     */
    public function __construct(SlugifyInterface $slugify = null)
    {
        if ($slugify === null) {
            $slugify = new Slugify();
        }
        $this->slugify = $slugify;
    }

    public function convert(string $item): string
    {
        return $this->slugify->slugify($item);
    }
}
