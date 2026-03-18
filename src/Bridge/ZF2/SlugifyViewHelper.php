<?php

namespace Cocur\Slugify\Bridge\ZF2;

use Cocur\Slugify\SlugifyInterface;
use Zend\View\Helper\AbstractHelper;

/**
 * Class SlugifyViewHelper
 * @package    cocur/slugify
 * @subpackage bridge
 * @license    http://www.opensource.org/licenses/MIT The MIT License
 */
class SlugifyViewHelper extends AbstractHelper
{
    /**
     * @codeCoverageIgnore
     */
    public function __construct(protected \Cocur\Slugify\SlugifyInterface $slugify)
    {
    }

    /**
     * @param string|null $separator
     * @return string
     */
    public function __invoke(string $string, string $separator = null)
    {
        return $this->slugify->slugify($string, $separator);
    }
}
