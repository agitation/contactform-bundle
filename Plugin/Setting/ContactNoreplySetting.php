<?php

namespace Agit\ContactFormBundle\Plugin\Setting;

use Agit\SettingBundle\Plugin\AbstractSetting;
use Agit\PluggableBundle\Strategy\Entity\EntityPlugin;
use Agit\IntlBundle\Translate;

/**
 * @EntityPlugin(tag="agit.setting", update=false)
 */
class ContactNoreplySetting extends AbstractSetting
{
    public function getId()
    {
        return 'agit.contactform.noreply_email';
    }

    public function getName()
    {
        return Translate::t('Contact Form e-mail address');
    }

    public function getDefaultValue()
    {
        return 'no-reply@example.com';
    }

    public function validate($value)
    {
        $this->getService('agit.validation')->validate('email', $value);
    }
}
