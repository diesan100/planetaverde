<?php

namespace common\utils\models;

/**
 * Description of SmartUser
 *
 * @author Diego
 */
class SmartUser {
    public $isSignedUp = false;
    public $user = null;
    public $email = "";
    public $fullName = "";    
    
    public function getFullName() {
        return $this->fullName;
    }
}


