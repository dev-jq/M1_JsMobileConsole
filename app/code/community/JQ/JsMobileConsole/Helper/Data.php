<?php
class JQ_JsMobileConsole_Helper_Data extends Mage_Core_Helper_Data
{
	public function isEnabled() {
        return (bool)Mage::getStoreConfig('jsmobileconsole/config/jsmobileconsole_enabled');
    }

    public function canShowConsole()
    {
        if (!$this->isEnabled()) {
            return false;
        }

        // ignore IP white listing if developer mode is on
        if (Mage::getIsDeveloperMode()) {
            return true;
        }

        // IP is the allowed list
        return Mage::helper('core')->isDevAllowed();

        return true;
    }
}