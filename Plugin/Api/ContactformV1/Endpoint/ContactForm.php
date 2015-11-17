<?php
/**
 * @package    agitation/contactform
 * @link       http://github.com/agitation/AgitContactFormBundle
 * @author     Alex Günsche <http://www.agitsol.com/>
 * @copyright  2012-2015 AGITsol GmbH
 * @license    http://opensource.org/licenses/MIT
 */

namespace Agit\ContactFormBundle\Plugin\Api\ContactformV1\Endpoint;

use Agit\ApiBundle\Annotation\Endpoint;
use Agit\ApiBundle\Annotation\Endpoint\EndpointClass;
use Agit\ApiBundle\Common\AbstractEndpointClass;
use Agit\ApiBundle\Common\AbstractObject;

/**
 * @EndpointClass
 */
class ContactForm extends AbstractEndpointClass
{
    /**
     * @Endpoint\Endpoint(request="Message",response="common.v1/Null")
     * @Endpoint\Security(capability="",allowCrossOrigin=false)
     *
     * Send an e-mail to the website owner.
     */
    protected function sendEmail(AbstractObject $requestObject)
    {
        $message = $this->getService('mailer')->createMessage()
            ->setSubject($requestObject->get('subject'))
            ->setFrom([$this->getParameter('agit.email.noreply') => $requestObject->get('name')])
            ->setReplyTo([$requestObject->get('email') => $requestObject->get('name')])
            ->setTo([$this->getParameter('agit.email.contact')])
            ->setBody($requestObject->get('message'), 'text/plain');

        $this->getService('mailer')->send($message);

        return $this->createObject('common.v1/Null');
    }
}
