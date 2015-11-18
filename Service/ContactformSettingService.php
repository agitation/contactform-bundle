<?php
/**
 * @package    agitation/contactform
 * @link       http://github.com/agitation/AgitContactFormBundle
 * @author     Alex Günsche <http://www.agitsol.com/>
 * @copyright  2012-2015 AGITsol GmbH
 * @license    http://opensource.org/licenses/MIT
 */

namespace Agit\ContactFormBundle\Service;

use Agit\SettingBundle\SettingService;

class ContactformSettingService
{
    private $contactAddr;

    private $noreplyAddr;

    private $settingService;

    public function __construct($contactAddr, $noreplyAddr, SettingService $settingService = null)
    {
        $this->contactAddr = $contactAddr;
        $this->noreplyAddr = $noreplyAddr;
        $this->settingService = $settingService;
    }

    public function getContactAddress()
    {
        return $this->settingService
            ? $this->settingService->getSetting('agit.contactform.contact_address')
            : $this->contactAddr;
    }

    public function getNoReplyAddress()
    {
        return $this->settingService
            ? $this->settingService->getSetting('agit.contactform.noreply_address')
            : $this->noreplyAddr;
    }
}
