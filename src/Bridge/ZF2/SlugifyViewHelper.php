<?php

declare (strict_types=1);
namespace Cocur\Slugify\Bridge\ZF2;

use Zend\View\Helper\Abstract_Helper;
/**
 * Class SlugifyViewHelper
 * @package    cocur/slugify
 * @subpackage bridge
 * @license    http://www.opensource.org/licenses/MIT The MIT License
 */
class Slugify_View_Helper extends Abstract_Helper
{
    /**
     * @codeCoverageIgnore
     */
    public function __construct(protected \Cocur\Slugify\Slugify_Interface $slugify)
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