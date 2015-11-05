<?php
/**
 * @package    agitation/api
 * @link       http://github.com/agitation/AgitApiBundle
 * @author     Alex Günsche <http://www.agitsol.com/>
 * @copyright  2012-2015 AGITsol GmbH
 * @license    http://opensource.org/licenses/MIT
 */

namespace Agit\ContactFormBundle\Plugin;

use Agit\PluggableBundle\Strategy\Cache\CachePlugin;
use Agit\ApiBundle\Plugin\AbstractApiObjectPlugin;

/**
 * @CachePlugin(tag="agit.api.object")
 */
class ApiObjectPlugin extends AbstractApiObjectPlugin
{
    protected function getSearchNamespace()
    {
        return "Agit\ContactFormBundle\Api\Object";
    }

    protected function getApiNamespace()
    {
        return "contactform.v1";
    }
}
