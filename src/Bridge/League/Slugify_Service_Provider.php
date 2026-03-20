<?php

declare (strict_types=1);
namespace Cocur\Slugify\Bridge\League;

use Cocur\Slugify\Rule_Provider\Rule_Provider_Interface;
use Cocur\Slugify\Slugify;
use Cocur\Slugify\Slugify_Interface;
use League\Container\Service_Provider\Abstract_Service_Provider;
class Slugify_Service_Provider extends Abstract_Service_Provider
{
    protected $provides = [Slugify_Interface::class];
    public function register(): void
    {
        $this->container->share(Slugify_Interface::class, function (): \Cocur\Slugify\Slugify {
            $options = [];
            if ($this->container->has('config.slugify.options')) {
                $options = $this->container->get('config.slugify.options');
            }
            $provider = null;
            if ($this->container->has(Rule_Provider_Interface::class)) {
                /* @var RuleProviderInterface $provider */
                $provider = $this->container->get(Rule_Provider_Interface::class);
            }
            return new Slugify($options, $provider);
        });
    }
}