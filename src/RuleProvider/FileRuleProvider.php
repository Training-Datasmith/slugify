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
 * FileRuleProvider
 *
 * @package   Cocur\Slugify\RuleProvider
 * @author    Florian Eckerstorfer
 * @copyright 2015 Florian Eckerstorfer
 */
class FileRuleProvider implements RuleProviderInterface
{
    public function __construct(protected string $directoryName)
    {
    }

    public function getRules(string $ruleset): array
    {
        $fileName = $this->directoryName . DIRECTORY_SEPARATOR . $ruleset . '.json';

        return json_decode(file_get_contents($fileName), true);
    }
}
