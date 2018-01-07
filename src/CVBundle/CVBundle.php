<?php

namespace CVBundle;

use CVBundle\Lib\Globals;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class CVBundle extends Bundle {

    public function boot() {
        // Set some static globals
        Globals::setUploadCompetenceDir($this->container->getParameter('app.path.competence_image'));
        Globals::setUploadRealisationDir($this->container->getParameter('app.path.realisation_image'));
    }

}
