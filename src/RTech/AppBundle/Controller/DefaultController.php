<?php

namespace RTech\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('RTechAppBundle:Default:index.html.twig');
    }
}
