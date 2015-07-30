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
        return $flashbag->set($key, $value);
    }

    /**
     * Gets the flash variable from the session flashbag.
     * 
     * @param $key string
     * @return mixed
     */
    protected function getFlash($key)
    {
        $flashbag = Session::getFlashBag();
        return $flashbag->get($key);
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
