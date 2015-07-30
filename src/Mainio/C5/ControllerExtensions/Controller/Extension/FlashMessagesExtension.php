<?php
namespace Mainio\C5\ControllerExtensions\Controller\Extension;

use Session;

/**
 * @author Antti Hukkanen <antti.hukkanen@mainiotech.fi>
 */
trait FlashMessagesExtension
{

    /**
     * Sets the flash variable to the session flashbag.
     * 
     * @param $key string
     * @param $value mixed
     */
    protected function setFlash($key, $value)
    {
        $flashbag = Session::getFlashBag();
        $flashbag->set($key, $value);
    }

    /**
     * Gets the flash variable from the session flashbag.
     * 
     * @param $type string
     * @param $default Default value if $type does not exist.
     * @return array
     */
    protected function getFlash($type, $default = array())
    {
        $flashbag = Session::getFlashBag();
        return $flashbag->get($type, $default);
    }

    /**
     * Sets the flash message from the flashbag to a variable available in the
     * view.
     * 
     * @param $key string
     * @param $viewKey string
     */
    protected function assignFlash($key, $viewKey)
    {
        if (count($msg = $this->getFlash($key)) > 0) {
            $this->set($viewKey, implode(", ", $msg));
        }
    }

}
