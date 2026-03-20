<?php

declare (strict_types=1);
namespace Cocur\Slugify\Bridge\Nette;

use Nette\DI\Compiler_Extension;
use Nette\DI\Service_Definition;
/**
 * SlugifyExtension
 *
 * @package    cocur/slugify
 * @subpackage bridge
 * @author     Lukáš Unger <looky.msc@gmail.com>
 * @license    http://www.opensource.org/licenses/MIT The MIT License
 */
class Slugify_Extension extends Compiler_Extension
{
    public function load_configuration(): void
    {
        $builder = $this->get_container_builder();
        $builder->add_definition($this->prefix('slugify'))->set_class(\Cocur\Slugify\Slugify_Interface::class)->set_factory(\Cocur\Slugify\Slugify::class);
        $builder->add_definition($this->prefix('helper'))->set_class(\Cocur\Slugify\Bridge\Latte\Slugify_Helper::class)->set_autowired(false);
    }
    public function before_compile(): void
    {
        $builder = $this->get_container_builder();
        $self = $this;
        $register_to_latte = function (Service_Definition $def) use ($self): void {
            $def->add_setup('addFilter', ['slugify', [$self->prefix('@helper'), 'slugify']]);
        };
        $latte_factory = $builder->get_by_type('Nette\Bridges\ApplicationLatte\ILatteFactory') ?: 'nette.latteFactory';
        if ($builder->has_definition($latte_factory)) {
            $register_to_latte($builder->get_definition($latte_factory));
        }
        if ($builder->has_definition('nette.latte')) {
            $register_to_latte($builder->get_definition('nette.latte'));
        }
    }
}