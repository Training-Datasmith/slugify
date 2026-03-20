<?php

declare (strict_types=1);
/*
 * This file is part of the cocur/slugify package.
 *
 * (c) Enrico Stahn <enrico.stahn@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Cocur\Slugify\Bridge\Symfony;

use Symfony\Component\Config\Definition\Builder\Tree_Builder;
use Symfony\Component\Config\Definition\Configuration_Interface;
class Configuration implements Configuration_Interface
{
    /**
     * {@inheritdoc}
     */
    public function get_config_tree_builder(): Tree_Builder
    {
        $tree_builder = new Tree_Builder('cocur_slugify');
        // Keep compatibility with symfony/config < 4.2
        if (\method_exists($tree_builder, 'getRootNode')) {
            $root_node = $tree_builder->get_root_node();
        } else {
            $root_node = $tree_builder->root('cocur_slugify');
        }
        $root_node->children()->boolean_node('lowercase')->end()->boolean_node('lowercase_after_regexp')->end()->boolean_node('trim')->end()->boolean_node('strip_tags')->end()->scalar_node('separator')->end()->scalar_node('regexp')->end()->array_node('rulesets')->prototype('scalar')->end()->end();
        return $tree_builder;
    }
}