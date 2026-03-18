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

namespace Cocur\Slugify\RuleProvider;

/**
 * RuleProviderInterface
 *
 * @package   Cocur\Slugify\RuleProvider
 * @author    Florian Eckerstorfer
 * @copyright 2015 Florian Eckerstorfer
 */
interface RuleProviderInterface
{
    /**
     * @param $ruleset
     */
    public function getRules(string $ruleset): array;
}
