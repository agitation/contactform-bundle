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
use Agit\PluggableBundle\Strategy\Depends;

/**
 * @EndpointClass
 */
class ContactForm extends AbstractEndpointClass
{
    /**
     * @Endpoint\Endpoint(request="Message",response="common.v1/Null")
     * @Endpoint\Security(capability="")
     * @Depends({"mailer", "agit.contactform.settings"})
     *
     * Send an e-mail to the website owner.
     */
    protected function sendEmail(AbstractObject $requestObject)
    {
        $mailer = $this->getService('mailer');
        $noreplyAddr = $this->getService('agit.contactform.settings')->getNoReplyAddress();
        $contactAddr = $this->getService('agit.contactform.settings')->getContactAddress();

        $message = $mailer->createMessage()
            ->setSubject($requestObject->get('subject'))
            ->setFrom([$noreplyAddr => $requestObject->get('name')])
            ->setReplyTo([$requestObject->get('email') => $requestObject->get('name')])
            ->setTo([$contactAddr])
            ->setBody($requestObject->get('message'), 'text/plain');

        $mailer->send($message);

        return $this->createObject('common.v1/Null');
    }
}
