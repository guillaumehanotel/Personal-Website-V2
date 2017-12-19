<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BlogController extends Controller {

    public function indexAction(Request $request) {


        return $this->render('BlogBundle:Blog:index.html.twig', [
        ]);

    }

}