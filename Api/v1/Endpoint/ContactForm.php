<?php
/**
 * @package    agitation/contactform
 * @link       http://github.com/agitation/AgitContactFormBundle
 * @author     Alex Günsche <http://www.agitsol.com/>
 * @copyright  2012-2015 AGITsol GmbH
 * @license    http://opensource.org/licenses/MIT
 */

namespace Agit\ContactFormBundle\Api\v1\Endpoint;

use Agit\ApiBundle\Api\Meta;
use Agit\ApiBundle\Api\Endpoint\AbstractEndpoint;
use Agit\ApiBundle\Api\Object\AbstractObject;

/**
 * This endpoint is used for testing purposes.
 */
class ContactForm extends AbstractEndpoint
{
    /**
     * @Meta\Call\Call(request="Message",response="common.v1/Null")
     * @Meta\Call\Security(capability="",allowCrossOrigin=false)
     *
     * Send an e-mail to the website owner.
     */
    protected function sendEmail(AbstractObject $RequestObject)
    {
        $message = $this->getService('mailer')->createMessage()
            ->setSubject($RequestObject->get('subject'))
            ->setFrom([$this->getParameter('agit.email.noreply') => $RequestObject->get('name')])
            ->setReplyTo([$RequestObject->get('email') => $RequestObject->get('name')])
            ->setTo([$this->getParameter('agit.email.contact')])
            ->setBody($RequestObject->get('message'), 'text/plain');

        $this->getService('mailer')->send($message);

        return $this->createObject('common.v1/Null');
    }
}
