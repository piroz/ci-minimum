<?php

/**
 * MY_Session
 */
class MY_Session extends CI_Session
{

    /**
     * flash message の保存キー
     */
    const FLASH_MESSAGE_KEY = 'flash_message';

    /**
     * fm
     * 
     * flash message
     * 
     * @param mixed $value
     * @return mixed
     */
    public function fm($value = null)
    {

        if (null !== $value) {
            $this->set_flashdata(self::FLASH_MESSAGE_KEY, $value);
        }

        return $this->flashdata(self::FLASH_MESSAGE_KEY);
    }

}
