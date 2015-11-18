<?php

namespace Agit\ContactFormBundle\Plugin\Setting;

use Agit\SettingBundle\Plugin\AbstractSetting;
use Agit\PluggableBundle\Strategy\Entity\EntityPlugin;
use Agit\IntlBundle\Translate;

/**
 * @EntityPlugin(tag="agit.setting", update=false)
 */
class ContactEmailSetting extends AbstractSetting
{
    public function getId()
    {
        return 'agit.contactform.contact_email';
    }

    public function getName()
    {
        return Translate::t('Contact Form E-Mail address');
    }

    public function getDefaultValue()
    {
        return 'contact@example.com';
    }

    public function validate($value)
    {
        $this->getService('agit.validation')->validate('email', $value);
    }
}
