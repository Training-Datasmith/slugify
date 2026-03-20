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
namespace Cocur\Slugify\Rule_Provider;

/**
 * FileRuleProvider
 *
 * @package   Cocur\Slugify\RuleProvider
 * @author    Florian Eckerstorfer
 * @copyright 2015 Florian Eckerstorfer
 */
class File_Rule_Provider implements Rule_Provider_Interface
{
    public function __construct(protected string $directory_name)
    {
    }
    public function get_rules(string $ruleset): array
    {
        $file_name = $this->directory_name . DIRECTORY_SEPARATOR . $ruleset . '.json';
        return json_decode(file_get_contents($file_name), true);
    }
}