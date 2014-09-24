<?php

namespace Spyl\Bundle\UserBundle\Model;

use FOS\UserBundle\Model\User as BaseUser;

class User extends BaseUser
{
    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
}
