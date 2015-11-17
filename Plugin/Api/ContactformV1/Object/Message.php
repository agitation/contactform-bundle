<?php
/**
 * @package    agitation/contactform
 * @link       http://github.com/agitation/AgitContactFormBundle
 * @author     Alex Günsche <http://www.agitsol.com/>
 * @copyright  2012-2015 AGITsol GmbH
 * @license    http://opensource.org/licenses/MIT
 */

namespace Agit\ContactFormBundle\Plugin\Api\ContactformV1\Object;

use Agit\ApiBundle\Annotation\Object;
use Agit\ApiBundle\Annotation\Property;
use Agit\ApiBundle\Common\AbstractObject;

/**
 * @Object\Object
 *
 * An e-mail message.
 */
class Message extends AbstractObject
{
    /**
     * @Property\StringType(minLength=3,maxLength=40)
     *
     * The sender's name.
     */
    public $name;

    /**
     * @Property\StringType
     *
     * The sender's e-mail address.
     */
    public $email;

    /**
     * @Property\StringType(minLength=5,maxLength=70)
     *
     * The e-mail subject.
     */
    public $subject;

    /**
     * @Property\StringType(minLength=20,maxLength=3000,allowLineBreaks=true)
     *
     * The e-mail message body (plain text).
     */
    public $message;
}
