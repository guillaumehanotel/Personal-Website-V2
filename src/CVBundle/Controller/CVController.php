<?php

namespace CVBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CVController extends Controller {

    public function indexAction(Request $request) {

        return $this->render('CVBundle:CV:index.html.twig', []);
    }

}
