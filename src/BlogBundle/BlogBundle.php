<?php

namespace BlogBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use BlogBundle\Lib\Globals;

class BlogBundle extends Bundle{

    public function boot() {
        // Set some static globals
        Globals::setUploadAvatarDir($this->container->getParameter('app.path.user_avatar'));
    }


}