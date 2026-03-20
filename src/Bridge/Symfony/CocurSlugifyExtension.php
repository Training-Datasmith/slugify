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

use Cocur\Slugify\Bridge\Twig\Slugify_Extension;
use Cocur\Slugify\Slugify;
use Cocur\Slugify\Slugify_Interface;
use Symfony\Component\Dependency_Injection\Container_Builder;
use Symfony\Component\Dependency_Injection\Definition;
use Symfony\Component\Dependency_Injection\Extension\Extension;
use Symfony\Component\Dependency_Injection\Reference;
/**
 * CocurSlugifyExtension
 *
 * @package    cocur/slugify
 * @subpackage bridge
 * @author     Florian Eckerstorfer <florian@eckerstorfer.co>
 * @copyright  2012-2014 Florian Eckerstorfer
 * @license    http://www.opensource.org/licenses/MIT The MIT License
 */
class Cocur_Slugify_Extension extends Extension
{
    /**
     * {@inheritDoc}
     *
     * @param mixed[]          $configs
     */
    public function load(array $configs, Container_Builder $container): void
    {
        $configuration = new Configuration();
        $config = $this->process_configuration($configuration, $configs);
        if (empty($config['rulesets'])) {
            unset($config['rulesets']);
        }
        // Extract slugify arguments from config
        $slugify_arguments = array_intersect_key($config, array_flip(['lowercase', 'trim', 'strip_tags', 'separator', 'regexp', 'rulesets']));
        $container->set_definition('cocur_slugify', new Definition(Slugify::class, [$slugify_arguments]));
        $container->set_definition('cocur_slugify.twig.slugify', new Definition(Slugify_Extension::class, [new Reference('cocur_slugify')]))->add_tag('twig.extension')->set_public(false);
        $container->set_alias('slugify', 'cocur_slugify');
        $container->set_alias(Slugify_Interface::class, 'cocur_slugify');
    }
}